<?php 
include_once "config.php";

use Phpfastcache\Helper\Psr16Adapter;

try {
  $conn = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpwd);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  die(json_encode(["error"=>"Connection failed: " . $e->getMessage(), "host"=>$dbhost]));
}

$cache = new Psr16Adapter('Files');

//memcached

// $memcached = new \Memcached();
// $memcached->addServer("127.0.0.1", 11211);

