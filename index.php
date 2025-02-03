<?php 

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

include_once "config/config.php";
include_once "config/db.php";

include_once "lib/session-start.php";
include_once "lib/simple-function.php";


header("Access-Control-Allow-Origin: *"); // Allow any origin
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // Allowed methods
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Allowed headers
header("Content-Type: application/json");


$data = json_decode(file_get_contents("php://input"), true);
$response = [];
$request_method = $_SERVER['REQUEST_METHOD'];


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

//call function by given uri...
method_caller();


/*
For example if we a table in our table called products, we can make its endpoints 
as in that following example
*/
function products(){
    global $conn, $response, $data;
    $table = 'products';

    switch($request_method){
        case 'GET':
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $product = queryHandler(type:'get', table:$table, conditions:['id'=>$id]);
                $response['product'] = $product['result'][0];
                http_response_code(200);
                if(empty($response['product'][0])){
                    http_response_code(404);
                    $response['message'] = "Product not found";
                }
            }else{
                $response['products'] = queryHandler(type:'get',table:$table)['result'];
            }
            break;
        case 'POST':
        break;
        case 'PUT':
        break;
        case 'DELETE':
        break;
        default:
        break;

        echo json_encode($response);
    }
}
//to access this 
//type url containing /modal_function


function modal_function(){
	global $response, $conn, $data, $request_method;
	$table = "user_farms";

	switch($request_method){
		case 'GET':

		break;

		case 'POST':

		break;

		case 'PUT':

		break;

		case 'DELETE':

		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}