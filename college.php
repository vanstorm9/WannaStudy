<html>
<head>
<script src= "http://code.jquery.com/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css" type="text/css"/>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>


<link href = "css/bootstrap.min.css" rel= "stylesheet">
<link href = "css/styles.css" rel= "stylesheet">


<script src='jquery.js'></script>
<script src='index.js'></script>
<script src='ui.js'></script>
<?php 
include 'header.php';
include 'connect.php';
include 'general.php';
include 'navbar.html';
?>
</head>

<title>Find your college</title>
<body>

<center><div>
<font style='color:white; font-size:300%;'>What school are you from?</font>
</div></center><br><br>

<center><table>
<tr>
<?php 
include 'connect.php';



$school_query = mysql_query("SELECT id, name, image, image_hover, image_active FROM school WHERE type='2' ORDER BY name");


while($school_row = mysql_fetch_array($school_query)){
	$school_id = $school_row['id'];
	$school_name = $school_row['name'];
	$school_image = $school_row['image'];
	$school_hover = $school_row['image_hover'];
	$school_active = $school_row['image_active'];


	
	
	echo "<td><a href='major.php?uni=".$school_id."'><img src='".$school_image."' style='width:340px; height: 200px;'></a><br>
	<div style='background-color:black; width: 340px; height:30px; padding: 10px;'><a href='major.php?uni=".$school_id."'><u><font style='color:white;'>".$school_name ."</font></u></a></div></td>";
	
	$i++;
	
	if ($i == 3){
		echo "</tr>";
		$i = 0;
	}
}

?>
</tr>
</table></center>
</body>


</html>