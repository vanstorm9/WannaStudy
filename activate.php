<html>

<title>Activate Account</title>

	<head>
    <script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.mi.css" rel="stylesheet">
	<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 
	<link rel="shortcut icon" href="css/favicon.ico">


</head>


<body>
<?php
include 'connect.php';
                

   $id= $_GET['p'];
   $code= $_GET['o'];


   if($id&&$code){
      $check = mysql_query("SELECT * FROM users WHERE id='$id' AND random='$code'");
      $checknum = mysql_num_rows($check);
	  
	  $activate_query = mysql_query("SELECT activated FROM users WHERE id='$id'");
	$activate_row = mysql_fetch_assoc($activate_query);
	$activate = $activate_row['activated']; 

      if ($checknum == 1){
	  
	  if($activate != 1){
?>

<br><br>
<center>
<div class="panel panel-danger" style='width:80%;'>
		<div class="panel-heading">Finish Your Profile</div>
			<div class="panel-body">
<form method='post' action='activate_account.php'>
		You're almost done! Just finish your profile and put down as much information as you want. After that, you will be placed in the search engine and others and will be found based on the information you typed in.<br><br>


		<table class='table table-bordered' style='width:80%'>
			
			 <tr>
				<td>Year:</td>
				<td><input type="text" id='major_text' name='major_text' class="form-control" placeholder="*Major" required autofocus></td>
				<td><input type="text" id='major_text' name='avatar_text' class="form-control" placeholder="Avatar"> <a href='https://www.youtube.com/watch?v=-Q0LhlKzaog&feature=youtu.be' target='_blank'>How to upload avatar</a></td>
				<td></td>
			 </tr>

			
			 <tr>
				<td>Contact:</td>
				<td><input type="text" class="form-control" name='contact_box' placeholder="*Facebook/Twitter profile URL " required autofocus></td>
				<td></td>
				<td></td>
			 </tr>
			 
			 
			 <tr>
				<td>Rutgers:</td>
				<td>
					<select class="form-control" name='location_box'>
						<option value="" disabled selected>* Location</option>
						<option value="Cadmen">Cadmen</option>
						<option value="Newark">Newark</option>
						<option value="New Brunswick">New Brunswick</option>
					</select>
				</td>
				
				<td>
					<select class="form-control" name='campus_box'>
						<option value="" disabled selected>* Campus</option>
						<option value="Busch">Busch</option>
						<option value="Livingston">Livingston</option>
						<option value="College Avenue">College Avenue</option>
						<option value="Cook">Cook</option>
						<option value="Douglass">Douglass</option>
						
					</select>
				</td>
				<td></td>
			 </tr>
			 
			 <tr>
				<td>Location:</td>
				<td><input type="text" id='state_text' name='state_text' maxlength='4' class="form-control" placeholder="*State (NJ,NY,FL,etc.)" required autofocus></td>
				<td><input type="text" id='country_text' name='country_text' maxlength='20' class="form-control" placeholder="*Country" required autofocus></td>
				<td></td>
			 </tr>
			 
					<tr>
						<td>Interest:</td>
						<td><input type="text" id="interest_text_1" name='interest_text_1' maxlength='20' class="form-control" placeholder="Interest 1" ></td>
						<td><input type="text" id="interest_text_2" name='interest_text_2' maxlength='20' class="form-control" placeholder="Interest 2" ></td>
						<td><input type="text" id="interest_text_3" name='interest_text_3' maxlength='20' class="form-control" placeholder="Interest 3" ></td>
					</tr>
					
					<tr>
						<td></td>
						<td><input type="text" id='music_text' maxlength='70' name='music_text' class="form-control" placeholder="Music" ></td>
						<td><input type="text" id='show_text' maxlength='70' name='show_text' class="form-control" placeholder="TV Shows" ></td>
						<td><input type="text" id='sport_text' maxlength='70' name='sport_text' class="form-control" placeholder="Sports" ></td>
						
					</tr>
					
					<tr>
						<td></td>
						<td><input type="text" id='movie_text' maxlength='70' name='movie_text' class="form-control" placeholder="Movies" ></td>
						<td><input type="text" id="game_text" maxlength='70' name='game_text' class="form-control" placeholder="Games" ></td>
						<td></td>
					</tr>
					
					
					<tr>
						<td>Application:</td>
						<td>
						<select class="form-control" name='loud'>
							<option value="" disabled selected>*Sound Levels</option>
							<option value="Noise">Like Noise</option>
							<option value="Flexable">Flexable</option>
							<option value="Quiet">Quiet</option>
						</select>		
						</td>
						<td>
							<select class="form-control" name='tidy'>
								<option value="" disabled selected>*Cleanliness</option>
								<option value="Messy">Messy</option>
								<option value="Casual">Casual</option>
								<option value="Clean">I am clean and tidy</option>
							</select>	
						</td>
						<td>
						<select class="form-control" name='activity'>
							<option value="" disabled selected>*You often</option>
							<option value="clubs and sports">spend time at clubs/sports</option>
							<option value="stay in dorm">stay in his/her dorm</option>
							<option value="partying">go partying</option>
							<option value="outside of campus">spend time outside of campus</option>
							<option value="studying">studies</option>
							<option value="make/build things">building/making awesome stuff</option>
						</select>		
						</td>

					</tr>
					<tr>
						<td></td>
						<td>
						<select class="form-control" name='hours'>
							<option value="" disabled selected>*Personal Hours</option>
							<option value="Early">Early to Bed</option>
							<option value="Flexable">Flexable</option>
							<option value="Late">Nightowl</option>
						</select>	
						
						</td>
						<td>
						<select class="form-control" name='smoke'>
							<option value="" disabled selected>*You smoke?</option>
							<option value="Smoker">Smoker</option>
							<option value="Non-Smoker">Non-Smoker</option>
						</select>
						</td>
						<td>
						<select class="form-control" name='weekend'>
							<option value="" disabled selected>*Weekend</option>
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
						<select class="form-control" name='dorm_invite'>
							<option value="" disabled selected>*Dorming Invite</option>
							<option value="">Don't Search</option>
							<option value="Often">Often invites friends to dorming room</option>
							<option value="Sometimes">Sometime invites friends to dorming room</option>
							<option value="Rarely">Rarely invites friends to dorming room</option>
							<option value="Never">Never invites friends to dorming room</option>
						</select>
						</td>
					
					</tr>
			 
		</table>
		
		<br><br>
		Your Biography / Profile:<br>
		<textarea class="form-control" name='bio_box' rows="6" placeholder="You can paste your profile that you posted on the Rutgers FB page or you can type one from scratch. This will be viewed on your profile wall (Optional)"></textarea>
		
		<br><br>
		Your future at Rutgers:<br>
		<textarea class="form-control" name='future_box' rows="6" placeholder="Type here on what you plan on doing at Rutgers. What do you see yourself doing frequently for the next four years at Rutgers? (Optional)"></textarea>
		
		
<div style='visibility:hidden;'><input type='input' value='<?php echo $id; ?>' name='id_box'></div>
<input class="btn btn-lg btn-primary" type="submit" name='submit' value='Create Profile and Activate Account'>
		</form>
		
		
		</div>
		</div>
		</div>
		</center>
		</form>
	  
		  
		  
		  
		  
		  
<?php		  
		} else {
			echo "You have already activated your account!";
		
		}


      } else {
          echo "Invalid ID or Activation code. Please contact the site administrator at antlowhur@yahoo.com (Anthony Lowhur)";
      }


   } else {
      die("Data missing!");
	}



?>





</body>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 

<script src="js/autocomplete.js"></script>


</html>