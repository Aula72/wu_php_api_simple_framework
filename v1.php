<?php 
$queryMake = new HandleQuery();
@add_url('products');
function products(){
    global $conn, $response, $data, $request_method, $cache;
    $table = 'products';

    switch($request_method){
        case 'GET':
           
            $response['get'] = $_GET;
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
                $products = $cache->get("products_");
                if($products){
                    $response['products'] = $products;
                    echo json_encode($response);
                    exit;
                }
                $response['products'] = queryHandler(type:'get',table:$table, conditions:['id','>',0,' order by id desc Limit 100'])['result'];
                $cache->set("products", $response['products'], 120);
                echo json_encode($response);
                exit;
            }
            // echo json_encode($response);
            break;
        case 'POST':
            $product = queryHandler(type:'post', table:$table, data:$data);
            http_response_code(201);
            $response['message'] = "Product was added successfully";

            echo json_encode($response);
        break;
        case 'PUT':
        break;
        case 'DELETE':
            $id = $_GET['id'];
            queryHandler(type:'delete', table:$table, conditions:['id'=>$id]);
            $response['message'] = "Product $id was deleted successfully";
            echo json_encode($response);
        break;
        default:
        break;

        
    }
   
}

@add_url('people');
function people(){
    global $response, $conn, $data, $request_method, $queryMake;
	$table = "products";

	switch($request_method){
		case 'GET':
            if(isset($_GET) && count($_GET)>0){
                // $_GET['id'] = $_GET['uid'];
                // unset($_GET['uid']);
                $conditions = $_GET;
                // $id = $_GET['id'];
                // $response = $queryMake->table($table)->select()->where(['id'=>$id])->execute()->get();
                $response = $queryMake->table($table)->select()->where($conditions)->execute()->get();
            }else{
                $response = $queryMake->table($table)->select()->execute()->get();
            }
            
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

@add_url('/');
function index(){
    global $response;
    $response['message'] = "Welcome to the API";
    echo json_encode($response);
    exit;
}
//to access this 
//type url containing /modal_function
@add_url('check_session');
function check_session(){
    $h = new HandleQuery();
    // die(json_encode($h->table("products")->select()->where(['name'=>"Product 80 five squared"])->execute()->get()));
    // die(json_encode([$h->table('products')->select(['id','name', 'unit_price'])->where(['id'=>78])->execute()]));
    // die(json_encode($h->table('products')->insert(['name'=>23,'unit_price'=>8695, 'quantity'=>89])->execute()));
    // die(json_encode($h->table('products')->update(['name'=>'Simo Aushi'])->where(['id'=>90])->execute()));
    // for($i=0; $i<10000; $i++){
    //     queryHandler(type:'post', table:'products', data:['name'=>'product '.$i.' '. generateRandomWord(rand(3, 10)), 'unit_price'=>rand(100, 1000), 'quantity'=>rand(1, 100)]);
    // }
    $h->table('products')->insert(['name'=>"Product 80 five squared", "unit_price"=>8900, "quantity"=>90])->execute()->lastInsertedId();
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
