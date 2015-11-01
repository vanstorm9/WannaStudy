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
<link href = "css/buttons.css" rel= "stylesheet">
<link href = "css/lartab.css" rel= "stylesheet">
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

$major = $_GET['m'];

$post_subject_name = mysql_query("SELECT name FROM major WHERE school='$school' && id='$major'");
$subject_name_row = mysql_fetch_assoc($post_subject_name);
$subject_name = $subject_name_row['name'];

$post_major_name = mysql_query("SELECT name FROM school WHERE id='$school'");
$major_name_row = mysql_fetch_assoc($post_major_name);
$major_name = $major_name_row['name'];

?>


</head>
<title><?php echo $subject_name;?></title>

<body>
<div style='padding: 10px;'>
<br>
<font style='color:white;'>Back to: 
<a href='college.php'><u>Colleges</u></a> ->
<a href='major.php?<?php echo $school_type; ?>=<?php echo $school;?>'><u><?php echo $major_name; ?></u></a> </font>
<br><br>
	

<a style='float:left; left:10px;' href='chatroom.php?<?php echo $school_type; ?>=<?php echo $school;?>&m=<?php echo $major;?>' target="_blank"><button type="button" class="btn btn-success">Enter the <?php echo $subject_name; ?> chatroom</button></a>
<a style='float:right; right:10px;' href='search.php?<?php echo $school_type; ?>=<?php echo $school;?>&m=<?php echo $major;?>'><u>See all members taking <?php echo $subject_name; ?></u></a>




<br><br>
<center><font style='color:white;'><h1><?php echo $subject_name;?></h1></font></center>
<br><br>

<center><table>
<tr>
<?php 




$subject_bar_query = mysql_query("SELECT id, name, image, school, valid_name, type FROM subjet WHERE school='$school' && major='$major' && type='4' ORDER BY name ASC");
while($subject_bar_row = mysql_fetch_array($subject_bar_query)){
	$subject_bar_id = $subject_bar_row['id'];
	$subject_bar_name = $subject_bar_row['name'];
	$subject_bar_valid_name = $subject_bar_row['valid_name'];
	$subject_bar_school = $subject_bar_row['school'];
	$subject_bar_image = $subject_bar_row['image'];
	$subject_bar_type = $subject_bar_row['type'];
	
	?>

	
	<center><div class="subex" style='background-color:#428bca;'>
<font style='color:white; font-size:200%;'><?php echo $subject_bar_name ?></font>
</div></center><br>
	
	<?php

	$subject_query = mysql_query("SELECT id, name, image, school, button_link, image_hover, image_active, valid_name, type FROM subjet WHERE school='$school' && major='$major' && type='1' && button_link ='$subject_bar_id' ORDER BY name ASC");

	while($subject_row = mysql_fetch_array($subject_query)){
		$subject_id = $subject_row['id'];
		$subject_name = $subject_row['name'];
		$subject_valid_name = $subject_row['valid_name'];
		$subject_school = $subject_row['school'];
		$subject_image = $subject_row['image'];
		$subject_hover = $subject_row['image_hover'];
		$subject_active = $subject_row['image_active'];
		$subject_button_link = $subject_row['button_link'];
		$subject_type = $subject_row['type'];

		$subject_class = $subject_valid_name.$subject_school.$subject_subject.$subject_id;
		
		echo "<td style='padding:15px;'><center><a href='course.php?".$school_type."=".$subject_school."&m=".$major."&sub=".$subject_id."' class='norm_but' style='background-image:url(".$subject_image.")'></a></center><br>
		<center><h3><font style='color:white'>".$subject_name."</font></h3></center>";
		

		
		$i++;
		
		if ($i == 4){
			echo "</tr>";
			$i= 0;
		}

	}

	
}

$i= 0;




?>
</tr>
</table></center>
<br><br>

<?php 


if ($_GET['hs']&&empty($_GET['uni'])){
	$school = $_GET['hs'];
	$school_type = 'hs';
} else if ($_GET['uni']&&empty($_GET['hs'])){
	$school = $_GET['uni'];
	$major = $_GET['maj'];
	$school_type = 'uni';
}

$i= 0;

$major = $_GET['m'];


$subject_bar_query = mysql_query("SELECT id, name, image, major, school, valid_name, type FROM subjet WHERE school='$school' && major='$major' && type='3' ORDER BY name ASC");
while($subject_bar_row = mysql_fetch_array($subject_bar_query)){
	$subject_bar_id = $subject_bar_row['id'];
	$subject_bar_name = $subject_bar_row['name'];
	$subject_bar_valid_name = $subject_bar_row['valid_name'];
	$subject_bar_school = $subject_bar_row['school'];
	$subject_bar_major = $subject_bar_row['major'];
	$subject_bar_image = $subject_bar_row['image'];
	$subject_bar_type = $subject_bar_row['type'];
	
	?>

	
	<center><div class="subex">
<font style='color:white; font-size:200%;'><?php echo $subject_bar_name ?></font>
</div></center><br>
<center><table>
<tr>	
	<?php

	$subject_query = mysql_query("SELECT id, name, image, school, button_link, image_hover, image_active, valid_name, type FROM subjet WHERE school='$school' && major='$major'  && type='1' && button_link ='$subject_bar_id' ORDER BY name ASC");

	while($subject_row = mysql_fetch_array($subject_query)){
		$subject_id = $subject_row['id'];
		$subject_name = $subject_row['name'];
		$subject_valid_name = $subject_row['valid_name'];
		$subject_school = $subject_row['school'];
		$subject_image = $subject_row['image'];
		$subject_hover = $subject_row['image_hover'];
		$subject_active = $subject_row['image_active'];
		$subject_button_link = $subject_row['button_link'];
		$subject_type = $subject_row['type'];

		$subject_class = $subject_valid_name.$subject_school.$subject_subject.$subject_id;
		
		echo "<td style='padding:15px;'><center><a href='course.php?".$school_type."=".$subject_school."&m=".$major."&sub=".$subject_id."' class='norm_but' style='background-image:url(".$subject_image.")'></a></center><br>
		<center><h3><font style='color:white'>".$subject_name."</font></h3></center>
		";
		
		$i++;
		
		if ($i == 4){
			echo "</tr>";
			$i= 0;
		}
		?>
	</td>
	<?php

	}
	$i= 0;
?>
	</tr>
	</table>
	<?php
	
}
//____________________________________________________________________________________________________________________________________________________________________________________________
?>
</tr>
</table></center>
<br><br>

<?php 


if ($_GET['hs']&&empty($_GET['uni'])){
	$school = $_GET['hs'];
	$school_type = 'hs';
} else if ($_GET['uni']&&empty($_GET['hs'])){
	$school = $_GET['uni'];
	$major = $_GET['maj'];
	$school_type = 'uni';
}

$i= 0;

$major = $_GET['m'];


$subject_bar_query = mysql_query("SELECT id, name, image, major, school, valid_name, type FROM subjet WHERE school='$school' && type='3' && in_all_subject='1' ORDER BY name ASC");
while($subject_bar_row = mysql_fetch_array($subject_bar_query)){
	$subject_bar_id = $subject_bar_row['id'];
	$subject_bar_name = $subject_bar_row['name'];
	$subject_bar_valid_name = $subject_bar_row['valid_name'];
	$subject_bar_school = $subject_bar_row['school'];
	$subject_bar_major = $subject_bar_row['major'];
	$subject_bar_image = $subject_bar_row['image'];
	$subject_bar_type = $subject_bar_row['type'];
	
	?>

	
	<center><div class="subex">
<font style='color:white; font-size:200%;'><?php echo $subject_bar_name ?></font>
</div></center><br>
<center><table>
<tr>	
	<?php

	$subject_query = mysql_query("SELECT id, name, image, school, button_link, image_hover, image_active, valid_name, type FROM subjet WHERE school='$school'  && type='1' && button_link ='$subject_bar_id' && in_all_subject='1' ORDER BY name ASC");

	while($subject_row = mysql_fetch_array($subject_query)){
		$subject_id = $subject_row['id'];
		$subject_name = $subject_row['name'];
		$subject_valid_name = $subject_row['valid_name'];
		$subject_school = $subject_row['school'];
		$subject_image = $subject_row['image'];
		$subject_hover = $subject_row['image_hover'];
		$subject_active = $subject_row['image_active'];
		$subject_button_link = $subject_row['button_link'];
		$subject_type = $subject_row['type'];

		$subject_class = $subject_valid_name.$subject_school.$subject_subject.$subject_id;
		
		echo "<td style='padding:15px;'><center><a href='course.php?".$school_type."=".$subject_school."&m=".$major."&sub=".$subject_id."' class='norm_but' style='background-image:url(".$subject_image.")'></a></center><br>
		<center><h3><font style='color:white'>".$subject_name."</font></h3></center>
		";
		
		$i++;
		
		if ($i == 4){
			echo "</tr>";
			$i= 0;
		}
		?>
	</td>
	<?php

	}
	$i= 0;
?>
	</tr>
	</table>
	<?php
	
}


?>
</tr>
</table>
<br><br>
<center>
<font style='color:white;'>Your class is not here?</font> <a href='request.php?rc=1'>Request one!</a>
</center>
</body>


</html>




