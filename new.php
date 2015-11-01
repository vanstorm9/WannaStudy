<?php 
mysql_connect('mysql13.000webhost.com', 'a4161536_pvact', 'weborigami9');
mysql_select_db('a4161536_pvact');


$email_query = mysql_query("SELECT * FROM users WHERE activated='0'");


while($row_search = mysql_fetch_array($email_query)){
	$first_name = $row_search['first_name'];
	$id = $row_search['id'];
	$hash = $row_search['random'];
	$email = $row_search['email'];



	$to= $email;
	$subject= "We noticed you haven't activated your account";
	 $headers= "From: Anthony Lowhur";
	 $body = "Hello $first_name
	I noticed that you haven't activated your Rutgers Roommate Search account. You are just one more step away until you activate your account and find your perfect roommate!


	Activate your account here:
	http://rutgersroommate.site11.com/activate.php?p=$id&o=$hash

	If you for any reason have any type of problem activating your account, feel free to contact me (antlowhur@yahoo.com). I will enjoy the engine's service and thank you for taking the step to register

	Anthony Lowhur
	Founder of the Rutgers Roommate Search Engine";
	
	
	mail($to, $subject, $body, $headers);

echo 'Success!<br>';
}



$other_query = mysql_query("SELECT * FROM users");


while($row_search = mysql_fetch_array($other_query)){
	$first_name = $row_search['first_name'];
	$id = $row_search['id'];
	$hash = $row_search['random'];
	$email = $row_search['email'];



	$to= $email;
	$subject= "The Rutgers Roommate Search changed URL location";
	 $headers= "From: Anthony Lowhur";
	 $body = "Hello $first_name
	
	I have changed the location of the Rutgers Roommate Search Engine:
	http://rutgersroommate.site11.com/
	
	
	The URL of the old engine doesn't work anymore. Please proceed to going on this site from now on. Thank you.
	
	Anthony Lowhur
	Founder of the Rutgers Roommate Search Engine";
	
	
	mail($to, $subject, $body, $headers);

echo 'Success!<br>';
}







if (mail($to, $subject, $body, $headers)){
					
		
		die("You have been registered. Check your email to activate your account.");
	} else {
		die("Sorry, there was a failure in sending your activation email.");
	}


?>