<html>
<head>
<script src= "http://code.jquery.com/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css" type="text/css"/>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
<link rel="shortcut icon" type="image/png" href="http://pvhs.k12.nj.us/favicon.ico">

<link type="text/css" href="mypvactivities.css" rel="stylesheet">
<script src='jquery.js'></script>
<script src='index.js'></script>
<script src='ui.js'></script>

<link href = "css/bootstrap.min.css" rel= "stylesheet">
<link href = "css/styles.css" rel= "stylesheet">
<link href = "css/lartab.css" rel= "stylesheet">


<?php 
include 'header.php';
include 'connect.php';
include 'general.php';
include 'navbar.html';

$school = $_GET['uni'];

$post_major_name = mysql_query("SELECT name FROM school WHERE id='$school'");
$major_name_row = mysql_fetch_assoc($post_major_name);
$major_name = $major_name_row['name'];


$i= 0;

$major = $_GET['m'];
?>
</head>

<title>Majors</title>

<body>

<div style='padding: 10px;'>
<br>
<font style='color:white;'>Back to: 
<a href='college.php'><u>Colleges</u></a> </font>
<br><br>
<center><font style='color:white;'><h1><?php echo $major_name;?></h1></font></center>
<br><br>


<center>


<?php 


$major_college_bar_query = mysql_query("SELECT id, name, school, valid_name, type FROM major_college WHERE school='$school' ORDER BY name ASC");
while($major_college_bar_row = mysql_fetch_array($major_college_bar_query)){
	$major_college_bar_id = $major_college_bar_row['id'];
	$major_college_bar_name = $major_college_bar_row['name'];
	$major_college_bar_valid_name = $major_college_bar_row['valid_name'];
	$major_college_bar_school = $major_college_bar_row['school'];
	$major_college_bar_type = $major_college_bar_row['type'];
	
?>

	
	<center><div class="majex">
	<font style='color:white; font-size:200%;'><?php echo $major_college_bar_name; ?></font>
</div></center><br>

<center>
	<?php

	$major_bar_query = mysql_query("SELECT id, name, college_group, school, valid_name, type FROM major WHERE school='$school' && college_group='$major_college_bar_id' && activated='1' ORDER BY name ASC");
	
	while($major_bar_row = mysql_fetch_array($major_bar_query)){
		$major_bar_id = $major_bar_row['id'];
		$major_bar_name = $major_bar_row['name'];
		$major_bar_valid_name = $major_bar_row['valid_name'];
		$major_bar_school = $major_bar_row['school'];
		$major_bar_type = $major_bar_row['type'];

		$subject_class = $subject_valid_name.$subject_school.$subject_subject.$subject_id;
		
		?>
		
		<center>
			<a href='subject.php?uni=<?php echo $school;?>&m=<?php echo $major_bar_id;?>'>
				<div class='majex1'>
					<font style='color:white; font-size:200%;'><?php echo $major_bar_name;?></font>
				</div>
			</a>
		</center><br><br>
				
		<?php

	}

	
}






?>
</center>
<br><br>
<center>
<font style='color:white;'>Your major is not here?</font> <a href='request.php?rm=1'>Request one!</a>
</center>



</body>


</html>
