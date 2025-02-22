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
		$target_file = $_GET['file_name'].".php";
	}
	if(isset($_GET['name'])){
		$tab = $_GET['name'];
		$text = modal($tab);
		$w = "a";
	}else{
		for($i=0;$i<count($arr); $i++){
			$tab = $arr[$i];
			$text .= modal($tab);
		}
		$w = "w";
	}
	
	
	echo $text;
	
	
	$f = fopen($target_file, $w);
	fwrite($f, $text);
	fclose($f);
}

function modal($tab){
	return "
@add_url('$tab');
function $tab(){
	global \$response, \$conn, \$data, \$request_method, \$queryMake; 
	\$table = '$tab'; 

	switch(\$request_method){
		case 'GET':
			if(isset(\$_GET) && count(\$_GET)>0){
				\$response['data'] = \$queryMake->table(\$table)->select()->where(\$_GET)->execute()->get();
			}else{
				\$response['data'] = \$queryMake->table(\$table)->select()->execute()->get();
			}
		break;

		case 'POST':
			\$lastId = \$queryMake->table(\$table)->insert(\$data)->execute()->lastInsertedId();
			\$response['data'] = \$queryMake->table(\$table)->select()->where(['id'=>\$lastId])->execute()->getOne();
			// queryHandler(type:'post', table:\$table, data:\$data);
		break;

		case 'PUT':
			if(isset(\$_GET)){
				\$d = \$queryMake->table(\$table)->update(\$data)->where(\$_GET)->execute();
				\$response['message'] = 'School information was updated successfully';
			}else{
				\$response['message'] = 'School ID must be provided';
			}
		break;

		case 'DELETE':
			\$queryMake->table(\$table)->delete()->where(\$_GET)->execute();
			\$response['message'] = 'School was removed successfully';
		break;

		default:

		break;
	}
	echo json_encode(\$response);
	exit;
}\n";

}

create_function();