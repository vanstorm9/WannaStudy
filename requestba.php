<?php 
include 'connect.php';
include 'general.php';

$user_email = $_POST['user_email_box'];
$request_major = $_POST['major_request_box'];
$request_school = $_POST['school_request_box'];
$request_course = $_POST['course_request_box'];
$subject_message = $_POST['subject_box'];
$request_message = $_POST['textarea_send'];
$user_logged_in = 0;

if($_SESSION['username']){
	$user_logged_in = 1;
	$user_email = $emailaddress;
	$requester_email = $emailaddress;
	$requester_full_name = $fullname;
}


$type_submit = $_POST['type_submit'];

if ($type_submit == 'school'){
	mysql_query("INSERT INTO request_school VALUES('','$id','$user_email','$subject_message','$request_message','$request_school','0',now(),now())") or die("There was a problem sending your request");
	

	echo 'Your have successfully sent your school request!';
} else if ($type_submit == 'major'){
	mysql_query("INSERT INTO request_major VALUES('','$id','$user_email','$subject_message','$request_message','$my_school_int','$request_major','0',now(),now())") or die("There was a problem sending your request");
	
	echo 'Your have successfully sent your major request!';
} else if ($type_submit == 'course'){

	mysql_query("INSERT INTO request_course VALUES('','$id','$user_email','$subject_message','$request_message','$my_school_int','$my_major_int','$request_course','0',now(),now())") or die("There was a problem sending your request");
	echo 'Your have successfully sent your course request!';
}




$to= 'antlowhur@yahoo.com';
$subject= "There was a ".$type_submit." request";

if($user_logged_in == 0){
	$headers= "From: ".$user_email."";
	$body = "There was a ".$type_submit." request made by unknown user:".$user_email."";
} else if($user_logged_in == 1){
	$headers= "From: ".$requester_email."";
	$body = "There was a ".$type_submit." request made by logged in user: ".$requester_full_name."";
}



if (mail($to, $subject, $body, $headers)){
						
	die("Your request was successfully sent!");
} else {
    die("Sorry, there was a failure in sending your request");
}

?>