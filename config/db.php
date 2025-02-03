<?php 
include_once "config.php";


try {
  $conn = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpwd);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  die(json_encode(["error"=>"Connection failed: " . $e->getMessage(), "host"=>$dbhost]));
}
