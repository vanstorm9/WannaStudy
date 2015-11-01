<?php 
include 'connect.php';
include 'general.php';


if ($_GET['hs']&&empty($_GET['uni'])){
	$school = $_GET['hs'];
	$school_type = 'hs';
} else if ($_GET['uni']&&empty($_GET['hs'])){
	$school = $_GET['uni'];
	$major = $_GET['maj'];
	$school_type = 'uni';
}
$major = $_GET['m'];
$subject = $_GET['sub'];
$course = $_GET['co'];
$topic = $_GET['to'];
$orange_but = $_GET['oc'];
$post_id = $_GET['ic'];
$already_resolved = $_GET['ar'];

if($already_resolved==1){
	if ($orange_but == ''){
		mysql_query("UPDATE topics SET resolved='0' WHERE major='$major' && subject='$subject' && cours='$course' && id='$topic' && owner_id='$id'") or die("<font style='color:white;'>There was an error declaring your question resolved. Please try again later.</font>");

		header("Location: post.php?".$school_type."=".$school."&m=".$major."&sub=".$subject."&co=".$course."&top=".$topic."");
	} else {
		mysql_query("UPDATE topics SET resolved='0' WHERE major='$major' && subject='$subject' && cours='$course' && id='$topic' && owner_id='$id' && orange_but='$orange_but'") or die("<font style='color:white;'>There was an error declaring your question resolved. Please try again later.</font>");

		header("Location: post.php?".$school_type."=".$school."&m=".$major."&sub=".$subject."&co=".$course."&top=".$topic."&oc=".$orange_but."");
	}
	
} else{
	if ($orange_but == ''){
		mysql_query("UPDATE topics SET resolved='1' WHERE major='$major' && subject='$subject' && cours='$course' && id='$topic' && owner_id='$id'") or die("<font style='color:white;'>There was an error declaring your question resolved. Please try again later.</font>");

		header("Location: post.php?".$school_type."=".$school."&m=".$major."&sub=".$subject."&co=".$course."&top=".$topic."");
	} else {
		mysql_query("UPDATE topics SET resolved='1' WHERE major='$major' && subject='$subject' && cours='$course' && id='$topic' && owner_id='$id' && orange_but='$orange_but'") or die("<font style='color:white;'>There was an error declaring your question resolved. Please try again later.</font>");

		header("Location: post.php?".$school_type."=".$school."&m=".$major."&sub=".$subject."&co=".$course."&top=".$topic."&oc=".$orange_but."");
	}
}


	


?>