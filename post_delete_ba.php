<?php 
include 'connect.php';
include 'general.php';
include 'header.php';
include 'sessioncheck.php';

$submit = $_POST['delete_post_but'];
$school = $_POST['schoolhide'];
$major = $_POST['majorhide'];
$school_type = $_POST['school_type_hide'];
$subject = $_POST['subjecthide'];
$course = $_POST['coursehide'];
$topic = $_POST['topichide'];
$orange_but = $_POST['orangebuthide'];
$post_id = $_POST['post_idbuthide'];
$original_post_state = $_POST['ophide'];


if($orange_but == 'False'){
	$orange_bool = 0;
} else {
	$orange_bool = 1;
}




$owner_id_query = mysql_query("SELECT owner_id FROM posts WHERE id='$post_id'");
$row_owner_id = mysql_fetch_assoc($owner_id_query);
$owner_id = $row_owner_id['owner_id'];



if($owner_id == 0){
	$anynomous_zero_id = 0;
	
	$anonymous_user_relation_id_query = mysql_query("SELECT user_id FROM anonymous WHERE user_id='$id' && school='$school' && major='$major' && subject='$subject' && course='$course' && topic='$topic'");
	$anonymous_user_relation_id_row = mysql_fetch_assoc($anonymous_user_relation_id_query);
	$owner_id = $anonymous_user_relation_id_row['user_id'];
	
	$anynomous_gate = 1;
} else {
	$anynomous_gate = 0;
}


	
if($submit){
	
	if($owner_id == $id){
		
		if($anynomous_gate == 1){
				$owner_id = $anynomous_zero_id;
				
		}
		
		if ($orange_bool == 0){
			
			
			
			mysql_query("DELETE FROM posts WHERE id='$post_id' && school='$school' && major='$major' && subject='$subject' && cours='$course' && topics='$topic' && owner_id='$owner_id'") or die("<font style='color:white;'>There was an error deleting the post.</font>");
			
			if($original_post_state == 101){
				mysql_query("DELETE FROM topics WHERE id='$topic' && school='$school' && major='$major' && subject='$subject' && cours='$course'") or die("<font style='color:white;'>Unable to delete the topic.</font>");
				die("<font style='color:white;'>You have successfully deleted the post<br><a href='topics.php?".$school_type."=".$school."&m=".$major."&sub=".$subject."&co=".$course."'>Click here to return</a></font>");
			} 
			
			echo "<font style='color:white;'>You have successfully deleted the post<br><a href='post.php?".$school_type."=".$school."&m=".$major."&sub=".$subject."&co=".$course."&top=".$topic."'>Click here to return</a></font>";
			
		} else if ($orange_bool == 1){
			mysql_query("DELETE FROM posts WHERE id='$post_id' && school='$school' && major='$major' && subject='$subject' && cours='$course' && topics='$topic' && orange_but='$orange_but' && owner_id='$owner_id'") or die("<font style='color:white;'>There was an error deleting the post. </font>");
			
			if($original_post_state == 101){
				mysql_query("DELETE FROM topics WHERE id='$topic' && school='$school' && major='$major' && subject='$subject' && cours='$course' && orange_but='$orange_but'") or die("<font style='color:white;'>Unable to delete the topic.</font>");
				die("<font style='color:white;'>You have successfully deleted the post<br><a href='topics.php?".$school_type."=".$school."&m=".$major."&sub=".$subject."&co=".$course."&oc=".$orange_but."'>Click here to return</a></font>");
			} 
			
			echo "<font style='color:white;'>You have successfully deleted the post<br><a href='post.php?".$school_type."=".$school."&m=".$major."&sub=".$subject."&co=".$course."&top=".$topic."&oc=".$orange_but."'>Click here to return</a></font>";

			
		} else {
			die("<font style='color:white;'>There was a boolean error</font>");
		}
	
	} else {
		die("<font style='color:white;'>Access Denied (2)</font>");
	}
	
} else {
	die("<font style='color:white;'>Access Denied (1)</font>");
}


?>