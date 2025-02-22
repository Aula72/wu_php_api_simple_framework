<?php 
function method_caller(){
	global $allow_urls;
	if($_ENV['URI_PREFIX']!=""){
		$pre_url = str_replace("/".$_ENV['URI_PREFIX'], "", $_SERVER['REQUEST_URI']);
		$_SERVER['REQUEST_URI'] = $pre_url;	
	}
	
	$url = explode("/", $_SERVER['REQUEST_URI']);
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
				exit;
			}

		}
	
	}else{
		die(json_encode(['error'=>'Url not allowed now...']));
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


function generateRandomWord($length = 6) {
    $letters = 'abcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle(str_repeat($letters, $length)), 0, $length);
}

function replace_string($string){
	$pattern = "/[^a-zA-Z0-9]/";
	$replacement = "";
	return preg_replace($pattern, $replacement, $string);
}

function replace_special_chars($string, $r="_"){
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

function create_plural_or_singular($t){
	if(substr($t, -3) == "ies"){
		$t = rtrim($t,"ies");
		$t = $t."y";
		// die($t);
	}

	if(substr($t, -1) == "s"){
		$t = rtrim($t, "s");
		// die($t);
	}

	$t = str_replace("_", " ", $t);
	// echo $t;
	$t = ucfirst($t);

	return $t;
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
	protected $values = '';
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
		$params_ = [];
		if(!empty($data)){
			foreach ($data as $key => $value) {
			    if (is_string($key)) {
			    	$this->values = $this->values."$key=:$key,";
					$params_[":$key"] = $this->value;
			    }
			}
			$this->values = rtrim(",", $this->values);
			
		}else{
			die(json_encode(["error"=>"Specify columns"]));
		}
		$this->parameters = $params_;
		// die(json_encode($this->parameters));
		$this->stmt .= "INSERT INTO $this->table_name SET $this->values;";
		// die($values);
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
		die($this->stmt);
		die(json_encode($this->parameters));
		try{
			$this->result =query($this->stmt, $this->parameters);
			return $this;
		}catch(PDOException $m){
			echo json_encode([
				"error"=>$m->getMessage(),
			]);
			exit;
		}
			
	}
}
