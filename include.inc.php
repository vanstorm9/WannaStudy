<?php 
include 'connect.php';
include 'general.php';

$p_id = $_GET['p'];
$major = $_GET['m'];
$subject = $_GET['sub'];
$course = $_GET['co'];
$topic = $_GET['t'];
$orange_but = $_GET['oc'];
$school = $_GET['s'];
$like_dislike = $_GET['ld'];
//$school_type = $_GET['st'];


$anti_copy_check = mysql_num_rows(mysql_query("SELECT * FROM like_dislike WHERE post_id='$p_id' && school='$school' && major='$major' && subject='$subject' && cours='$course' && topics='$topic' && orange_but='$orange_but' && like_giver='$id'"));


if ($anti_copy_check == 0){

	$query_post_owner_id = mysql_query("SELECT owner_id FROM posts WHERE school='$school' && major='$major' && subject='$subject' && cours='$course' && topics='$topic' && orange_but='$orange_but'");
	$row_post_owner_id = mysql_fetch_assoc($query_post_owner_id);
	$post_owner_id = $row_post_owner_id['owner_id'];

	if ($like_dislike == 1){
		mysql_query("INSERT INTO like_dislike VALUES('','$id','$fullname','$post_owner_id','$school','$major','$subject','$course','$topic','$orange_but','$p_id','1')");
	} else if ($like_dislike == 0){
		mysql_query("INSERT INTO like_dislike VALUES('','$id','$fullname','$post_owner_id','$school','$major','$subject','$course','$topic','$orange_but','$p_id','0')");
	}
	$query_reputation = mysql_query("SELECT reputation FROM users WHERE id= '$post_owner_id'");
	$row_reputation = mysql_fetch_assoc($query_reputation);
	$reputation = $row_reputation['reputation'];
	
	if ($like_dislike == 1){
		$reputation = $reputation + 1;
	} else if ($like_dislike == 0){
		$reputation = $reputation - 1;
	}
			
	mysql_query("UPDATE users SET reputation='$reputation' WHERE id='$post_owner_id'");
	
	if ($like_dislike == 1){
		echo '<span class="glyphicon glyphicon-thumbs-up"></span> You Liked!';
	} else if ($like_dislike == 0){
		echo '<span class="glyphicon glyphicon-thumbs-down"></span> You Disliked!';	
	}

} else {

$anti_copy_check_pos = mysql_num_rows(mysql_query("SELECT * FROM like_dislike WHERE post_id='$p_id' && school='$school' && major='$major' && subject='$subject' && cours='$course' && topics='$topic' && orange_but='$orange_but' && like_giver='$id' && like_cond='1'"));
$anti_copy_check_neg = mysql_num_rows(mysql_query("SELECT * FROM like_dislike WHERE post_id='$p_id' && school='$school' && major='$major' && subject='$subject' && cours='$course' && topics='$topic' && orange_but='$orange_but' && like_giver='$id' && like_cond='0'"));



	if ($like_dislike == 1){
		if ($anti_copy_check_pos == 0){
			echo '<span class="glyphicon glyphicon-thumbs-up"></span> Like';
		} else {
			echo '<span class="glyphicon glyphicon-thumbs-up"></span> You Liked!';
		}
	} else if ($like_dislike == 0){
		if ($anti_copy_check_neg == 0){
			echo '<span class="glyphicon glyphicon-thumbs-down"></span> Dislike';	
		} else {
			echo '<span class="glyphicon glyphicon-thumbs-down"></span> You Disliked!';	
		}
	}
}
?>