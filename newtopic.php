<html>
<head>
<link href = "css/bootstrap.min.css" rel= "stylesheet">
<link href = "css/styles.css" rel= "stylesheet">
</head>

<title>Create a Topic</title>
	
<body>
<?php 
include 'connect.php';
include 'header.php';
include 'general.php';
include 'navbar.html';

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
$course = $_GET['cours'];
$orange_topic = $_GET['oc'];



?>

<center><font style='color:white;'><h1>Create a Topic</h1></font></center>


<div style='width:80%; margin:auto; min-height:400px; padding:15px;'>
<form method='post' action='topicmake.php' >
	<input type='hidden' name='majorhide' value='<?php echo $major;?>'>
	<input type='hidden' name='subjecthide' value='<?php echo $subject;?>'>
	<input type='hidden' name='schoolhide' value='<?php echo $school;?>'>
	<input type='hidden' name='school_type_hide' value='<?php echo $school_type;?>'>
	<input type='hidden' name='coursehide' value='<?php echo $course;?>'><br>
	<input type='hidden' name='schooltypehide' value='<?php echo $school_type;?>'>
	<input type='hidden' name='orangetopichide' value='<?php echo $orange_topic;?>'>
	
	<center>
		<font style='color: white'>Title: </font>
		<input class='form-control' type='text' name='subjectbox' style='width:320px;'><br><br>

		<textarea class="form-control" style='width:60%;' rows='12' name='textarea_topic' placeholder='Type in the post for your topic.'></textarea><br>
		<a href='latex_math_reference.php' target='_blank'>How to type math symbols (like integral, fractions, sum, square root, etc)</a>
		<br><br>
		<input type='checkbox' name='anonymous_box' value='1'><font color='white' size='2px'>Send as Anonymous</font>
		<br><br>
		<center><input type='submit' name='submit' value='Post topic'></center>
	</center>
</form>

</div>

</body>


</html>
