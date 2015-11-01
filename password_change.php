<?php 
include 'connect.php';
include 'general.php';
//include 'sessioncheck.php';

//session_start();

//$user = $_SESSION['username'];

//if ($user){

//echo "Here is: ".$_POST['pass_submit']."<br> and :".$_POST['old_password_change_box']."<br>";

	//if ($_POST['pass_submit']){

		$oldpassword= $_POST['old_password_change_box'];
		$newpassword= $_POST['password_change_box'];
		$repeatnewpassword= $_POST['re_password_change_box'];

		if ($oldpassword&&$newpassword&&$repeatnewpassword){

			$oldpassword= md5($_POST['old_password_change_box']);
			$newpassword= md5($_POST['password_change_box']);
			$repeatnewpassword= md5($_POST['re_password_change_box']);
			

			$queryget = mysql_query("SELECT password FROM users WHERE id ='$id'");
			$oldpassdb_row = mysql_fetch_assoc($queryget);

			$oldpassworddb= $oldpassdb_row['password'];

				 
			if ($oldpassword == $oldpassworddb){
				if ($newpassword == $repeatnewpassword){
					$querychange= mysql_query("UPDATE users SET password='$newpassword' WHERE id = '$id'");
						
					die("Your password has successfully changed! <a href='settings.php'>Click here to continue</a>");
						
						
				} else {
					die("New passwords do not match");
				}

			} else {
				die("Old password do not match.");
			}

		} else {
			   echo "You need to fill out <strong>ALL</strong> fields.";
		}
	//} else  {

		//echo('There was an error');
	//}	
//} else {
	//die("You must be logged in in order to change your password.");
//}




?>
