<?php 
include 'connect.php';


		if (isset($_POST['submit'])){
			$username = $_POST['usernamebox'];
			$password = md5($_POST['passwordbox']);
			
			if(empty($username) or empty($password)){
				echo "You need to fill out ALL fields.";
			} else {
				$usernamequery = mysql_query("SELECT username FROM users WHERE username='$username'");
				$usernamerow = mysql_fetch_assoc($usernamequery);
				$usernamedb = $usernamerow['username'];
				
				$passwordquery = mysql_query("SELECT password FROM users WHERE username='$username'");
				$passwordrow = mysql_fetch_assoc($passwordquery);
				$passworddb = $passwordrow['password'];
				
				if (($username == $usernamedb) && ($password == $passworddb)){
				
					$_SESSION['username'] = $username;
					$user = $_SESSION['user_id'];
					
					include 'general.php';
					
					if ($my_school_type != "" && $my_school_int != "" && $my_major_int != "" ){ 
						header("location: subject.php?".$my_school_type."=".$my_school_int."&m=".$my_major_int."");
					} else {
						header("location: index.php");
					}
				} else {
					echo 'Sorry, you typed in an invalid username or password. Please try again.';
				}
				
				
			}
			
		
		}
?>