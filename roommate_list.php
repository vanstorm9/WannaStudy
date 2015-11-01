<!DOCTYPE html>
<html lang="en">



  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="css/favicon.ico">
    <title>Roommate Search</title>

    <!-- Bootstrap -->
    <script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.mi.css" rel="stylesheet">
	<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 

	


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
 <?php 
require 'navbar.html';
require 'connect.php';
require 'sessioncheck.php';
require 'general.php';
?>

	<center>
	<div class="panel panel-danger" style='width:80%;'>
		<div class="panel-heading">Roommates you Added</div>
			<div class="panel-body">
			Roommates who you added to your roommate list:
			<table class="table table-striped table-bordered table-condensed">
			
			<?php 
			
			
			
			$uni_query = mysql_query("SELECT user_two FROM follow WHERE user_one='$my_id'");
	
			if(mysql_num_rows($uni_query) != 0){
			
				while($uni_row = mysql_fetch_array($uni_query)){
				
					$user_id = $uni_row['user_two'];
					$sent_query = mysql_query("SELECT * FROM search_info WHERE user_id='$user_id'");
				
					while ($search_row = mysql_fetch_array($sent_query)){
						$user_id = $search_row['user_id'];
						$first_name = $search_row['first_name'];
						$last_name = $search_row['last_name'];
						$major = $search_row['major'];
						$location = $search_row['location'];
						$campus = $search_row['campus'];
						$state = $search_row['state'];
						$country = $search_row['country'];
						
						
						$class_of_query = mysql_query("SELECT class_of FROM users WHERE id='$user_id'");
						$class_of_row = mysql_fetch_assoc($class_of_query);	
						$class_of = $class_of_row['class_of'];
						
						$gender_query = mysql_query("SELECT gender FROM users WHERE id='$user_id'");
						$gender_row = mysql_fetch_assoc($gender_query);	
						$gender = $gender_row['gender'];
						
						$random_query = mysql_query("SELECT random FROM users WHERE id='$user_id'");
						$random_row = mysql_fetch_assoc($random_query);	
						$random_hash = $random_row['random'];
							
						$social_query = mysql_query("SELECT social_site FROM search_info WHERE user_id='$user_id'");
						$social_row = mysql_fetch_assoc($social_query);	
						$social_site = $social_row['social_site'];
							
							
						$first_name_query = mysql_query("SELECT first_name FROM users WHERE id='$user_id'");
						$first_name_row = mysql_fetch_assoc($first_name_query);	
						$first_name_test = $first_name_row['first_name'];

						$last_name_query = mysql_query("SELECT last_name FROM users WHERE id='$user_id'");
						$last_name_row = mysql_fetch_assoc($last_name_query);	
						$last_name_test = $last_name_row['last_name'];
						
						$avatar_query = mysql_query("SELECT avatar FROM users WHERE id='$user_id'");
						$avatar_row = mysql_fetch_assoc($avatar_query);
						$avatar = $avatar_row['avatar'];
						
						$full_name = $first_name_test.".".$last_name_test;
						
						
								?>
								
								<tr>
									<td style='width:170px;'><b><u><?php echo $first_name." ".$last_name; ?></u></b></td>
									<td>Major:</td>
									<td>Location:</td>
									<td>Campus:</td>
									<td>Gender:</td>
									<td>Class of:</td>
									<td></td>
								</tr>
								
								
								<tr>
									<td><img src='<?php echo $avatar; ?>' style='width:100px; height:100px;'></td>
									<td><?php echo $major; ?></td>
									<td><?php echo $location; ?></td>
									<td><?php echo $campus; ?></td>
									<td><?php echo $gender; ?></td>
									<td><?php echo $class_of; ?></td>
									<td style='width:50px;'>
												<p><a href='profile.php?u=<?php echo $full_name;?>&e=<?php echo $random_hash;?>&i=<?php echo $user_id;?>' target='_blank'><button type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-user"></span> Profile</button></a></p>
												<p><a href='<?php echo $social_site; ?>' target='_blank'><button type="button" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-search"></span> Contact</button></a></p></td>
								</tr>
							
							<?php
						}
				}
			} else {
				echo "<br>You did not add anyone yet.";
			}
							?>
						</table>
			
			
			
			</div>
		</div>
	</div>
	
	
	
	<div class="panel panel-danger" style='width:80%;'>
		<div class="panel-heading">Roommates Interested in You</div>
			<div class="panel-body">
			Roommates who added you to their roommate list:<br>
			<table class="table table-striped table-bordered table-condensed">
			
			<?php 
			
			$univ_query = mysql_query("SELECT user_one FROM follow WHERE user_two='$my_id'");
			
			
			if (mysql_num_rows($univ_query) != 0){
			
			while ($univ_row = mysql_fetch_array($univ_query)){
			
				$user_id = $univ_row['user_one'];
				$receive_query = mysql_query("SELECT * FROM search_info WHERE user_id='$user_id'");
			
				while ($search_row = mysql_fetch_array($receive_query)){
					$user_id = $search_row['user_id'];
						$first_name = $search_row['first_name'];
						$last_name = $search_row['last_name'];
						$major = $search_row['major'];
						$location = $search_row['location'];
						$campus = $search_row['campus'];						
						$state = $search_row['state'];
						$country = $search_row['country'];
						
						$class_of_query = mysql_query("SELECT class_of FROM users WHERE id='$user_id'");
						$class_of_row = mysql_fetch_assoc($class_of_query);	
						$class_of = $class_of_row['class_of'];
						
						$gender_query = mysql_query("SELECT gender FROM users WHERE id='$user_id'");
						$gender_row = mysql_fetch_assoc($gender_query);	
						$gender = $gender_row['gender'];
						
						$random_query = mysql_query("SELECT random FROM users WHERE id='$user_id'");
						$random_row = mysql_fetch_assoc($random_query);	
						$random_hash = $random_row['random'];
						
						$social_query = mysql_query("SELECT social_site FROM search_info WHERE user_id='$user_id'");
						$social_row = mysql_fetch_assoc($social_query);	
						$social_site = $social_row['social_site'];
						
						
						$first_name_query = mysql_query("SELECT first_name FROM users WHERE id='$user_id'");
						$first_name_row = mysql_fetch_assoc($first_name_query);	
						$first_name_test = $first_name_row['first_name'];

						$last_name_query = mysql_query("SELECT last_name FROM users WHERE id='$user_id'");
						$last_name_row = mysql_fetch_assoc($last_name_query);	
						$last_name_test = $last_name_row['last_name'];
						
						$avatar_query = mysql_query("SELECT avatar FROM users WHERE id='$user_id'");
						$avatar_row = mysql_fetch_assoc($avatar_query);
						$avatar = $avatar_row['avatar'];
						
						$full_name = $first_name_test.".".$last_name_test;
						
						
								?>
								
								<tr>
									<td style='width:170px;'><b><u><?php echo $first_name." ".$last_name; ?></u></b></td>
									<td>Major:</td>
									<td>Location:</td>
									<td>Campus:</td>
									<td>Gender:</td>
									<td>Class of:</td>
									<td></td>
								</tr>
								
								
								<tr>
									<td><img src='<?php echo $avatar; ?>' style='width:100px; height:100px;'></td>
									<td><?php echo $major; ?></td>
									<td><?php echo $location; ?></td>
									<td><?php echo $campus; ?></td>
									<td><?php echo $gender; ?></td>
									<td><?php echo $class_of; ?></td>
									<td style='width:50px;'>
												<p><a href='profile.php?u=<?php echo $full_name;?>&e=<?php echo $random_hash;?>&i=<?php echo $user_id;?>' target='_blank'><button type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-user"></span> Profile</button></a></p>
												<p><a href='<?php echo $social_site; ?>' target='_blank'><button type="button" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-search"></span> Contact</button></a></p></td>
								</tr>
							
							<?php
								}
							}
						} else {
							
							echo "<br>No one added you yet.";
							
						}
							?>
						</table>
			
			
			</div>
		</div>
	</div>
	</center>
	
	










</body>
 
</html>