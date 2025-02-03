<?php


$dbname=$_ENV['DBNAME'];

$dbhost=$_ENV['DBHOST'];
$dbuser=$_ENV['DBUSER'];
$dbpwd=$_ENV['DBPASSW'];

define('API_URL', $_SERVER['HTTPS']?'https':'http'.'://'.$_SERVER['HTTP_HOST']);
define('SESSID', $_SERVER['HTTP_SESSID']);
define('SESS_PATH', "/tmp/stem_sess");
