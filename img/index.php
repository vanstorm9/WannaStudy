<html>

	<head>

		<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css" type="text/css"/>
		<link rel="shortcut icon" type="image/png" href="http://pvhs.k12.nj.us/favicon.ico">
		<link href = "css/bootstrap.min.css" rel= "stylesheet">
		<link href = "css/styles.css" rel= "stylesheet">
		
		<?php 
	include 'connect.php';
	include 'general.php';
	include 'header.php';
	$user = $_SESSION['username'];
	include 'navbar.html'
	
	
	?>
	
	<style>
	body{
background-image:url(http://nsa33.casimages.com/img/2014/08/14/140814023323930357.jpg);
 background-size: cover;
}
	
	</style>
	</head>
	
	<title>WannaStudy</title>
	
	<body>
	<?php 
	if ($user){
		header("location: subject.php?".$my_school_type."=".$my_school_int."&m=".$my_major_int."");
	}
	?>
		
		
		<div class="container">
			<div class="text-center">
			<h1 style="color:#FFFFFF"><b>Wanna</b><i>Study</i></h1>
			</div>
			
			<div class = "navbar navbar-inverse navbar-fixed-bottom">
			<div class = "container">
				<p class = "navbar-text pull-left">Copyright 2014 E-Study Room</p>
			</div>
		</div>

	
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src = "js/bootstrap.js"></script>

	</body>

	
</html>