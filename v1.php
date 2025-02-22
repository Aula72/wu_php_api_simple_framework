<?php 
	$queryMake = new HandleQuery();
	
@add_url('card_subscription');
function card_subscription(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_card_subscription_bl'; 
	$msg = 'Card subscription';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('feedback');
function feedback(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_feedback_bl'; 
	$msg = 'Feedback';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('join_user_intrest');
function join_user_intrest(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_join_user_intrest_bl'; 
	$msg = 'Join user intrest';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('joint_market_listings');
function joint_market_listings(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_joint_market_listings_bl'; 
	$msg = 'Joint market listing';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('market_vendors');
function market_vendors(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_market_vendors_bl'; 
	$msg = 'Market vendor';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('pgs_document_log');
function pgs_document_log(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_pgs_document_log_bl'; 
	$msg = 'Pgs document log';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('pgs_documents');
function pgs_documents(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_pgs_documents_bl'; 
	$msg = 'Pgs document';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('pgs_executives');
function pgs_executives(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_pgs_executives_bl'; 
	$msg = 'Pgs executive';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('pgs_products');
function pgs_products(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_pgs_products_bl'; 
	$msg = 'Pgs product';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('pgs_roles');
function pgs_roles(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_pgs_roles_bl'; 
	$msg = 'Pgs role';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('product_subscription');
function product_subscription(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_product_subscription_bl'; 
	$msg = 'Product subscription';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('system_logos');
function system_logos(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_system_logos_bl'; 
	$msg = 'System logo';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('system_markets');
function system_markets(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_system_markets_bl'; 
	$msg = 'System market';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('system_pgs');
function system_pgs(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_system_pgs_bl'; 
	$msg = 'System pg';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('system_pgs_members');
function system_pgs_members(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_system_pgs_members_bl'; 
	$msg = 'System pgs member';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('system_products');
function system_products(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_system_products_bl'; 
	$msg = 'System product';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('systemproduct_category');
function systemproduct_category(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_systemproduct_category_bl'; 
	$msg = 'Systemproduct category';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('user');
function user(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_user_bl'; 
	$msg = 'User';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('user_farms');
function user_farms(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_user_farms_bl'; 
	$msg = 'User farm';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('user_location');
function user_location(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_user_location_bl'; 
	$msg = 'User location';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('user_products');
function user_products(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_user_products_bl'; 
	$msg = 'User product';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('user_stole_products');
function user_stole_products(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_user_stole_products_bl'; 
	$msg = 'User stole product';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}

@add_url('user_types');
function user_types(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'tab_user_types_bl'; 
	$msg = 'User type';
	switch($request_method){
		case 'GET':
			if(isset($_GET) && count($_GET)>0){
				$get = [];
				foreach($_GET as $g){
					$get[] = $g;
				}
				$check_cache = $cache->get($table.$get[0]);
				if($check_cache){
					$response['data'] = $check_cache;

				}else{
					$response['data'] = $queryMake->table($table)->select()->where($_GET)->execute()->get();
					if(count($response['data'])>0){
						
						$response['message'] = $msg.$message['found'];
					}else{
						$response['message'] = $msg.$message['not_found'];
					}
					$cache->set($table.$get[0], $response['data'], $_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				$check_cache = $cache->get($table);
				if($check_cache){
					$response['data'] = $check_cache;
				}else{
					$response['data'] = $queryMake->table($table)->select()->execute()->get();
					$cache->set($table, $response['data'], $_ENV['CACHE_DURATION']);
				}
				$response['message'] = $msg.$message['found'];
			}
		break;

		case 'POST':
			$lastId = $queryMake->table($table)->insert($data)->execute()->lastInsertedId();
			$response['data'] = $queryMake->table($table)->select()->where(['id'=>$lastId])->execute()->getOne();
			$response['message'] = $msg.$message['created'];
			// queryHandler(type:'post', table:$table, data:$data);
		break;

		case 'PUT':
			if(isset($_GET)){
				$d = $queryMake->table($table)->update($data)->where($_GET)->execute();
				//$response['message'] = 'School information was updated successfully';
				$response['message'] = $msg.$message['updated'];
			}else{
				//$response['message'] = 'School ID must be provided';
				$response['message'] = $msg.$message['not_found'];
			}
		break;

		case 'DELETE':
			$queryMake->table($table)->delete()->where($_GET)->execute();
			//$response['message'] = 'School was removed successfully';
			$response['message'] = $msg.$message['deleted'];
		break;

		default:
			$respons['error'] = $message['wrong_method'];
		break;
	}
	echo json_encode($response);
	exit;
}
