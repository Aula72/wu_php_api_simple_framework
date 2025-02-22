<?php 
	$queryMake = new HandleQuery();
	
@add_url('products');
function products(){
	global $response, $conn, $data, $request_method, $cache, $message, $queryMake; 
	$table = 'products'; 
	$msg = 'Product';
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
			// die(json_encode($data));
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
