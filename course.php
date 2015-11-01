<html>
<head>
<script src= "http://code.jquery.com/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css" type="text/css"/>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
<link rel="shortcut icon" type="image/png" href="http://pvhs.k12.nj.us/favicon.ico">

<script src='jquery.js'></script>
<script src='index.js'></script>
<script src='ui.js'></script>

<link href = "css/bootstrap.min.css" rel= "stylesheet">
<link href = "css/styles.css" rel= "stylesheet">
<link href = "css/buttons.css" rel= "stylesheet">

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
	$school_type = 'uni';
}


$subject = $_GET['sub'];
$major = $_GET['m'];

$post_course_name = mysql_query("SELECT name FROM subjet WHERE school='$school' && id='$subject' && major='$major'");
$course_name_row = mysql_fetch_assoc($post_course_name);
$course_name = $course_name_row['name'];

$post_subject_name = mysql_query("SELECT name FROM major WHERE school='$school' && id='$major'");
$subject_name_row = mysql_fetch_assoc($post_subject_name);
$subject_name = $subject_name_row['name'];

$post_subject_name = mysql_query("SELECT name FROM major WHERE school='$school' && id='$major'");
$subject_name_row = mysql_fetch_assoc($post_subject_name);
$subject_name = $subject_name_row['name'];

$post_major_name = mysql_query("SELECT name FROM school WHERE id='$school'");
$major_name_row = mysql_fetch_assoc($post_major_name);
$major_name = $major_name_row['name'];


$post_sub_sect_bond = mysql_query("SELECT sub_sect_bond FROM subjet WHERE school='$school' && major='$major' && id='$subject'");
$sub_sect_bond_row = mysql_fetch_assoc($post_sub_sect_bond);
$sub_sect_bond = $sub_sect_bond_row['sub_sect_bond'];



?>

</head>
<title>Courses</title>

<body>
<div style='padding: 10px;'>
<br>
<font style='color:white;'>Back to: 
<a href='college.php'><u>Colleges</u></a> ->
<a href='major.php?<?php echo $school_type; ?>=<?php echo $school;?>'><u><?php echo $major_name; ?></u></a> ->
<a href='subject.php?<?php echo $school_type; ?>=<?php echo $school;?>&m=<?php echo $major;?>'><u><?php echo $subject_name; ?></u></a></font>
<br><br>
<center><font style='color:white;'><h1><?php echo $course_name;?></h1></font></center>
<br><br>

<div style='margin:auto; width:75%;'>
<table>
<tr>
<?php 

if($sub_sect_bond==0){
	
	$sub_section_check = mysql_num_rows(mysql_query("SELECT * FROM cours WHERE school='$school' && subject='$subject' && major='$major'"));
	
	if ($sub_section_check == 0){
		header("Location: topics.php?".$school_type."=".$school."&m=".$major."&sub=".$subject."&co=1");
	}
	
	$course_query = mysql_query("SELECT id, name, valid_name, school, major, subject, image, image_hover,image_active, relation FROM cours WHERE school='$school' && major='$major' && subject='$subject'  ORDER BY relation");

} else {
	$post_bond_school_query = mysql_query("SELECT school FROM cours WHERE sub_sect_bond='$sub_sect_bond' && school='$school'");
	$bond_school_row = mysql_fetch_assoc($post_bond_school_query);
	$bond_school = $bond_school_row['school'];
	
	//$post_bond_subject_query = mysql_query("SELECT subject FROM cours WHERE sub_sect_bond='$sub_sect_bond' && school='$school' && subject='$subject'");
	//$bond_subject_row = mysql_fetch_assoc($post_bond_subject_query);
	//$bond_subject = $bond_subject_row['subject'];
	
	$post_bond_major_query = mysql_query("SELECT major FROM cours WHERE sub_sect_bond='$sub_sect_bond' && school='$school'");
	$bond_major_row = mysql_fetch_assoc($post_bond_major_query);
	$bond_major = $bond_major_row['major'];
	
	echo $bond_subject;
	
	$course_query = mysql_query("SELECT id, name, valid_name, school, major, subject, image, image_hover,image_active, relation FROM cours WHERE school='$bond_school' && major='$bond_major' && parent_bond='$course_name'  ORDER BY relation");

}
 

$course_relation_2= '1';

while($course_row = mysql_fetch_array($course_query)){
	$course_id = $course_row['id'];
	$course_name = $course_row['name'];
	$course_valid_name = $course_row['valid_name'];
	$course_school = $course_row['school'];
	$course_major = $course_row['major'];
	$course_subject = $course_row['subject'];
	$course_image = $course_row['image'];
	$course_hover = $course_row['image_hover'];
	$course_active = $course_row['image_active'];
	
	$course_relation_1 = $course_row['relation'];
	

	$course_class = $course_valid_name.$course_school.$course_subject.$course_id;
	
	if($course_relation_1 != $course_relation_2){
		echo "</tr>";
		$i= 0;
		$course_relation_2 = $course_relation_1;
	}
	
	if($sub_sect_bond!=0){
		$course_major = $major;
		$course_subject = $subject;
	}
	
	
	echo "<td style='padding:15px;'><a href='topics.php?".$school_type."=".$course_school."&m=".$course_major."&sub=".$course_subject."&co=".$course_id."'  class='norm_but' style='background-image:url(".$course_image.")'></a><br>
	<center><h3><font style='color:white'>".$course_name."</font></h3></center>";
	


	$i++;
	
	
					
	if ($i == 4){
		echo "</tr>";
		$i= 0;
	}
	
}

?>
</tr>
</table>
</div>
</body>


</html>