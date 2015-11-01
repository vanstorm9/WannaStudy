<html>
<head>
<link type="text/css" href="studystylesheet.css" rel="stylesheet">

<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<link href = "css/bootstrap.min.css" rel= "stylesheet">
<link href = "css/styles.css" rel= "stylesheet">
<?php 
include 'connect.php';
include 'general.php';
include 'navbar.html';
include 'sessioncheck.php';

?>
</head>
<body>
<?php 
if ($_GET['hs']&&empty($_GET['uni'])){
	$school = $_GET['hs'];
	$school_type = 'hs';
} else if ($_GET['uni']&&empty($_GET['hs'])){
	$school = $_GET['uni'];
	$major = $_GET['maj'];
	$school_type = 'uni';
}
$original_post_state = $_GET['opp'];
$major = $_GET['m'];
$subject = $_GET['sub'];
$course = $_GET['co'];
$topic = $_GET['to'];
$orange_but = $_GET['oc'];
$post_id = $_GET['ic'];

if ($orange_but == ''){
	$orange_but = 'False';
}



?>
<center><font style='color:white;'><h1>Are you sure you want to delete this post?</h1></font></center>
<center>
	<form action='post_delete_ba.php' method='post'>
		<button type="submit" class="btn btn-primary btn-lg" name='delete_post_but' value='1'>Delete Post</button>&nbsp;&nbsp; <button type="button" class="btn btn-primary btn-lg">Cancel</button>
		<input type='hidden' name='subjecthide' value='<?php echo $subject;?>'>
		<input type='hidden' name='majorhide' value='<?php echo $major;?>'>
		<input type='hidden' name='school_type_hide' value='<?php echo $school_type;?>'>
		<input type='hidden' name='schoolhide' value='<?php echo $school;?>'>
		<input type='hidden' name='coursehide' value='<?php echo $course;?>'>
		<input type='hidden' name='topichide' value='<?php echo $topic;?>'>
		<input type='hidden' name='posthide' value='<?php echo $post;?>'>
		<input type='hidden' name='orangebuthide' value='<?php echo $orange_but;?>'>
		<input type='hidden' name='post_idbuthide' value='<?php echo $post_id;?>'>
		<input type='hidden' name='ophide' value='<?php echo $original_post_state;?>'>
	</form>
</center>

</body>
</html>