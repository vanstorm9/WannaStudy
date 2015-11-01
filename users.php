<?php 
require 'db.php';

function user_joined($user_name){
	$user_name = mysql_real_escape_string(htmlentities($user_name)); 
	mysql_query("INSERT INTO users VALUES ('$user_name')");
}

function user_left($user_name){
	$user_name = mysql_real_escape_string($user_name);
	mysql_query("DELETE FROM users WHERE user_name ='$user_name'");
}

function user_list(){
	$user_list = array();
	$users_query = mysql_query("SELECT user_name FROM users");
	while($users_row = mysql_fetch_assoc($users_query)){
		$users_list[] = $users_row['user_name'];
	}
	
	return $user_list;
}

if(isset($_POST['user_name'],$_POST['action']) || isset($_POST['action'])){
	$user_name = $_POST['user_name'];
	$action = $_POST['action'];
	
	if($action == 'joined'){
		echo 'Joined reached';
		user_joined($user_name);
	} else if($action == 'list'){
		foreach(user_list() as $user){
			echo $user, '<br>';
		}	
	}else if($action == 'left'){
		user_left($user_name);
	}
}

?>