<html>
<link rel="shortcut icon" href="css/favicon.ico">
<title>Activate Account</title>

<?php
include 'connect.php';

$user_id = $_POST['id_box'];
$major = strip_tags(mysql_real_escape_string($_POST['major_text']));
$contact = $_POST['contact_box'];
$location = $_POST['location_box'];
$campus = $_POST['campus_box'];
$state = strip_tags(mysql_real_escape_string($_POST['state_text']));
$avatar = $_POST['avatar_text'];
$country = strip_tags(mysql_real_escape_string($_POST['country_text']));
$interest_1 = strip_tags(mysql_real_escape_string($_POST['interest_text_1']));
$interest_2 = strip_tags(mysql_real_escape_string($_POST['interest_text_2']));
$interest_3 = strip_tags(mysql_real_escape_string($_POST['interest_text_3']));
$music = strip_tags(mysql_real_escape_string($_POST['music_text']));
$show = strip_tags(mysql_real_escape_string($_POST['show_text']));
$sport = strip_tags(mysql_real_escape_string($_POST['sport_text']));
$movie = strip_tags(mysql_real_escape_string($_POST['movie_text']));
$game = strip_tags(mysql_real_escape_string($_POST['game_text']));
$loud = strip_tags(mysql_real_escape_string($_POST['loud']));
$tidy = strip_tags(mysql_real_escape_string($_POST['tidy']));
$activity = $_POST['activity'];
$hours = $_POST['hours'];
$smoke = $_POST['smoke'];
$weekend = $_POST['weekend'];
$dorm_invite = $_POST['dorm_invite'];
$bio = $_POST['bio_box'];
$future = $_POST['future_box'];
$random = rand(23456789,98765432);

if($location != ''&& $campus != '' && $loud != '' && $tidy != ''  && $activity != ''  && $hours != ''  && $smoke != ''  && $weekend != '')
{
	$first_name_query = mysql_query("SELECT first_name FROM users WHERE id='$user_id'");
	$first_name_row = mysql_fetch_assoc($first_name_query);
	$first_name = $first_name_row['first_name']; 

	$last_name_query = mysql_query("SELECT last_name FROM users WHERE id='$user_id'");
	$last_name_row = mysql_fetch_assoc($last_name_query);
	$last_name = $last_name_row['last_name']; 

	$class_of_query = mysql_query("SELECT class_of FROM users WHERE id='$user_id'");
	$class_of_row = mysql_fetch_assoc($class_of_query);
	$class_of = $class_of_row['class_of']; 
	
	$gender_query = mysql_query("SELECT gender FROM users WHERE id='$user_id'");
	$gender_row = mysql_fetch_assoc($gender_query);	
	$gender = $gender_row['gender'];
	
	$major_check = mysql_num_rows(mysql_query("SELECT name_major FROM tags_major WHERE name_major='$major'"));
	$interest_1_check = mysql_num_rows(mysql_query("SELECT name_interest FROM tags_interest WHERE name_interest='$interest_1'"));
	$interest_2_check = mysql_num_rows(mysql_query("SELECT name_interest FROM tags_interest WHERE name_interest='$interest_2'"));
	$interest_3_check = mysql_num_rows(mysql_query("SELECT name_interest FROM tags_interest WHERE name_interest='$interest_3'"));
	$music_check = mysql_num_rows(mysql_query("SELECT name_music FROM tags_music WHERE name_music='$music'"));	
	$show_check = mysql_num_rows(mysql_query("SELECT name_show FROM tags_show WHERE name_show='$show'"));	
	$sport_check = mysql_num_rows(mysql_query("SELECT name_sport FROM tags_sport WHERE name_sport='$sport'"));	
	$movie_check = mysql_num_rows(mysql_query("SELECT name_movie FROM tags_movie WHERE name_movie='$movie'")); 	
	$game_check = mysql_num_rows(mysql_query("SELECT name_game FROM tags_game WHERE name_game='$game'"));	
	$state_check = mysql_num_rows(mysql_query("SELECT name_state FROM tags_state WHERE name_state='$state'"));
	$country_check = mysql_num_rows(mysql_query("SELECT name_country FROM tags_country WHERE name_country='$country'"));
	

	
	
	$profile= 'img/unknown_user.png';
	
	
	//Add tags
	
	if ($avatar ==''){
		$avatar = 'http://newtroy.integra-technologies.co.uk/static/images/unknown_user.png';
	}
	
	if ($country_check == 0 && $country_check != ''){
		mysql_query("INSERT INTO tags_country VALUES('','$country')");
	}
	
	if ($state_check == 0 && $state_check != ''){
		mysql_query("INSERT INTO tags_state VALUES('','$state')");
	}
	
	if ($major_check == 0 && $major !=''){
		mysql_query("INSERT INTO tags_major VALUES('','$major')");
	} else if ($major ==''){
		$major = "Undecided";
	}
	
	if ($interest_1_check == 0 && $interest_1 !=''){
		mysql_query("INSERT INTO tags_interest VALUES('','$interest_1')");
	} else if ($interest_1 ==''){
		$interest_1 = "-None-";
	}
	
	if ($interest_2_check == 0 && $interest_2 !=''){
		mysql_query("INSERT INTO tags_interest VALUES('','$interest_2')");
	} else if ($interest_2 ==''){
		$interest_2 = "-None-";
	}
	
	if ($interest_3_check == 0 && $interest_3 !=''){
		mysql_query("INSERT INTO tags_interest VALUES('','$interest_3')");
	} else if ($interest_3 ==''){
		$interest_3 = "-None-";
	}
	
	if ($music_check == 0 && $music !=''){
		mysql_query("INSERT INTO tags_music VALUES('','$music')");
	} else if ($music ==''){
		$music = "-None-";
	}
	
	if ($show_check == 0 && $show !=''){
		mysql_query("INSERT INTO tags_show VALUES('','$show')");
	} else if ($show ==''){
		$show = "-None-";
	}
	
	if ($sport_check == 0 && $sport !=''){
		mysql_query("INSERT INTO tags_sport VALUES('','$sport')");
	} else if ($sport ==''){
		$sport = "-None-";
	}
	
	if ($movie_check == 0 && $movie !=''){
		mysql_query("INSERT INTO tags_movie VALUES('','$movie')");
	} else if ($movie ==''){
		$movie = "-None-";
	}
	
	if ($game_check == 0  && $game !=''){
		mysql_query("INSERT INTO tags_game VALUES('','$game')");
	} else if ($game ==''){
		$game = "-None-";
	}

	mysql_query("INSERT INTO search_info VALUES('','$user_id','$first_name','$last_name','$gender','$class_of','$location','$campus','$contact','$loud','$tidy','$country','$game','$interest_1','$interest_2','$interest_3','$major','$movie','$music','$show','$sport','$state','$hours','$dorm_invite','$weekend','$activity','$smoke')");
	
	
	

	$acti = mysql_query("UPDATE users SET profile='$bio',future='$future',avatar='$avatar',random='$random',activated='1' WHERE id='$user_id'");   




$to= $email;
$subject= "Activate your Rutgers Roommate account";
 $headers= "From: Anthony Lowhur";
 $body = "Hello $firstname
Your account has been activated! You can now log in and find your perfect roommate!

Once you log in, feel free to use the search engine and fill out certain fields to narrow down searches related to your interest. After that, just add as your roommate (they will get a notification) and feel free to arrange a private chat on Facebook, Twitter, Skype, or whatever you guys go on.

I hope that you enjoy the search engine and find your perfect roommate!
Anthony Lowhur
Founder of the Rutgers Roommate Search Engine";



	
	die("Your account has been activated. You may now login <a href='index.htm'>here</a>.");
} else {
	die("You need to fill out ALL required information");

}



?>

</html>