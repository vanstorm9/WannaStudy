<?php 
include 'general.php';		
include 'connect.php';			
session_start();		
				
		$username = $_POST['username'];
		$password= $_POST['password'];
		
		
		
		if ($username&&$password){
			
			
			$query = mysql_query("SELECT * FROM users WHERE email='$username'");
			$numrows = mysql_num_rows($query);
			
			
			if ($numrows!=0){
				
				while ($row = mysql_fetch_assoc($query)){
					$dbusername = $row['email'];
					$dbpassword = $row['password'];
					
					
				
                                        $activated = $row['activated'];

                                        if ($activated=='0'){
                                               die("Your account has not been activated yet. Please check your email and click on the confirmation link.");
                                               exit();
                                        }
                                           
                                 
				}

				
				
				if ($username == $dbusername&&md5($password)==$dbpassword){
					$_SESSION['username'] = $dbusername;
					
					$user = $_SESSION['username'];
				
					header("Location: home.php");
				
				} else {
					echo "Incorrect password!";
				}
				
			} else {
				echo "That user does not exist!";
			}
			
		} else {
			echo "Please enter a username or a password!";
		}


?>