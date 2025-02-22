<?php 
	$queryMake = new HandleQuery();
	
@add_url('card_subscription');
function card_subscription(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'card_subscription'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('feedback');
function feedback(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'feedback'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('join_user_intrest');
function join_user_intrest(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'join_user_intrest'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('joint_market_listings');
function joint_market_listings(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'joint_market_listings'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('market_vendors');
function market_vendors(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'market_vendors'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('pgs_document_log');
function pgs_document_log(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'pgs_document_log'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('pgs_documents');
function pgs_documents(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'pgs_documents'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('pgs_executives');
function pgs_executives(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'pgs_executives'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('pgs_products');
function pgs_products(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'pgs_products'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('pgs_roles');
function pgs_roles(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'pgs_roles'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('product_subscription');
function product_subscription(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'product_subscription'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('system_logos');
function system_logos(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'system_logos'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('system_markets');
function system_markets(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'system_markets'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('system_pgs');
function system_pgs(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'system_pgs'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('system_pgs_members');
function system_pgs_members(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'system_pgs_members'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('system_products');
function system_products(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'system_products'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('systemproduct_category');
function systemproduct_category(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'systemproduct_category'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('user');
function user(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'user'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('user_farms');
function user_farms(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'user_farms'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('user_location');
function user_location(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'user_location'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('user_products');
function user_products(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'user_products'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('user_stole_products');
function user_stole_products(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'user_stole_products'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('user_types');
function user_types(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'user_types'; 

	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
			}else{
				$response['data'] = $queryMake->table($table)->select()->execute()->get();
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				$response['message'] = 'School information was updated successfully';
			}else{
				$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode($response);
	exit;
}


