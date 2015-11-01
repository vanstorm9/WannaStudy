<html>
<head>
<script src= "http://code.jquery.com/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css" type="text/css"/>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>


<script src='jquery.js'></script>
<script src='index.js'></script>
<script src='ui.js'></script>

<link href = "css/bootstrap.min.css" rel= "stylesheet">
<link href = "css/styles.css" rel= "stylesheet">

<?php 

include 'header.php';
include 'connect.php';
include 'general.php';
include 'navbar.html';

$school = $_GET['rs'];
$major = $_GET['rm'];
$course = $_GET['rc'];

if($school=='1' && $major=='' && $course==''){
	$type_node = 'school';
	echo "<title>Request a School</title>";
} else if($school=='' && $major=='1' && $course==''){
	$type_node = 'major';
	echo "<title>Request a Major</title>";
} else if($school=='' && $major=='' && $course=='1'){
	$type_node = 'course';
	echo "<title>Request a Course</title>";
}

?>
</head>

<body>
<div class="container">
	<br><br>
	<center><font style='color:white;'><h1>Request a <?php echo $type_node;?></h1></font></center>
	<br>
	
	<form action='requestba.php' method='post'>
	<center>
	
	<?php 
	if (!$user){
	?>
	<font style='color:white;'>Email Address:</font> <input type="text" class="form-control" placeholder="Email Address" required autofocus name='user_email_box' style='width:400px;'>
	<?php 
	}
	?>
	<?php
	if($school=='' && $major=='1' && $course==''){
	?>
		<br>
		<font style='color:white;'>Major:</font> <input type="text" class="form-control" placeholder="What major are you requesting?" required autofocus name='major_request_box' style='width:400px;'>
	<?php 
	} else if ($school=='1' && $major=='' && $course=='') {
	?>
		<br>
		<font style='color:white;'>School:</font> <input type="text" class="form-control" placeholder="What school are you requesting?" required autofocus name='school_request_box' style='width:400px;'>

	<?php 
	} else if ($school=='' && $major=='' && $course=='1') {
	?>
		<br>
		<font style='color:white;'>Course:</font> <input type="text" class="form-control" placeholder="What course are you requesting?" required autofocus name='course_request_box' style='width:400px;'>

	<?php 
	}
	?>
	<br>
	<font style='color:white;'>Subject:</font> <input type="text" class="form-control" placeholder="Subject of message" required autofocus name='subject_box' style='width:400px;'>
	<br>
	<textarea class="form-control" style='width:60%;' rows='12' name='textarea_send' placeholder='Details on your request'></textarea>
	<br>
	<button class="btn btn-lg btn-info btn-block" style='width:70%' type="submit" name='submit'>Submit Request</button>
	</center>
	
	
	
	<input type="hidden" value='<?php echo $type_node;?>' name='type_submit'>
	
	</form>
	
	<br>
</div>
</body>
</html>