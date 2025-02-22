<?php 
function method_caller(){
	global $allow_urls;
	$url = explode("/", $_SERVER['REQUEST_URI']);
	// die(json_encode($url));
	if($url[1]==""){
		call_user_func('index');
		exit;
	}
	$new_url = explode("?", $url[1]);
	if(in_array($url[0], $allow_urls) || in_array($new_url[0], $allow_urls)){
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
			exit;}

		}
	
	}else{
		die(json_encode(['error'=>'Url not allowed...']));
	}
}
function add_url($url){
	global $allow_urls;
	array_push($allow_urls, $url);
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
		case 'put':
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

function generateRandomWord($length = 6) {
    $letters = 'abcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle(str_repeat($letters, $length)), 0, $length);
}

function replace_string($string){
	$pattern = "/[^a-zA-Z0-9]/";
	$replacement = "";
	return preg_replace($pattern, $replacement, $string);
}

function replace_special_chars($string){
	$arr = [
		" "=>"_",
		"!"=>"_",
		"@"=>"_",
		"#"=>"_",
		"$"=>"_",
		"%"=>"_",
		"^"=>"_",
		"&"=>"_",
		"*"=>"_",
		"("=>"_",
		")"=>"_",
		"["=>"_",
		"]"=>"_",
		"{"=>"_",
		"}"=>"_",
		"="=>"_",
		"+"=>"_",
		"?"=>"_",
		"<"=>"_",
		">"=>"_",
		"/"=>"_",
		"\""=>"_",
		"'"=>"_",
		";"=>"_",
		":"=>"_",
		"~"=>"_",
		"-"=>"_",
		"."=>"_",
		"`"=>"_"
	];
	$newString = str_replace(array_keys($arr), array_values($arr), $string);
	return $newString;
}

// echo generateRandomWord(8);

class HandleQuery{
	protected $conditions = "";
	protected $table_name = "";
	protected $stmt = "";
	protected $parameters = [];
	protected $limit = 100;
	protected $order_by = " ASC";
	protected $per_page = 10;
	protected $current_page = 1;
	public function __construct(){
		// query($this->stmt, $this->parameters);
	}
	public function table($name){
		$this->table_name = $name;
		return $this;
	}
	public function select($arr=[]){
		if(count($arr)==0){
			$s = "*";
		}else{
			for($i=0; $i<=count($arr); $i++){
				$s .= $arr[$i].",";
			}
			$s = rtrim($s, ",");
		}
		$this->stmt = "SELECT $s FROM $this->table_name";
		// if(count($this->conditions>0)){
		// 	$this->stmt = "SELECT $s FROM $this->table_name WHERE $this->conditions;";
		// }
		
		return $this;
	}
	public function insert($data = []){
		$params = [];
		if(!empty($data)){
			foreach ($data as $key => $value) {
			    if (is_string($key)) {
			    	$values .= "$key=:$key,";
					$params["$key"] = $value;
			    }
			}
			$newString = substr($values, 0, -1);
			$values = $newString;
		}else{
			die(json_encode(["error"=>"Specify columns"]));
		}
		$this->parameters = $params;
		$this->stmt = "INSERT INTO $this->table_name SET $values;";
		return $this;
	}
	public function update($data=[]){
		$pa = [];
		if(!empty($data)){
			foreach ($data as $key => $value) {
			    if (is_string($key)) {
			    	$values .= "$key=:$key,";
					$pa[":$key"]=$value;
					// array_push($this->parameters, $pa);
			    }
			}
			$newString = substr($values, 0, -1);
			$values = $newString;
		}else{
			die(json_encode(["error"=>"Specify columns"]));
		}
		$this->parameters = $pa;
		// die(var_dump($this->parameters));

		$this->stmt .= "UPDATE $this->table_name SET $values $this->conditions";
		// var_dump($this);
		return $this;
	}
	public function delete($arr = []){
		
		$this->stmt = "DELETE FROM $this->table_name ";
		// $this->where($arr);
		// die(var_dump($this));
		return $this;
	}
	public function getOne(){
		return $this->result->fetch(PDO::FETCH_ASSOC);
	}
	public function get(){
		return $this->result->fetchAll(PDO::FETCH_ASSOC);
	}
	public function lastInsertedId(){
		global $conn;
		return $conn->lastInsertID();
	}

	public function first(){}

	public function where($arr=[]){
		$params = [];
		$cond_ = " ";
		if(count($arr)>0){
			foreach ($arr as $key => $value) {
				if (is_string($key)) {
					$cond_ .= " $key=:$key AND ";
					$params[":$key"]=$value;
					// array_push($this->parameters, [$params[":$key"]=>$value]);
					$this->parameters[":$key"] = $value;
					// $this->parameters, $params[":$key"];
					// array_push($this->parameters, $pa);
				} else {
					$cond_ .= " $value ";
					$this->parameters[] = $cond_;
				}
			}
		}
		// array_push($this->parameters, $params);
		$cond_ = rtrim($cond_, ",");
		$cond_ = rtrim($cond_, " AND ");
		// $this->parameters = $params;
		$this->conditions .= " WHERE ".$cond_;
		$this->stmt .= $this->conditions;
		return $this;
	}

	public function paginate($per_page=20, $start_at = 0){
		$num_page = query($this->stmt);
		$this->stmt .= " LIMIT $this->per_page OFFSET $this->offset";
	}

	function create_table($name){
		return $this;
	}

	function execute(){
		// if(!empty($this->parameter)){
		// 	$this->result = query($this->stmt, $this->parameters);
		// }else{
		// 	$this->result = query($this->stmt);
		// }	
		// var_dump($this);
		// die(json_encode($this->parameters));
		// die(var_dump($this->stmt));
		try{
			$this->result =query($this->stmt, $this->parameters);
			return $this;
		}catch(PDOException $m){
			echo json_encode([
				"error"=>$m->getMessage(),
				// 'query'=>$this->stmt
			]);
			exit;
		}
			
	}
}
