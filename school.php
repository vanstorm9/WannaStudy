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

<?php 
include 'header.php';
?>
</head>

<title>Find your high school</title>

<body>

<center><table>
<tr>
<?php 
include 'connect.php';



$school_query = mysql_query("SELECT id, name, image, image_hover, image_active FROM school WHERE type='1' ORDER BY name");


while($school_row = mysql_fetch_array($school_query)){
	$school_id = $school_row['id'];
	$school_name = $school_row['name'];
	$school_image = $school_row['image'];
	$school_hover = $school_row['image_hover'];
	$school_active = $school_row['image_active'];


	
	
	echo "<td><a href='subject.php?hs=".$school_id."'><img src='".$school_image."' style='width:350px; height: 200px;'></a><br>
	<div style='background-color:black; width: 330px; height:30px; padding: 10px;'><a href='subject.php?hs=".$school_id."'><font style='color:white;'>".$school_name ."</font></a></div></td>";
	
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