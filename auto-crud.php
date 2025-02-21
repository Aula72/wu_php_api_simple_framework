<?php 
include_once "config/config.php";
include_once "config/db.php";
// @add_url('create_function');
function create_function(){
	$arr = ["admin","asset","game",	"game_asset","game_grades",	"game_level","learner",	"learner_history",	"level_question_score", 
	"level_questions",
	"permission",
	"question_answers",
	"school",
	"school_logs",
	"staff",
	"staff_history",
	"system_activation",
	"user_logs",
	"user_roles",
	"user_tokens",
	"user_types",
	"users",
	
	];
	$text = "<?php 
	\$queryMake = new HandleQuery();
	";
	$f=0;
	// START:
	if(isset($_GET['name'])){
		$tab = $_GET['name'];
		$text .= modal($tab);
	}else{
		for($i=0;$i<count($arr); $i++){
			$tab = $arr[$i];
			$text .= modal($tab);
		}
	}
	
	
	echo $text;
	$f = fopen("v3.php", "w");
	fwrite($f, $text);
	fclose($f);
	// if($f==0){
	// 	goto START;
	// }
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