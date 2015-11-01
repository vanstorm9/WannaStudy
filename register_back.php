<?php 
	include 'connect.php';

	

	require "sendgrid-php/sendgrid-php.php";
	
	

	$submit = strip_tags($_POST['submit']);
	$firstname = strip_tags($_POST['first_name']);
	$lastname = strip_tags($_POST['last_name']);
	$email = strip_tags($_POST['email_box']);
	$username = strip_tags($_POST['email_box']);
	$password = strip_tags($_POST['password_box']);
	$repeatpassword = strip_tags($_POST['re_password_box']);
	$date = date("Y-m-d");
	$logindate = date("Y-m-d");
	$recenttime = date('H:i:s');
	$class_of = strip_tags($_POST['class_box']);
	$gender = $_POST['gender'];

	
	$firstname = mysql_real_escape_string($firstname);
	$lastname = mysql_real_escape_string($lastname);
	$email = mysql_real_escape_string($email);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	
	
	
	

	
	if ($submit){
		
                
                $namecheck= mysql_query("SELECT email FROM users WHERE email='$username'");
                $count = mysql_num_rows($namecheck);


                if ($count!=0){
                die("Email was already taken");
                }

		if ($username&&$firstname&&$lastname&&$email&&$password&&$repeatpassword&&$class_of&&$gender){

			if ($password == $repeatpassword){
				

					if (strlen($password) > 25 || strlen($password) < 6){
						echo "Your password must be between 6-25 characters!";
						
					} else {
						$password = md5($password);
						$repeatpassword =md5($repeatpassword);
						
						
						
						if (isset($_POST['email_box']) == true && empty($_POST['email_box']) == false){
				
							if (filter_var($email, FILTER_VALIDATE_EMAIL) == true){
								
							} else {
								die("Sorry, you typed in an invalid email address");
							}
						
						} else {
							die("You need to type in your email address.");
						
						}
						

						$random = rand(23456789,98765432);
						$queryreg = mysql_query("INSERT users VALUE ('','$firstname','$lastname','$username','$class_of','$gender','$password','$random','','','','$date','$logindate','$recenttime','0')");
						$lastid = mysql_insert_id();
						
/*
                                                

                                                $to= $email;
                                                $subject= "Activate your Rutgers Roommate account";
                                                $headers= "From: Anthony Lowhur";
                                                $body = "Hello $firstname
Thanks for creating an account for the Rutgers Roommate Search Engine! You are one click way from finding the perfect roommate! Activate your account by clicking on the link below:
http://rutgersroommate.site11.com/activate.php?p=$lastid&o=$random

Thank you!
Anthony Lowhur
Founder of the Rutgers Roommate Search Engine";


                                                if (mail($to, $subject, $body, $headers)){
						
												die("You have been registered. Check your email to activate your account.");
                                                } else {
                                                 die("Sorry, there was a failure in sending your activation email.");
                                                }*/
						$sendgrid = new SendGrid('antlowhur', 'origami9');
						$email_send = new SendGrid\Email();


						$email_send->addTo($email)->
							   //addTo('bar@foo.com')->
							   setFrom('wannastudyteam@gmail.com')->
							   setFromName('WannaStudy Team')->
							   setSubject('Activate your WannaStudy Account')->
							   //setText('Hello World!')->
							   setHtml('Hello $firstname
Thanks for creating an account for WannaStudy! You are one click way from joining the academic community! Activate your account by clicking on the link below:
http://wannastudy.herobo.com/activate.php?p=$lastid&o=$random

Thank you!
Anthony Lowhur
Founder of WannaStudy');

						echo "Message created<br>";   
						
						$sendgrid->send($email_send);

						echo "You have successfully registered! Please check your email to activate your account.";
					}
					
				
			} else {
				echo "Your passwords do not match!";
			}
			
			
		} else {
			echo "Please fill in <strong>ALL</strong> fields";
		}
		
	} else {
		echo 'Page Load Error';
	}
	


?>

