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

?>
</head>

<title>Settings</title>

<body>
<div class="container">
<br>
<center><font style='color:white;'><h1>Settings</h1></font></center>
<br>
<br>
<form action='settingsfu.php' method='POST'>
<center>
<table width='80%;'>
	<tr>
		<td style='padding:15px;'>
			<font style='color:white;'>Email Address:</font> <input type="text" class="form-control" placeholder="Email Address" required autofocus name='email_change_box' value='<?php echo $emailaddress;?>'>	
		</td>
		<td style='padding:15px;'>
			<font style='color:white;'>First Name: </font> <input type="text" class="form-control" style='300px;' placeholder="First Name" required autofocus name='first_name_change_box' value='<?php echo $firstname;?>'>
		</td>
		<td style='padding:15px;'>
			<font style='color:white;'>Last Name: </font> <input type="text" class="form-control" style='300px;' placeholder="Last Name" required autofocus name='last_name_change_box' value='<?php echo $lastname;?>'>
		</td>
	</tr>
	<tr>
		<td style='padding:15px;'>
			<font style='color:white;'>Major:</font> <input type="text" class="form-control" placeholder="Major" required autofocus name='major_box' value='<?php echo $my_major;?>'>	
		</td>
		<td style='padding:15px;'>
			<font style='color:white;'>Class Year:</font> <input type="text" class="form-control" style='300px;' placeholder="Class of. . ." required autofocus name='class_of_box'>
		</td>
		<td style='padding:15px;'>
			<font style='color:white;'>Location:</font> <input type="text" class="form-control" placeholder="Location" required autofocus name='location_box'>
		</td>
	</tr>
</table>
<br>
<button class="btn btn-lg btn-info btn-block" style='width:70%' type="submit" name='submit'>Save Changes</button>
</center>
</form>
<br><br>

<center>
<div style='width:80%'>
	<form action='upload.php' method='post' enctype='multipart/form-data'>
	<input type='file' name='myfile' style='color:white;'><p><br>
	<button class="btn btn-lg btn-info btn-block" style='width:87%' type="submit" name='Upload'>Upload Profile Picture</button>
	</form>
</div>
</center>

<br><br>
	
	<form action='password_change.php' method='POST'>
	<center>
	<table style='width:60%;'>
		<tr>
			<td style='padding:15px;'><font style='color:white;'>Old Password:</font> <input type="password" class="form-control" style='300px;' placeholder="Old Password" required autofocus name='old_password_change_box'></td>
			<td style='padding:15px;'><font style='color:white;'>Change Password:</font> <input type="password" class="form-control" style='300px;' placeholder="Password" required autofocus name='password_change_box'></td>
			<td style='padding:15px;'><font style='color:white;'>Retype Password:</font> <input type="password" class="form-control" placeholder="Retype Password" required autofocus name='re_password_change_box'></td>
		</tr>
	</table>
	<br>
	<button class="btn btn-lg btn-info btn-block" style='width:70%' type="submit" name='pass_submit'>Change Password</button>
	
	</center>
	</form>
	
</div>
</body>
</html>