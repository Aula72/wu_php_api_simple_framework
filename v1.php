<?php 

@add_url('products');
function products(){
    global $conn, $response, $data, $request_method, $cache;
    $table = 'products';

    switch($request_method){
        case 'GET':
            if(isset($_GET['id'])){
                
                $id = $_GET['id'];
                $product = $cache->get("product_$id");
                if($product){
                    $response['product'] = $product;
                    echo json_encode($response);
                    exit;
                }
                $product = queryHandler(type:'get', table:$table, conditions:['id'=>$id]);
                $response['product'] = $product['result'][0];
                $cache->set("product_$id", $response['product'], 3600);
                http_response_code(200);
                if(empty($response['product'])){
                    http_response_code(404);
                    $response['message'] = "Product not found";
                }
                echo json_encode($response);
                exit;
            }else{
                $products = $cache->get("products");
                if($products){
                    $response['products'] = $products;
                    echo json_encode($response);
                    exit;
                }
                $response['products'] = queryHandler(type:'get',table:$table)['result'];
                $cache->set("products", $response['products'], 3600);
                echo json_encode($response);
                exit;
            }
            // echo json_encode($response);
            break;
        case 'POST':
            
        break;
        case 'PUT':
        break;
        case 'DELETE':
            $id = $_GET['id'];
            queryHandler(type:'delete', table:$table, conditions:['id'=>$id]);
            $response['message'] = "Product deleted successfully";
        break;
        default:
        break;

        
    }
   
}

@add_url('/');
function index(){
    global $response;
    $response['message'] = "Welcome to the API";
    echo json_encode($response);
    exit;
}
//to access this 
//type url containing /modal_function
function check_session(){
    
    for($i=0; $i<10000; $i++){
        queryHandler(type:'post', table:'products', data:['name'=>'product '.$i.' '. generateRandomWord(rand(3, 10)), 'unit_price'=>rand(100, 1000), 'quantity'=>rand(1, 100)]);
    }
    echo json_encode(["session" => "active", "data"=>$_SESSION]);
}


function modal_function(){
	global $response, $conn, $data, $request_method;
	$table = "user_farms";

	switch($request_method){
		case 'GET':

		break;

		case 'POST':
            queryHandler(type:'post', table:$table, data:$data);
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
