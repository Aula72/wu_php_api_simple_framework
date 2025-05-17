<?php 
include_once "config.php";

use Phpfastcache\Helper\Psr16Adapter;

// echo json_encode(["host"=>$dbhost, "dbname"=>$dbname, "dbpassw"=>$dbpwd, "dbuser"=>$dbuser, "db_type"=>$_ENV['DB_TYPE']]);

if($_ENV['DB_TYPE']=='mongo'){
  try {
    $conn = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpwd);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
  } catch(PDOException $e) {
    die(json_encode(["error"=>"Connection failed: " . $e->getMessage(), "host"=>$dbhost]));
  }
}else if($_ENV['DB_TYPE'] == 'postgres'){
  try {
    $conn = new PDO("pgsql:host=$dbhost;port=5432;dbname=$dbname", $dbuser, $dbpwd);
    // $conn = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpwd);
    // // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
  } catch(PDOException $e) {
    die(json_encode(["error"=>"Connection failed: " . $e->getMessage(), "host"=>$dbhost]));
  }
}else{
  try {
    $conn = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpwd);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
  } catch(PDOException $e) {
    die(json_encode(["error"=>"Connection failed: " . $e->getMessage(), "host"=>$dbhost]));
  }
}


$cache = new Psr16Adapter('Files');

//memcached

// $memcached = new \Memcached();
// $memcached->addServer("127.0.0.1", 11211);

// echo json_encode($cache->get("products"));
// exit;

