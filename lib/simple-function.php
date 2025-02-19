<?php 

function method_caller(){
	$url = explode("/", $_SERVER['REQUEST_URI']);
	if(stripos($url[1], "?")){
			$new_url = explode("?", $url[1]);
			$query1 = explode("&", $_SERVER['QUERY_STRING']);
			foreach($query1 as $q){
				$qi = explode("=", $q);
				$_GET[$qi[0]] = $qi[1];
			}
			call_user_func($new_url[0]);
			exit;
	}else{
		if(function_exists($url[1])){
		
		call_user_func($url[1]);
		exit;
		}else{
			http_response_code(404);
			echo json_encode(["error"=>INVALID_OP]);
			exit();
		}	
	}
}
function allowed_methods($meth=['GET']){
	if(!in_array($_SERVER['REQUEST_METHOD'], $meth)){
		http_response_code(405);
		die(json_encode(['error'=>METHOD_NOT_ALLOWED]));
	}
}

function query($stmt, $param=[]){
	global $conn;
	$p = $conn->prepare($stmt);
	$p->execute($param);

	return $p;
}

function queryHandler($type='get', $table='',$data=[],$conditions=[]){
	global $conn;
	$return = [];
	if($table==''){
		die(json_encode(["error"=>"Table not provided"]));
	}
	
	$u = "SHOW COLUMNS FROM $table";
	$su = $conn->prepare($u);
	$columns =[];
	foreach($su->fetchAll(PDO::FETCH_ASSOC) as $col){
		array_push($columns,$col);
	}
	
	$params = [];
	$cond_ = " WHERE ";
	if(count($conditions)>0){
		foreach ($conditions as $key => $value) {
		    if (is_string($key)) {
		        $cond_ .= " $key=:$key";
		        array_push($params, [":$key"=>$value]);
		    } else {
		        $cond_ .= " $value ";
		    }
		}
	}

	if(!empty($data)){
		foreach ($data as $key => $value) {
		    if (is_string($key)) {
		        array_push($params, [":$key"=>$value]);
		    }
		}
	}
	
	$statement = "";
	switch($type){
		case 'get':
		$statement.="SELECT * FROM $table";
		if(count($conditions)>0){
			$statement .= $cond_;
		}		
		$message = "Select was successful";
		break;
		case 'post':
		$statement .="INSERT INTO $table SET ";
		if(!empty($data)){
			foreach ($data as $key => $value) {
			    if (is_string($key)) {
			    	$statement .= "$key=:$key,";
			    }
			}
			$newString = substr($statement, 0, -1);
			$statement = $newString;
		}else{
			die(json_encode(["error"=>"Specify columns"]));
		}
		$message = "Insert was successful";
		break;
		case 'update':
		$statement .="UPDATE $table SET ";
		if(!empty($data)){
			foreach ($data as $key => $value) {
			    if (is_string($key)) {
			    	$statement .= "$key=:$key,";
			    }
			}
			$newString = substr($statement, 0, -1);
			$statement = $newString;

		}else{
			die(json_encode(["error"=>"Specify columns"]));
		}
		if(count($conditions)>0){
			$statement .= $cond_;
		}
		$message = "Update was successful";
		break;
		case 'delete':
		$statement .= "DELETE FROM $table ";
		if(count($conditions)>0){
			$statement .= $cond_;
		}
		$message = "Delete was successful";
		break;
		default:
		die(json_encode(["error"=>'An error occured']));
	}
	
	$par1 = array_merge(...$params);
	
	$que = query($statement, $par1);

	return [
		"result"=>$que->fetchAll(PDO::FETCH_ASSOC), 
		"lastID"=>$conn->lastInsertID(), 
		"message"=>$message
	];
}

