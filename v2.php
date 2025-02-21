<?php 
$queryMake = new HandleQuery();




@add_url('create_function');
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

@add_url('admin');
function admin(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'admin'; 

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
@add_url('asset');
function asset(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'asset'; 

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
@add_url('game');
function game(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'game'; 

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
@add_url('game_asset');
function game_asset(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'game_asset'; 

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
@add_url('game_grades');
function game_grades(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'game_grades'; 

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
@add_url('game_level');
function game_level(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'game_level'; 

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
@add_url('learner');
function learner(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'learner'; 

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
@add_url('learner_history');
function learner_history(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'learner_history'; 

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
@add_url('level_question_score');
function level_question_score(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'level_question_score'; 

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
@add_url('level_questions');
function level_questions(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'level_questions'; 

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
@add_url('permission');
function permission(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'permission'; 

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
@add_url('question_answers');
function question_answers(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'question_answers'; 

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
@add_url('school');
function school(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'school'; 

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
@add_url('school_logs');
function school_logs(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'school_logs'; 

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
@add_url('staff');
function staff(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'staff'; 

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
@add_url('staff_history');
function staff_history(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'staff_history'; 

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
@add_url('system_activation');
function system_activation(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'system_activation'; 

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
@add_url('user_logs');
function user_logs(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'user_logs'; 

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
@add_url('user_roles');
function user_roles(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'user_roles'; 

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
@add_url('user_tokens');
function user_tokens(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'user_tokens'; 

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
@add_url('users');
function users(){
	global $response, $conn, $data, $request_method, $queryMake; 
	$table = 'users'; 

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