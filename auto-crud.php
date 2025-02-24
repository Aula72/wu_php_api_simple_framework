<?php 

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

include_once "config/config.php";
include_once "config/db.php";
include_once "lib/simple-function.php";

function create_function(){
	global $conn, $dbname;

	$tables = $conn->prepare("SELECT TABLE_NAME 
		FROM INFORMATION_SCHEMA.TABLES 
		WHERE TABLE_SCHEMA = '$dbname';");
	$tables->execute();
	$arr = [];
	foreach($tables->fetchAll(PDO::FETCH_ASSOC) as $f){
		$arr[] = $f["TABLE_NAME"];
	}
	
	$text = "<?php 
	\$queryMake = new HandleQuery();
	";
	$f=0;
	// START:
	$target_file = "v1.php";
	if(isset($_GET['file_name'])){
		$target_file = replace_special_chars($_GET['file_name']).".php";
	}
	if(isset($_GET['name'])){
		$tab = replace_special_chars($_GET['name']);
		$text = modal($tab);
		$w = "a";
	}else{
		for($i=0;$i<count($arr); $i++){
			if(!function_exists($arr[$i])){
				$tab = $arr[$i];
				$text .= modal($tab);
				$w = "w";
			}else{
				$text = "";
				$w = "a";
			}
			
		}
		
	}
	
	header("content-type: text/html");
	echo "<pre>\<?\php".$text."</pre>";
	
	
	$f = fopen($target_file, $w);
	fwrite($f, $text);
	fclose($f);
}

function modal($tab){
	$t1 = create_plural_or_singular($tab);
	// $t_name = $_ENV['TABLE_NAME_PREFIX'].$tab.$_ENV['TABLE_NAME_SUFFIX'];
	return "
@add_url('$tab');
function $tab(){
	global \$response, \$conn, \$data, \$request_method, \$cache, \$message, \$queryMake; 
	\$table = \$_ENV['TABLE_NAME_PREFIX'].'$tab'.\$_ENV['TABLE_NAME_SUFFIX'];
	\$msg = '$t1';
	switch(\$request_method){
		case 'GET':
			if(isset(\$_GET) && count(\$_GET)>0){
				\$get = [];
				foreach(\$_GET as \$g){
					\$get[] = \$g;
				}
				\$check_cache = \$cache->get(\$table.\$get[0]);
				if(\$check_cache){
					\$response['data'] = \$check_cache;

				}else{
					\$response['data'] = \$queryMake->table(\$table)->select()->where(\$_GET)->execute()->get();
					if(count(\$response['data'])>0){
						
						\$response['message'] = \$msg.\$message['found'];
					}else{
						\$response['message'] = \$msg.\$message['not_found'];
					}
					\$cache->set(\$table.\$get[0], \$response['data'], \$_ENV['CACHE_DURATION']);
				}
				
				
			}else{
				\$check_cache = \$cache->get(\$table);
				if(\$check_cache){
					\$response['data'] = \$check_cache;
				}else{
					\$response['data'] = \$queryMake->table(\$table)->select()->execute()->get();
					\$cache->set(\$table, \$response['data'], \$_ENV['CACHE_DURATION']);
				}
				\$response['message'] = \$msg.\$message['found'];
			}
		break;

		case 'POST':
			// require_fields(['column_name1', 'column_name2', 'column_name...']);
			\$insert_into_table = \$queryMake->table(\$table)->insert(\$data)->execute(); 
			\$lastId = \$insert_into_table->lastInsertedId();
			\$response['data'] = \$queryMake->table(\$table)->select()->where(['id'=>\$lastId])->execute()->getOne();
			\$response['message'] = \$msg.\$message['created'];
			// queryHandler(type:'post', table:\$table, data:\$data);
		break;

		case 'PUT':
			if(isset(\$_GET)){
				\$d = \$queryMake->table(\$table)->update(\$data)->where(\$_GET)->execute();
				//\$response['message'] = 'School information was updated successfully';
				\$response['message'] = \$msg.\$message['updated'];
			}else{
				//\$response['message'] = 'School ID must be provided';
				\$response['message'] = \$msg.\$message['not_found'];
			}
		break;

		case 'DELETE':
			\$queryMake->table(\$table)->delete()->where(\$_GET)->execute();
			//\$response['message'] = 'School was removed successfully';
			\$response['message'] = \$msg.\$message['deleted'];
		break;

		default:
			\$respons['error'] = \$message['wrong_method'];
		break;
	}
	echo json_encode(\$response);
	exit;
}\n";

}

create_function();