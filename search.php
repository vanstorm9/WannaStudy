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

$search_term = $_GET['q'];

if ($_GET['hs']&&empty($_GET['uni'])){
	$school = $_GET['hs'];
	$school_type = 'hs';
	$search_state = 'major';
} else if ($_GET['uni']&&empty($_GET['hs'])){
	$school = $_GET['uni'];
	$major = $_GET['m'];
	$school_type = 'uni';
	$search_state = 'major';
} else {
	$search_term = $_GET['q'];
	$search_state = 'all_search';
}



?>
</head>


<body>
<div class="container">


<center>

<?php 
if ($search_state == 'all_search'){
?>	
	<title>Search Results for: <?php echo $search_term;?></title>
	<font style="color:white;">Your search results for: <b><?php echo $search_term;?></b></font>
<?php	
} else if($search_state == 'major'){
	$post_major_name = mysql_query("SELECT name FROM major WHERE school='$school' && id='$major'");
	$major_name_row = mysql_fetch_assoc($post_major_name);
	$major_name = $major_name_row['name'];
	
?>
	<title>Students in <?php echo $major_name;?></title>
	<font style="color:white;">People who are majoring in <b><?php echo $major_name;?></b></font>
<?php
}	
	
?>

	<br><br>
	<table class='table table-bordered' style='width:900px;background-color: #1C1C1C;padding:15px;'>

<?php


if ($search_state == 'all_search'){
	$search_query = mysql_query("SELECT id, firstname, lastname, full_name, avatar, major, school FROM users WHERE full_name LIKE '{$search_term}%' ORDER BY full_name");
} else if($search_state == 'major'){
	$search_query = mysql_query("SELECT id, firstname, lastname, full_name, avatar, major, school FROM users WHERE school='$school' && major='$major' ORDER BY full_name");
}


while($search_row = mysql_fetch_array($search_query)){
	$list_user_id = $search_row['id'];
	$first_name = $search_row['first_name'];
	$last_name = $search_row['last_name'];
	$full_name = $search_row['full_name'];
	$avatar = $search_row['avatar'];
	$major = $search_row['major'];
	$school = $search_row['school'];
	
	$major_query = mysql_query("SELECT name FROM major WHERE id= (SELECT major FROM users WHERE id='$list_user_id')");
	$row_major = mysql_fetch_assoc($major_query);
	$major_name = $row_major['name'];
	
	$school_query = mysql_query("SELECT name FROM school WHERE id= (SELECT school FROM users WHERE id='$list_user_id')");
	$row_school = mysql_fetch_assoc($school_query);
	$school_name = $row_school['name'];
	
	
	?>
	
		<tr>
			<td style='width:150px;'>
				<img src='<?php echo $avatar;?>' style='width:140px; height:140px;'>
				<center><p><b><font style="color:white;"><?php echo $full_name;?></font></b></p></center>
			</td>
			<td>
			
				<table style='width:100%'>
					<tr>
						<td><font style="color:white;">School:</font></td>
						<td><font style="color:white;"><?php echo $school_name; ?></font></td>
						<td><font style="color:white;">Major:</font></td>
						<td><font style="color:white;"><?php echo $major_name; ?></font></td>
					</tr>
					
					<tr>
						<td><font style="color:white;">Location:</font></td>
						<td><font style="color:white;"></font></td>
						<td><font style="color:white;">Reputation: </font></td>
						<td><font style="color:white;"></font></td>
					</tr>

				
				
				</table>
				
			</td>
		</tr>
	
	<?php

}
?>
	</table>
	</center>



</div>
</body>
</html>