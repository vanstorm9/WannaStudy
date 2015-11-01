<?php  
include 'connect.php';
include 'general.php';


$name = $_FILES["myfile"]["name"];
$type = $_FILES["myfile"]["type"];
$size = $_FILES["myfile"]["size"];
$temp = $_FILES["myfile"]["tmp_name"];
$error = $_FILES["myfile"]["error"];

if($name){
	if($error > 0){
		die("Error uploading file. Code $error.");
	} else {

		if($type!='image/png' && $type!='image/jpg' && $type!='image/jpeg' && $type!='image/gif'){
			die("That format is not allowed!");
		} else {
		
			$location = "profimg/".$id.".gif";
			move_uploaded_file($temp, $location);
			
			mysql_query("UPDATE users SET avatar='$location' WHERE id='$id'");
			
			echo "Upload Completed <br><a href='settings.php'>Click here to continue.</a>";
		}
	}
} 
?>