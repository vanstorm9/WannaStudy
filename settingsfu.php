<?php 
include 'connect.php';
include 'general.php';

$post_email = $_POST['email_change_box'];
$post_first_name = $_POST['first_name_change_box'];
$post_last_name = $_POST['last_name_change_box'];
$post_major = $_POST['major_box'];
$post_class_of = $_POST['class_of_box'];
$post_location = $_POST['location_box'];

$fullname = $post_first_name." ".$post_last_name;

$post_major_id = mysql_query("SELECT id FROM school WHERE name='$post_major'");
$major_id_row = mysql_fetch_assoc($post_major_id);
$major_id = $major_id_row['id'];


mysql_query("UPDATE users SET email='$post_email', username='$post_email', firstname='$post_first_name', lastname='$post_last_name', full_name='$fullname' && major='$major_id', class_year='$post_class_of' WHERE username='$username' && id='$id'");

if($username != $old_username){

	$queryuserget = mysql_query("SELECT username FROM users WHERE id='$id'");
	$rowuser = mysql_fetch_assoc($queryuserget);
	$username = $rowuser['username'];
	
	$_SESSION['username'] = $username;
	
} 





$name = $_FILES["myfile"]["name"];
$type = $_FILES["myfile"]["type"];
$size = $_FILES["myfile"]["size"];
$temp = $_FILES["myfile"]["tmp_name"];
$error = $_FILES["myfile"]["error"];


if($name){
	if($error > 0){
		die("Error uploading file. Code $error.");
	} else {

		if($type!='image/png' && $type!='image/jpg' && $type!='image/gif'){
			die("That format is not allowed!");
		} else {
		
			$location = "img/".$id.".gif";
			move_uploaded_file($temp, $location);
			echo "Upload Completed";
		}
	}
} 






echo 'You have updated your profile. <br><a href="settings.php">Click here to continue.</a>';



?>