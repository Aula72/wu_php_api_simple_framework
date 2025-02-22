<?php 
error_reporting(0);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', '/var/log/php_errors.log');

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

include_once "config/config.php";
include_once "config/db.php";

include_once "lib/session-start.php";
include_once "lib/simple-function.php";

include_once "lib/baby-security.php";
include_once "lib/custom-security.php";
$data = json_decode(file_get_contents("php://input"), true);
$response = [];
$request_method = $_SERVER['REQUEST_METHOD'];
$allow_urls = [];


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}




/*
For example if we a table in our table called products, we can make its endpoints 
as in that following example
*/
// require_once "v1.php";
require_once "v6.php";
//call function by given uri...
method_caller();