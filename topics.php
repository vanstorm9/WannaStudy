<html>
<head>
<script src= "http://code.jquery.com/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css" type="text/css"/>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>

<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css" type="text/css"/>
<link href = "css/bootstrap.min.css" rel= "stylesheet">
<link href = "css/styles.css" rel= "stylesheet">

<link type="text/css" href="studystylesheet.css" rel="stylesheet">
<link type="text/css" href="orange_button.css" rel="stylesheet">
<link type="text/css" href="css/lartab.css" rel="stylesheet">
<script src='jquery.js'></script>
<script src='index.js'></script>
<script src='ui.js'></script>

<?php 
include 'header.php';
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
$filter = $_GET['fil'];


$post_topic_name = mysql_query("SELECT name FROM cours WHERE school='$school' && id='$course' && major='$major' && subject='$subject'");
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

//$post_in_all_subject = mysql_query("SELECT in_all_subject FROM subjet WHERE id='$school'");
//$in_all_subject_row = mysql_fetch_assoc($post_in_all_subject);
//$in_all_subject = $in_all_subject_row['in_all_subject'];

$post_sub_sect_bond = mysql_query("SELECT sub_sect_bond FROM subjet WHERE school='$school' && major='$major' && id='$subject'");
$sub_sect_bond_row = mysql_fetch_assoc($post_sub_sect_bond);
$sub_sect_bond = $sub_sect_bond_row['sub_sect_bond'];


if($sub_sect_bond!=0){
	$post_bond_major_query = mysql_query("SELECT major FROM cours WHERE sub_sect_bond='$sub_sect_bond' && school='$school' && id='$course'");
	$bond_major_row = mysql_fetch_assoc($post_bond_major_query);
	$bond_major = $bond_major_row['major'];
	
	$post_bond_subject_query = mysql_query("SELECT subject FROM cours WHERE sub_sect_bond='$sub_sect_bond' && school='$school' && id='$course'");
	$bond_subject_row = mysql_fetch_assoc($post_bond_subject_query);
	$bond_subject = $bond_subject_row['subject'];
	
	$post_bond_topic_name_query = mysql_query("SELECT name FROM cours WHERE sub_sect_bond='$sub_sect_bond' && school='$school' && id='$course'");
	$bond_topic_name_row = mysql_fetch_assoc($post_bond_topic_name_query);
	$bond_topic_name = $bond_topic_name_row['name'];
	

	$post_course_name = mysql_query("SELECT name FROM subjet WHERE school='$school' && id='$bond_subject' && major='$bond_major'");
	$course_name_row = mysql_fetch_assoc($post_course_name);
	$course_bond_name = $course_name_row['name'];
}



?>


</head>


<body>

<div style='padding: 10px;'>
<br>
<font style='color:white;'>Back to: 
<a href='college.php'><u>Colleges</u></a> ->
<a href='major.php?<?php echo $school_type; ?>=<?php echo $school;?>'><u><?php echo $major_name; ?></u></a> ->
<a href='subject.php?<?php echo $school_type; ?>=<?php echo $school;?>&m=<?php echo $major;?>'><u><?php echo $subject_name; ?></u></a> ->
	
<?php

if($sub_sect_bond==0){
?>
	 <a href='course.php?<?php echo $school_type; ?>=<?php echo $school;?>&m=<?php echo $major;?>&sub=<?php echo $subject; ?>'><u><?php echo $course_name; ?></u></a></font>
<?php
}else {
?>
	 <a href='course.php?<?php echo $school_type; ?>=<?php echo $school;?>&m=<?php echo $major;?>&sub=<?php echo $subject; ?>'><u><?php echo $course_bond_name; ?></u></a></font>
<?php
}	
?>
<br><br>
<?php 
if ($course== 1){
?>
	<center><font style='color:white;'><h1><?php echo $course_name;?></h1></font></center>
	<title><?php echo $course_name;?></title>
<?php 
} else {
	if($sub_sect_bond!=0){
?>		
		<center><font style='color:white;'><h1><?php echo $bond_topic_name;?></h1></font></center>
	<title><?php echo $bond_topic_name;?></title>
<?php
	} else {	
	
?>
	<center><font style='color:white;'><h1><?php echo $topic_name;?></h1></font></center>
	<title><?php echo $topic_name;?></title>
<?php 
	}
}
?>
<br><br>
<font style='color:white;'>Filter by:</font>
<br>
<a href='topics.php?<?php echo $school_type;?>=<?php echo $school;?>&m=<?php echo $major;?>&sub=<?php echo $subject;?>&co=<?php echo $course;?>&fil=school'>Topics Throughout School</a> <font style='color:white;'>| </font>
<a href='topics.php?<?php echo $school_type;?>=<?php echo $school;?>&m=<?php echo $major;?>&sub=<?php echo $subject;?>&co=<?php echo $course;?>&fil=major'>Within Major Only</a>
<br><br>

<div style='width:90%; margin:auto; padding:10px;'>



<center><table width="900px">
	<tr>
		<td>
			<center><a href='subtopics.php?<?php echo $school_type;?>=<?php echo $school;?>&sub=<?php echo $subject;?>&m=<?php echo $major;?>&co=<?php echo $course;?>&oc=1' class='orange_button'></a></center><br>
			<center><h3><font style='color:white'>Find a Study Group</font></h3></center>
		</td>
		<td>
			<center><a href='subtopics.php?<?php echo $school_type;?>=<?php echo $school;?>&sub=<?php echo $subject;?>&m=<?php echo $major;?>&co=<?php echo $course;?>&oc=2' class='orange_button'></a></center><br>
			<center><h3><font style='color:white'>Review/Share notes</font></h3></center>
		</td>
		<td>
			<center><a href='subtopics.php?<?php echo $school_type;?>=<?php echo $school;?>&sub=<?php echo $subject;?>&m=<?php echo $major;?>&co=<?php echo $course;?>&oc=3' class='orange_button'></a></center><br>
			<center><h3><font style='color:white'>Homework/Tests</font></h3></center>
		</td>

	</tr>
	<!--<tr>
		<td>
			<center><a href='subtopics.php?<?php echo $school_type;?>=<?php echo $school;?>&sub=<?php echo $subject;?>&m=<?php echo $major;?>&co=<?php echo $course;?>&oc=4' class='orange_button'></a></center><br>
			<center><h3><font style='color:white'>Khan Studio</font></h3></center>
		</td>
		<td>
			<center><a href='subtopics.php?<?php echo $school_type;?>=<?php echo $school;?>&sub=<?php echo $subject;?>&m=<?php echo $major;?>&co=<?php echo $course;?>&oc=5' class='orange_button'></a></center><br>
			<center><h3><font style='color:white'>Google Hangouts</font></h3></center>
		</td>
		<td>
			<center><a href='subtopics.php?<?php echo $school_type;?>=<?php echo $school;?>&sub=<?php echo $subject;?>&m=<?php echo $major;?>&co=<?php echo $course;?>&oc=6' class='orange_button'></a></center><br>
			<center><h3><font style='color:white'>(I don't know)</font></h3></center>
		</td>
	</tr>-->

	
	
</table></center>
<br><br>

<?php 


if ($user){

?>

	<a href='newtopic.php?<?php echo $school_type ?>=<?php echo $school; ?>&m=<?php echo $major;?>&sub=<?php echo $subject; ?>&cours=<?php echo $course; ?>' class='topicbutton'>Create a new topic</a>
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

	<br><br>
	<?php
$topic_relation_2= '1';

if($filter == ''){
	if($sub_sect_bond==0 && $course== 1){
		$topic_query_2= mysql_query("SELECT id, name, valid_name, owner, time, date, school, major, subject, image, cours, image_hover, resolved, relation, type FROM topics WHERE school='$school' && cours='$course' && subject='$subject' && type='1' && orange_but='0' ORDER BY id desc");
	} else {
		$topic_query_2= mysql_query("SELECT id, name, valid_name, owner, time, date, school, major, subject, image, cours, image_hover, resolved, relation, type FROM topics WHERE school='$school' && cours='$course' && type='1' && orange_but='0' ORDER BY id desc");
	}
} else if ($filter == 'school'){
  if($sub_sect_bond==0 && $course== 1){
		$topic_query_2= mysql_query("SELECT id, name, valid_name, owner, time, date, school, major, subject, image, cours, image_hover, resolved, relation, type FROM topics WHERE school='$school' && subject='$subject' && cours='$course' && type='1' && orange_but='0' ORDER BY id desc");
	} else {
		$topic_query_2= mysql_query("SELECT id, name, valid_name, owner, time, date, school, major, subject, image, cours, image_hover, resolved, relation, type FROM topics WHERE school='$school' && cours='$course' && type='1' && orange_but='0' ORDER BY id desc");
	}
} else if ($filter == 'major'){
  $topic_query_2= mysql_query("SELECT id, name, valid_name, owner, time, date, school, major, subject, image, cours, image_hover, resolved, relation, type FROM topics WHERE school='$school' && cours='$course' && major='$major' && subject='$subject'&& cours='$course' && type='1' && orange_but='0' ORDER BY id desc");
}
	
	/* blue button topics */
	
	while($topic_row = mysql_fetch_array($topic_query_2)){
		$topic_id = $topic_row['id'];
		$topic_name = $topic_row['name'];
		$topic_valid_name = $topic_row['valid_name'];
		$topic_owner = $topic_row['owner'];
		$topic_school = $topic_row['school'];
		$topic_major = $topic_row['major'];
		$topic_subject = $topic_row['subject'];
		$topic_course = $topic_row['cours'];
		$topic_image = $topic_row['image'];
		$topic_image_hover = $topic_row['image_hover'];
		$topic_image_active = $topic_row['image_active'];
		$topic_relation = $topic_row['relation'];
		$topic_type = $topic_row['type'];
		$original_topic_time = $topic_row['time'];
		$original_topic_date = $topic_row['date'];
		$resolved = $topic_row['resolved'];
		

		$topic_time = date("g:i:s a", strtotime($original_topic_time));	
		$topic_date = date("m/d/y", strtotime($original_topic_date));

		$topic_class = $topic_valid_name.$topic_school.$topic_subject.$topic_id.$topic_course;

		$query_last_user = mysql_query("SELECT last_user FROM topics WHERE id='$topic_id'");
		$row_last_user = mysql_fetch_assoc($query_last_user);
		$last_user = $row_last_user['last_user'];	
		

		
		if($resolved == 0){
			$resolved_image = "<img src='http://goo.gl/vqFmdK'>";
		} else if ($resolved == 1) {
			$resolved_image ='';
		}
		
		$post_amount = mysql_num_rows(mysql_query("SELECT * FROM posts WHERE major='$topic_major' && subject='$topic_subject' && cours='$topic_course' && topics='$topic_id'"));
		
		
			echo "<center>".$resolved_image." <a href='post.php?".$school_type."=".$topic_school."&m=".$topic_major."&sub=".$topic_subject."&co=".$topic_course."&top=".$topic_id."' class='topic_but'>".$topic_name."</a></center><br>
			<center><div><font style='color:white'><u>Topic posted on:</u> <font style='color:#2EFEF7'>".$topic_date." | ".$topic_time."</font> | <u>Number of Posts:</u> <font style='color:#2EFEF7'>".$post_amount."</font> | <u>Topic created by:</u> <font style='color:#2EFEF7'>".$topic_owner."</font> | <u>Last post by:</u> <font style='color:#2EFEF7'>".$last_user."</font></font></div></center>
			<br>";
		
		

	}

	if (mysql_num_rows($topic_query_2) == 0){
		echo "<center><font style='color:white'>There are no topics posted yet.</font></center>";
	}


	?>
</div>
</body>


</html>