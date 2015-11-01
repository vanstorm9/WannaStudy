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
include 'navbar.html';
require 'connect.php';
include 'sessioncheck.php';

$logindate = date("Y-m-d");
$recenttime = date('H:i:s');

mysql_query("UPDATE users SET last_date= '$logindate', last_time = '$recenttime' WHERE id='$my_id'");
?>
  

	
	<center>
	<div class="panel panel-danger" style='width:80%;'>
		<div class="panel-heading">Roommate Search Engine</div>
			<div class="panel-body">
			
			
			<center>
			<form method='post' action='home.php'>
				<table class='table'>
					<tr>
						<td>Name:</td>
						<td><input type="text" class="form-control" placeholder="First Name" name='first_name'  style='width:260px;'></td>
						<td><input type="text" class="form-control" placeholder="Last Name" name='last_name'  style='width:260px;'></td>
						<td><input type="radio" name="gender" value="Male">Male&nbsp&nbsp&nbsp&nbsp&nbsp <input type="radio" name="gender" value="Female">Female</td>
					</tr>
					
					
					<tr>
						<td>Class:</td>
						<td>
							<select class="form-control" name='major'  style='width:260px;'>
								<option value="" disabled selected>Major:</option>
								<option value="">Don't Search</option>
								<?php 
								$major_query = mysql_query("SELECT DISTINCT name_major FROM tags_major ORDER BY name_major");
								
								while($major_row = mysql_fetch_array($major_query)){
									$major = $major_row['name_major'];
									
								?>
								
								<option value="<?php echo $major; ?>"><?php echo $major; ?></option>
								
								<?php
								
								}
								
								?>
							</select>
						</td>
						
						<td>
							<select class="form-control" name='class_of'  style='width:260px;'>
								<option value="" disabled selected>Class of. . .</option>
								<option value="">Don't Search</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2021">2023</option>
								<option value="2022">2024</option>
							</select>
						</td>
					</tr>
					
					
					<tr>
						<td>Rutgers:</td>
						<td>
							<select class="form-control" name='location'  style='width:260px;'>
								<option value="" disabled selected>Location:</option>
								<option value="">Don't Search</option>
								<option value="Cadmen">Cadmen</option>
								<option value="Newark">Newark</option>
								<option value="New_Brunswick">New Brunswick</option>
							</select>
						</td>
						<td>
							<select class="form-control" name='campus'  style='width:260px;'>
								<option value="" disabled selected>Campus:</option>
								<option value="">Don't Search</option>
								<option value="Busch">Busch</option>
								<option value="Livingston">Livingston</option>
								<option value="College Avenue">College Avenue</option>
								<option value="Douglass">Douglass</option>
								<option value="Cook">Cook</option>
							</select>
						</td>
						<td>
							<select class="form-control" name='school'  style='width:260px;'>
								<option value="" disabled selected>School:</option>
								<option value="">Don't Search</option>
								<option value="AL">School of Arts and Science</option>
								<option value="AK">School of Engineering</option>
							</select>
						</td>
					</tr>
					
					
					<tr>
						<td>From:</td>
						<td>
							<select class="form-control" name='state'  style='width:260px;'>
								<option value="" disabled selected>State:</option>
								<option value="">Don't Search</option>
								<?php 
								$state_query = mysql_query("SELECT DISTINCT name_state FROM tags_state ORDER BY name_state");
								
								while($state_row = mysql_fetch_array($state_query)){
									$state = $state_row['name_state'];
									
								?>
								
								<option value="<?php echo $state; ?>"><?php echo $state; ?></option>
								
								<?php
								
								}
								
								?>
							</select>
						</td>
						<td>
							<select class="form-control" name='country'  style='width:260px;'>
								<option value="" disabled selected>Country:</option>
								<option value="">Don't Search</option>
								<?php 
								$country_query = mysql_query("SELECT DISTINCT name_country FROM tags_country ORDER BY name_country");
								
								while($country_row = mysql_fetch_array($country_query)){
									$country = $country_row['name_country'];
									
								?>
								
								<option value="<?php echo $country; ?>"><?php echo $country; ?></option>
								
								<?php
								
								}
								
								?>
							</select>
						</td>
						
					</tr>
					
					
					
					<tr>
						<td>Interest:</td>
						
						<td>
							<select class="form-control" name='interest_1'   style='width:260px;'>
								<option value="" disabled selected>Interest 1:</option>
								<option value="">Don't Search</option>
								<?php 
								$interest_1_query = mysql_query("SELECT DISTINCT name_interest FROM tags_interest ORDER BY name_interest");
								
								while($interest_1_row = mysql_fetch_array($interest_1_query)){
									$interest_1 = $interest_1_row['name_interest'];
									
								?>
								
								<option value="<?php echo $interest_1; ?>"><?php echo $interest_1; ?></option>
								
								<?php
								
								}
								
								?>
							</select>
						</td>
						
						<td>
							<select class="form-control" name='interest_2'  style='width:260px;'>
								<option value="" disabled selected>Interest 2:</option>
								<option value="">Don't Search</option>
								<?php 
								$interest_2_query = mysql_query("SELECT DISTINCT name_interest FROM tags_interest ORDER BY name_interest");
								
								while($interest_2_row = mysql_fetch_array($interest_2_query)){
									$interest_2 = $interest_2_row['name_interest'];
									
								?>
								
								<option value="<?php echo $interest_2; ?>"><?php echo $interest_2; ?></option>
								
								<?php
								
								}
								
								?>
							</select>
						</td>
						
						<td>
							<select class="form-control" name='interest_3'  style='width:260px;'>
								<option value="" disabled selected>Interest 3:</option>
								<option value="">Don't Search</option>
								<?php 
								$interest_3_query = mysql_query("SELECT DISTINCT name_interest FROM tags_interest ORDER BY name_interest");
								
								while($interest_3_row = mysql_fetch_array($interest_3_query)){
									$interest_3 = $interest_3_row['name_interest'];
									
								?>
								
								<option value="<?php echo $interest_3; ?>"><?php echo $interest_3; ?></option>
								
								<?php
								
								}
								
								?>
							</select>
						</td>
					</tr>
					
					
					
					<tr>
						<td></td>
						<td>
							<select class="form-control" name='music'  style='width:260px;' >
								<option value="" disabled selected>Music:</option>
								<option value="">Don't Search</option>
								<?php 
								$music_query = mysql_query("SELECT DISTINCT name_music FROM tags_music  ORDER BY name_music");
								
								while($music_row = mysql_fetch_array($music_query)){
									$music = $music_row['name_music'];
									
								?>
								
								<option value="<?php echo $music; ?>"><?php echo $music; ?></option>
								
								<?php
								
								}
								
								?>
							</select>
						</td>
						<td>
							<select class="form-control" name='show'  style='width:260px;'>
								<option value="" disabled selected>TV Show:</option>
								<option value="">Don't Search</option>
								<?php 
								$show_query = mysql_query("SELECT DISTINCT name_show FROM tags_show  ORDER BY name_show");
								
								while($show_row = mysql_fetch_array($show_query)){
									$show = $show_row['name_show'];
									
								?>
								
								<option value="<?php echo $show; ?>"><?php echo $show; ?></option>
								
								<?php
								
								}
								
								?>
							</select>
						</td>
						<td>
							<select class="form-control" name='sport'  style='width:260px;'>
								<option value="" disabled selected>Sport:</option>
								<option value="">Don't Search</option>
								<?php 
								$sport_query = mysql_query("SELECT DISTINCT name_sport FROM tags_sport ORDER BY name_sport");
								
								while($sport_row = mysql_fetch_array($sport_query)){
									$sport = $sport_row['name_sport'];
									
								?>
								
								<option value="<?php echo $sport; ?>"><?php echo $sport; ?></option>
								
								<?php
								
								}
								
								?>
							</select>
						</td>
						
					</tr>
					
					
					
					<tr>
						<td></td>
						<td>
							<select class="form-control" name='movie'  style='width:260px;'>
								<option value="" disabled selected>Movie:</option>
								<option value="">Don't Search</option>
								<?php 
								$movie_query = mysql_query("SELECT DISTINCT name_movie FROM tags_movie ORDER BY name_movie ");
								
								while($movie_row = mysql_fetch_array($movie_query)){
									$movie = $movie_row['name_movie'];
									
								?>
								
								<option value="<?php echo $movie; ?>"><?php echo $movie; ?></option>
								
								<?php
								
								}
								
								?>
							</select>
						</td>
						<td>
							<select class="form-control" name='game'  style='width:260px;'>
								<option value="" disabled selected>Game:</option>
								<option value="">Don't Search</option>
								<?php 
								$game_query = mysql_query("SELECT DISTINCT name_game FROM tags_game ORDER BY name_game");
								
								while($game_row = mysql_fetch_array($game_query)){
									$game = $game_row['name_game'];
									
								?>
								
								<option value="<?php echo $game; ?>"><?php echo $game; ?></option>
								
								<?php
								
								}
								
								?>
							</select>
						</td>
					</tr>
					
					
					
					<tr>
						<td>Application:</td>
						<td>
						<select class="form-control" name='loud'  style='width:260px;'>
							<option value="" disabled selected>Sound Levels</option>
							<option value="">Don't Search</option>
							<option value="Noise">Like Noise</option>
							<option value="Flexable">Flexable</option>
							<option value="Quiet">Quiet</option>
						</select>		
						</td>
						<td>
							<select class="form-control" name='tidy'  style='width:260px;'>
								<option value="" disabled selected>Cleanliness</option>
								<option value="">Don't Search</option>
								<option value="Messy">Messy</option>
								<option value="Casual">Casual</option>
								<option value="Clean">I am clean and tidy</option>
							</select>	
						</td>
						<td>
						<select class="form-control" name='activity'  style='width:260px;'>
							<option value="" disabled selected>*He/She often</option>
							<option value="clubs and sports">spends time at clubs/sports</option>
							<option value="stay in dorm">stays in his/her dorm</option>
							<option value="partying">go to parties</option>
							<option value="outside of campus">spends time outside of campus</option>
							<option value="studying">studies</option>
							<option value="make/build things">builds/makes awesome stuff</option>
						</select>		
						</td>

					</tr>
					<tr>
						<td></td>
						<td>
						<select class="form-control" name='hours'  style='width:260px;'>
							<option value="" disabled selected>Personal Hours. . .</option>
							<option value="">Don't Search</option>
							<option value="Early">Early to Bed</option>
							<option value="Flexable">Flexable</option>
							<option value="Late">Nightowl</option>
						</select>	
						
						</td>
						<td>
						<select class="form-control" name='smoke'  style='width:260px;'>
							<option value="" disabled selected>He/She smokes?</option>
							<option value="">Don't Search</option>
							<option value="Smoke">Smoker</option>
							<option value="Non-Smoker">Non-Smoker</option>
						</select>
						</td>
						<td>
						<select class="form-control" name='weekend'  style='width:260px;'>
							<option value="" disabled selected>Weekend</option>
							<option value="">Don't Search</option>
							<option value="Always">Always here</option>
							<option value="Usually">Usually here</option>
							<option value="Sometimes">Sometimes here</option>
							<option value="Never">Never here</option>
						</select>
						</td>
					
					</tr>
					<tr>
						<td></td>
						<td>
						<select class="form-control" name='dorm_invite'  style='width:260px;'>
							<option value="" disabled selected>Dorming Invite</option>
							<option value="">Don't Search</option>
							<option value="Often">Often invites friends to dorming room</option>
							<option value="Sometimes">Sometime invites friends to dorming room</option>
							<option value="Rarely">Rarely invites friends to dorming room</option>
							<option value="Never">Never invites friends to dorming room</option>
						</select>
						</td>
					
					</tr>
				
				</table>
				
				<input class="btn btn-lg btn-primary btn-block" type="submit" name='submit' value='Search Roommate'>
			</form>
			</center>
			</div>
	</div>
	</div>

	<div class="panel panel-danger" style='width:85%;'>
		<div class="panel-heading">Roommates</div>
			<div class="panel-body">
			
			<table class="table table-striped table-bordered table-condensed">
		
			<?php			    
				$first_name = $_POST['first_name'];				
				$last_name = $_POST['last_name'];
				$gender = $_POST['gender'];
				$major = $_POST['major'];
				$class_of = $_POST['class_of'];
				$location = $_POST['location'];
				$campus = $_POST['campus'];
				$state = $_POST['state'];
				$country = $_POST['country'];
				$interest_1 = $_POST['interest_1'];
				$interest_2 = $_POST['interest_2'];
				$interest_3 = $_POST['interest_3'];
				$music = $_POST['music'];
				$show = $_POST['show'];
				$sport = $_POST['sport'];
				$movie = $_POST['movie'];
				$game = $_POST['game'];
				$loud = $_POST['loud'];
				$tidy = $_POST['tidy'];
				$hour = $_POST['hours'];
				$smoke = $_POST['smoke'];
				$weekend = $_POST['weekend'];
				$activity = $_POST['activity'];
				$dorm_invite = $_POST['dorm_invite'];
				$submit = $_POST['submit'];
				
				
				/*$interest_query = mysql_query("SELECT interest FROM search_info WHERE user_id='$user_id'");
				$interest_row = mysql_fetch_assoc($interest_query);	
				$interest = $interest_row['interest'];

				$interest_2_query = mysql_query("SELECT interest_2 FROM search_info WHERE user_id='$user_id'");
				$interest_2_row = mysql_fetch_assoc($interest_2_query);	
				$interest_2 = $interest_2_row['interest_2'];

				$interest_3_query = mysql_query("SELECT interest_3 FROM search_info WHERE user_id='$user_id'");
				$interest_3_row = mysql_fetch_assoc($interest_3_query);	
				$interest_3 = $interest_3_row['interest_3'];
				*/
				
				$i=0;

				if($_POST['submit']){
					$search_1_query = mysql_query("SELECT id, user_id, first_name, last_name, gender, class_of, location, campus, social_site, loud, tidy, country, game, interest, interest_2, interest_3, major, movie, music, tv_show, sport, state,hour, dorm_invite, weekend, activity, smoke  FROM search_info 
					WHERE first_name LIKE '{$first_name}%' 
					&& last_name LIKE '{$last_name}%' 
					&& class_of LIKE '{$class_of}%' 
					&& gender LIKE '{$gender}%'
					&& major LIKE '{$major}%' 
					&& location LIKE '{$location}%' 
					&& campus LIKE '{$campus}%' 
					&& state LIKE '{$state}%' 
					&& country LIKE '{$country}%' 
					&& movie LIKE '{$movie}%' 
					&& game LIKE '{$game}%' 
					&& sport LIKE '{$sport}%' 
					&& tv_show LIKE '{$show}%' 
					&& music LIKE '{$music}%' 
					&& (interest LIKE '{$interest_1}%' OR interest LIKE '{$interest_2}%' OR interest LIKE '{$interest_3}%')
					&& (interest_2 LIKE '{$interest_1}%' OR interest_2 LIKE '{$interest_2}%' OR interest_2 LIKE '{$interest_3}%')
					&& (interest_3 LIKE '{$interest_1}%' OR interest_3 LIKE '{$interest_2}%' OR interest_3 LIKE '{$interest_3}%')
					&& loud LIKE '{$loud}%'
					&& hour LIKE '{$hour}%'
					&& tidy LIKE '{$tidy}%'
					&& smoke LIKE '{$smoke}%'
					&& activity LIKE '{$activity}%'
					&& weekend LIKE '{$weekend}%'
					&& dorm_invite LIKE '{$dorm_invite}%'
					&& user_id !='$my_id'
					ORDER BY id desc;
					");
					
					
					while($search_row = mysql_fetch_array($search_1_query)){
						$user_id = $search_row['user_id'];
						$first_name = $search_row['first_name'];
						$last_name = $search_row['last_name'];
						$major = $search_row['major'];
						$location = $search_row['location'];
						$campus = $search_row['campus'];
						$state = $search_row['state'];
						$country = $search_row['country'];
						$social_site = $search_row['social_site'];
						$gender = $search_row['gender'];
						
						
						
						$random_query = mysql_query("SELECT random FROM users WHERE id='$user_id'");
						$random_row = mysql_fetch_assoc($random_query);	
						$random_hash = $random_row['random'];
						
						$avatar_query = mysql_query("SELECT avatar FROM users WHERE id='$user_id'");
						$avatar_row = mysql_fetch_assoc($avatar_query);	
						$avatar = $avatar_row['avatar'];
						
						$class_of_query = mysql_query("SELECT class_of FROM users WHERE id='$user_id'");
						$class_of_row = mysql_fetch_assoc($class_of_query);	
						$class_of = $class_of_row['class_of'];

						
						$first_name_query = mysql_query("SELECT first_name FROM users WHERE id='$user_id'");
						$first_name_row = mysql_fetch_assoc($first_name_query);	
						$first_name_test = $first_name_row['first_name'];

						$last_name_query = mysql_query("SELECT last_name FROM users WHERE id='$user_id'");
						$last_name_row = mysql_fetch_assoc($last_name_query);	
						$last_name_test = $last_name_row['last_name'];
						
						
						
						$full_name = $first_name_test.".".$last_name_test;
						
						$room_connection = mysql_num_rows(mysql_query("SELECT * FROM follow WHERE user_one='$my_id' && user_two='$user_id'"));
						$room_interest_in_you = mysql_num_rows(mysql_query("SELECT * FROM follow WHERE user_one='$user_id' && user_two='$my_id'"));

						
				
						
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
									<p>
									<?php if ($room_connection != 0){ ?>
										<button type="button" class="btn btn-success btn-xs disabled"><div id="adiv_<?php echo $i?>">Roommate Added!</div></button>
									<?php } else if ($room_interest_in_you != 0){?>
										<button type="button" class="btn btn-success btn-xs disabled"><div id="adiv_<?php echo $i?>">Interested in you!</div></button>
									<?php } else {?>
										<button type="button" onclick="load(<?php echo $i;?>, <?php echo $user_id;?>)" class="btn btn-success btn-xs"><div id="adiv_<?php echo $i?>"><span class="glyphicon glyphicon-plus"></span>Add as Roommate</div></button>
									<?php } ?>
									</p>
									
												<p><a href='profile.php?u=<?php echo $full_name;?>&e=<?php echo $random_hash;?>&i=<?php echo $user_id;?>' target='_blank'><button type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-user"></span> Profile</button></a></p>
												<p><a href='<?php echo $social_site; ?>' target='_blank'><button type="button" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-search"></span> Contact</button></a></p></td>
								</tr>
								
														
							<?php
					
						$i++;

					
					}
					
			
				
	
				} else {

					$search_query = mysql_query("SELECT user_id, social_site, first_name, last_name, class_of, location, campus, state, country, loud, tidy, game, interest, major, music, sport, tv_show, interest FROM search_info WHERE user_id !='$my_id' ORDER BY id desc");

					while($search_row = mysql_fetch_array($search_query)){
						$user_id = $search_row['user_id'];
						$first_name = $search_row['first_name'];
						$last_name = $search_row['last_name'];
						$major = $search_row['major'];
						$location = $search_row['location'];
						$campus = $search_row['campus'];
						$state = $search_row['state'];
						$country = $search_row['country'];
						$social_site = $search_row['social_site'];
						
					
						
						
						$random_query = mysql_query("SELECT random FROM users WHERE id='$user_id'");
						$random_row = mysql_fetch_assoc($random_query);	
						$random_hash = $random_row['random'];
						
						$class_of_query = mysql_query("SELECT class_of FROM users WHERE id='$user_id'");
						$class_of_row = mysql_fetch_assoc($class_of_query);	
						$class_of = $class_of_row['class_of'];

						
						$gender_query = mysql_query("SELECT gender FROM users WHERE id='$user_id'");
						$gender_row = mysql_fetch_assoc($gender_query);	
						$gender = $gender_row['gender'];
						
						$avatar_query = mysql_query("SELECT avatar FROM users WHERE id='$user_id'");
						$avatar_row = mysql_fetch_assoc($avatar_query);	
						$avatar = $avatar_row['avatar'];
						
						
						$first_name_query = mysql_query("SELECT first_name FROM users WHERE id='$user_id'");
						$first_name_row = mysql_fetch_assoc($first_name_query);	
						$first_name_test = $first_name_row['first_name'];

						$last_name_query = mysql_query("SELECT last_name FROM users WHERE id='$user_id'");
						$last_name_row = mysql_fetch_assoc($last_name_query);	
						$last_name_test = $last_name_row['last_name'];

						
						$full_name = $first_name_test.".".$last_name_test;
						
						
						$room_connection = mysql_num_rows(mysql_query("SELECT * FROM follow WHERE user_one='$my_id' && user_two='$user_id'"));
						$room_interest_in_you = mysql_num_rows(mysql_query("SELECT * FROM follow WHERE user_one='$user_id' && user_two='$my_id'"));
						
						
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
									<p>
									<?php if ($room_connection != 0){ ?>
										<button type="button" class="btn btn-success btn-xs disabled"><div id="adiv_<?php echo $i?>">Roommate Added!</div></button>
									<?php } else if ($room_interest_in_you != 0){?>
										<button type="button" class="btn btn-success btn-xs disabled"><div id="adiv_<?php echo $i?>">Interested in you!</div></button>
									<?php } else {?>
										<button type="button" onclick="load(<?php echo $i;?>, <?php echo $user_id;?>)" class="btn btn-success btn-xs"><div id="adiv_<?php echo $i?>"><span class="glyphicon glyphicon-plus"></span>Add as Roommate</div></button>
									<?php } ?>
									</p>
												<p><a href='profile.php?u=<?php echo $full_name;?>&e=<?php echo $random_hash;?>&i=<?php echo $user_id;?>' target='_blank'><button type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-user"></span> Profile</button></a></p>
												<p><a href='<?php echo $social_site; ?>' target='_blank'><button type="button" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-search"></span> Contact</button></a></p></td>
								</tr>
						
					<?php
					
					
					$i++;
					
					}
				
			
					
				}
				?>
				
				
					
					
				
				
				</table>
			
			
			</div>
	</div>
	</div>
	<div>

<img src="http://www.easycounter.com/counter.php?rutgers_roommate"
border="0" alt="HTML Hit Counter"></a>
<br><a href="http://www.easycounter.com/">
	
	</div>
</center>
	

	
	
	

	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/autocomplete.js"></script>
<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 



	
	
<script type="text/javascript"> 

	function load(adiv_tag, recieving_id){									
		if (window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		} else{
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		}

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
				<?php 
				$search_query = mysql_query("SELECT * FROM search_info WHERE user_id!='$user_id'");

				$j = 0;
				while($search_row = mysql_fetch_array($search_query)){	
				?>
					if (adiv_tag == <?php echo $j; ?>){
						
						document.getElementById("adiv_<?php echo $j;?>").innerHTML =  xmlhttp.responseText;
					}
				<?php
					$j++;
				}
				
				?>
				
				
			}
										
		}
										
	xmlhttp.open('GET','include.inc.php?i=' + recieving_id, true);
	xmlhttp.send();

}

</script>
</html>