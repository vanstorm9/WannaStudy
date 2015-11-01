<html>
<head>
<link type="text/css" href="studystylesheet.css" rel="stylesheet">

<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css" type="text/css"/>

<link href = "css/bootstrap.min.css" rel= "stylesheet">
<link href = "css/styles.css" rel= "stylesheet">
	
<link type="text/css" href="studystylesheet.css" rel="stylesheet">
<link type="text/css" href="orange_button.css" rel="stylesheet">
<link type="text/css" href="css/lartab.css" rel="stylesheet">
<?php 
include 'connect.php';
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

$subject = $_GET['sub'];
$course = $_GET['co'];
$major = $_GET['m'];
$orange_but = $_GET['oc'];


if ($orange_but == 1){
	$sub_topic_name = "Find Study Group";
} else if ($orange_but == 2) {
	$sub_topic_name = "Review/Share Notes";
} else if ($orange_but == 3) {
	$sub_topic_name = "Homework/Test";
} else if ($orange_but == 4) {
	$sub_topic_name = "#4";
} else if ($orange_but == 5) {
	$sub_topic_name = "#5";
} else if ($orange_but == 6) {
	$sub_topic_name = "#6";
} 

$post_post_name = mysql_query("SELECT name FROM topics WHERE school='$school' && subject='$subject' && id='$topic' && cours='$course'");
$post_post_row = mysql_fetch_assoc($post_post_name);
$post_name = $post_post_row['name'];
	
$post_topic_name = mysql_query("SELECT name FROM cours WHERE school='$school' && subject='$subject' && id='$course'");
$topic_name_row = mysql_fetch_assoc($post_topic_name);
$topic_name = $topic_name_row['name'];

$post_course_name = mysql_query("SELECT name FROM subjet WHERE school='$school' && id='$subject'");
$course_name_row = mysql_fetch_assoc($post_course_name);
$course_name = $course_name_row['name'];

$post_subject_name = mysql_query("SELECT name FROM major WHERE school='$school' && id='$major'");
$subject_name_row = mysql_fetch_assoc($post_subject_name);
$subject_name = $subject_name_row['name'];

$post_major_name = mysql_query("SELECT name FROM school WHERE id='$school'");
$major_name_row = mysql_fetch_assoc($post_major_name);
$major_name = $major_name_row['name'];

?>
</head>
<body>

<div class="container">
<br>
<font style='color:white;'>Back to: 
<a href='college.php'><u>Colleges</u></a> ->
<a href='major.php?<?php echo $school_type; ?>=<?php echo $school;?>'><u><?php echo $major_name; ?></u></a> ->
<a href='subject.php?<?php echo $school_type; ?>=<?php echo $school;?>&m=<?php echo $major;?>'><u><?php echo $subject_name; ?></u></a> ->
 <a href='course.php?<?php echo $school_type; ?>=<?php echo $school;?>&m=<?php echo $major;?>&sub=<?php echo $subject; ?>'><u><?php echo $course_name; ?></u></a> ->
 <a href='topics.php?<?php echo $school_type; ?>=<?php echo $school;?>&m=<?php echo $major;?>&sub=<?php echo $subject; ?>&co=<?php echo $course; ?>'><u><?php echo $topic_name; ?></u></a> </font>
<br><br>
<center><font style='color:white;'><h1><?php echo $sub_topic_name;?></h1></font></center>
<br><br>
<?php 


if ($user){

?>

	<a href='newtopic.php?<?php echo $school_type ?>=<?php echo $school; ?>&m=<?php echo $major;?>&sub=<?php echo $subject; ?>&cours=<?php echo $course; ?>&oc=<?php echo $orange_but;?>' class='topicbutton'>Create a new topic</a>
	&nbsp;&nbsp;
	<script src="https://apis.google.com/js/platform.js"></script>
<div id="placeholder-div1"></div>
<script>
  gapi.hangout.render('placeholder-div1', {
    'render': 'createhangout',
    'initial_apps': [{'app_id' : '184219133185', 'start_data' : 'dQw4w9WgXcQ', 'app_type' : 'ROOM_APP' }]
  });
</script>
<?php 

} else {

}
?>

<div style='width:90%; margin:auto; padding:10px;'>
<?php
$topic_query_2= mysql_query("SELECT id, name, valid_name, owner, time, date, school, major, subject, image, cours, orange_but, image_hover, resolved, relation, type FROM topics WHERE school='$school' && major='$major' && subject='$subject'&& cours='$course' && orange_but='$orange_but' && type='1' && orange_but!='0' ORDER BY id desc");


	
	while($topic_row = mysql_fetch_array($topic_query_2)){
		$topic_id = $topic_row['id'];
		$topic_name = $topic_row['name'];
		$topic_valid_name = $topic_row['valid_name'];
		$topic_owner = $topic_row['owner'];
		$topic_school = $topic_row['school'];
		$topic_major = $topic_row['major'];
		$topic_subject = $topic_row['subject'];
		$topic_course = $topic_row['cours'];
		$topic_orange_but = $topic_row['orange_but'];
		$topic_image = $topic_row['image'];
		$topic_image_hover = $topic_row['image_hover'];
		$topic_resolved = $topic_row['resolved'];
		$topic_relation = $topic_row['relation'];
		$topic_type = $topic_row['type'];
		$topic_time = $topic_row['time'];
		$topic_date = $topic_row['date'];
		$resolved = $topic_row['resolved'];
		
		

		$topic_class = $topic_valid_name.$topic_school.$topic_subject.$topic_id.$topic_course;

		$query_last_user = mysql_query("SELECT last_user FROM topics WHERE id='$topic_id'");
		$row_last_user = mysql_fetch_assoc($query_last_user);
		$last_user = $row_last_user['last_user'];	
		
		
		if($resolved == 0){
			$resolved_image = "<img src='http://goo.gl/vqFmdK'>";
		} else if ($resolved == 1) {
			$resolved_image ='';
		}
		
		
		$post_amount = mysql_num_rows(mysql_query("SELECT * FROM posts WHERE major='$topic_major' && subject='$topic_subject' && cours='$topic_course' && topics='$topic_id' && orange_but='$orange_but'"));
		
		
		echo "<center>".$resolved_image." <a href='post.php?".$school_type."=".$topic_school."&m=".$topic_major."&sub=".$topic_subject."&co=".$topic_course."&top=".$topic_id."&oc=".$topic_orange_but."' class='topic_but'>".$topic_name."</a></center><br>
			<center><div><font style='color:white'><u>Topic posted on:</u> <font style='color:#2EFEF7'>".$topic_date." | ".$topic_time."</font> | <u>Number of Posts:</u> <font style='color:#2EFEF7'>".$post_amount."</font> | <u>Topic created by:</u> <font style='color:#2EFEF7'>".$topic_owner."</font> | <u>Last post by:</u> <font style='color:#2EFEF7'>".$last_user."</font></font></div></center>
			<br>";

	}

	if (mysql_num_rows($topic_query_2) == 0){
		echo "<center><font style='color:white'>There are no topics posted yet.</font></center>";
	}


	?>
</div>
</div>
</body>
</html>