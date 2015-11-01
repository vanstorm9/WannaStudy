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


// The URL will have the name on it.
$user_fullname = $_GET['u'];
$user_hash = $_GET['q'];

$name_pieces = explode("-", $user_fullname);
$user_first_name = $name_pieces[0]; // piece1
$user_last_name =  $name_pieces[1];

$valid_check = mysql_num_rows(mysql_query("SELECT * FROM users WHERE firstname='$user_first_name' && lastname='$user_last_name' && random='$user_hash'"));

$user_fullname = $user_first_name." ".$user_last_name;

if ($valid_check != 0){



$user_avatar_query = mysql_query("SELECT avatar FROM users WHERE firstname='$user_first_name' && lastname='$user_last_name' && random='$user_hash'");
$row_user_avatar = mysql_fetch_assoc($user_avatar_query);
$user_avatar = $row_user_avatar['avatar'];

$user_id_query = mysql_query("SELECT id FROM users WHERE firstname='$user_first_name' && lastname='$user_last_name' && random='$user_hash'");
$row_user_id = mysql_fetch_assoc($user_id_query);
$user_id = $row_user_id['id'];


$user_major_query = mysql_query("SELECT name FROM major WHERE id=(SELECT major FROM users WHERE id='$user_id' && firstname='$user_first_name' && lastname='$user_last_name' && random='$user_hash')");
$row_user_major = mysql_fetch_assoc($user_major_query);
$user_major = $row_user_major['name'];

$user_school_query = mysql_query("SELECT name FROM school WHERE id= (SELECT school FROM users WHERE id='$user_id' && firstname='$user_first_name' && lastname='$user_last_name' && random='$user_hash')");
$row_user_school = mysql_fetch_assoc($user_school_query);
$user_school = $row_user_school['name'];

$user_class_year_query = mysql_query("SELECT class_year FROM users WHERE id='$user_id' && firstname='$user_first_name' && lastname='$user_last_name' && random='$user_hash'");
$row_user_class_year = mysql_fetch_assoc($user_class_year_query);
$user_class_year = $row_user_class_year['class_year'];




if ($my_reputation == 0){
	$rep_color = '#BDBDBD';
} else if($my_reputation < 0){
	$rep_color = 'red';
} else {
	$rep_color = '#00FF00';
}
		
} else {
die('<font style="color:white; padding:20px;">That user does not exist!</font>');

}


?>
</head>

<title><?php echo $user_fullname;?></title>

<body>

<div class="container">
	<table style='padding:10px; background-color: #1C1C1C; border: 3px solid black;'>
		<tr>
			<td style='width:30%; padding:50px; border: 3px solid black;'>
			
				<img src='<?php echo $user_avatar;?>' style='width:300px; height:300px;'>
				<center><h1><font style='color:white;'><?php echo $user_fullname;?></font></h1>
				<br>
				
				<?php 
				if ($user){
				?>
				<button class="btn btn-lg btn-primary" id='roommate_but'><span class="glyphicon glyphicon-plus"></span>Add Friend</button>
				<br><br>
				<button class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-user"></span>Send Message</button></center>
				<br>
				<?php 
				} else {
				
				}
				?>
			
			</td>
			<td>
				<br><font style='color:#BDBDBD;padding:50px;'>
				
				
				About Me:<br>
				
				<br>
				
					<center>
				
					<table class='table table-bordered' style='width:90%; background-color:#2E2E2E;'>
						
						<tr> 
							<td style='width:200px;'><font style='color:#BDBDBD;'>School:</font></td>
							<td><font style='color:#BDBDBD;'><?php echo $user_school;?></font></td>
						</tr>
						<tr>  
							<td style='width:100px;'><font style='color:#BDBDBD;'>Major:</font></td>
							<td><font style='color:#BDBDBD;'><?php echo $user_major;?></font></td>
						</tr>
						<tr> 
							<td style='width:100px;'><font style='color:#BDBDBD;'>Location:</font></td>
							<td></td>
						</tr> 
						<tr> 
							<td style='width:100px;'><font style='color:#BDBDBD;'>Year:</font></td>
							<td><font style='color:#BDBDBD;'><?php echo $user_class_year;?></font></td>
						</tr>
						<tr> 
							<td style='width:100px;'><font style='color:#BDBDBD;'>Post:</font></td>
							<td><font style='color:#BDBDBD;'><?php echo $my_num_post;?></font></td>
						</tr>
						<tr> 
							<td style='width:100px;'><font style='color:#BDBDBD;'>Last visit:</font></td>
							<td></td>
						</tr>
						<tr> 
							<td style='width:100px;'><font style='color:#BDBDBD;'>Join date:</font></td>
							<td></td>
						</tr>
						<tr> 
							<td style='width:100px;'><font style='color:#BDBDBD;'>Reputation:</font></td>
							<td><font style='color:<?php echo $rep_color;?>;'><b><?php echo $my_reputation;?></b></font></td>
						</tr>
						<tr> 
							<td style='width:100px;'><font style='color:#BDBDBD;'>Positive votes received:</font></td>
							<td><font style='color:#BDBDBD;'><?php echo $my_pos_reputation;?></font></td>
						</tr>
						<tr> 
							<td style='width:100px;'><font style='color:#BDBDBD;'>Negative votes received:</font></td>
							<td><font style='color:#BDBDBD;'><?php echo $my_neg_reputation;?></font></td>
						</tr>
						
					</table>
					</font>
					
					</center>
					</div>
					</div>
					</div>
			
			</td>
		</tr>
	</table>
</div>



</body>

</html>