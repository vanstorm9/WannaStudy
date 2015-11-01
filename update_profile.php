<html>
<link rel="shortcut icon" href="css/favicon.ico">
<title>Activate Account</title>

<?php
include 'connect.php';
include 'sessioncheck.php';
include 'general.php';

session_start();	
	
$user = $_SESSION['username'];

$submit = $_POST['submit'];
$id = $_POST['id_box'];
$first_name = strip_tags(mysql_real_escape_string($_POST['first_name_box']));
$last_name = strip_tags(mysql_real_escape_string($_POST['last_name_box']));
$class_of = $_POST['class_of_box'];
$major = strip_tags(mysql_real_escape_string($_POST['major_text']));
$contact = strip_tags(mysql_real_escape_string($_POST['contact_box']));
$location = $_POST['location_box'];
$campus = $_POST['campus_box'];
$avatar = strip_tags(mysql_real_escape_string($_POST['avatar_box']));
$state = strip_tags(mysql_real_escape_string($_POST['state_text']));
$country = strip_tags(mysql_real_escape_string($_POST['country_text']));
$interest_1 = strip_tags(mysql_real_escape_string($_POST['interest_text_1']));
$interest_2 = strip_tags(mysql_real_escape_string($_POST['interest_text_2']));
$interest_3 = strip_tags(mysql_real_escape_string($_POST['interest_text_3']));
$music = strip_tags(mysql_real_escape_string($_POST['music_text']));
$show = strip_tags(mysql_real_escape_string($_POST['show_text']));
$sport = strip_tags(mysql_real_escape_string($_POST['sport_text']));
$movie = strip_tags(mysql_real_escape_string($_POST['movie_text']));
$game = strip_tags(mysql_real_escape_string($_POST['game_text']));
$loud = $_POST['loud_box'];
$tidy = $_POST['tidy_box'];
$activity = $_POST['activity'];
$hours = $_POST['hours'];
$smoke = $_POST['smoke'];
$weekend = $_POST['weekend'];
$dorm_invite = $_POST['dorm_invite']; 
$gender = $_POST['gender'];
$profile = strip_tags(mysql_real_escape_string($_POST['bio_box']));
$future = strip_tags(mysql_real_escape_string($_POST['future_box']));

if($location != ''&& $campus != '' && $loud != '' && $tidy != ''  && $activity != ''  && $hours != ''  && $smoke != ''  && $weekend != '' && $dorm_invite !='')
{	
	$interest_1_check = mysql_num_rows(mysql_query("SELECT name_interest FROM tags_interest WHERE name_interest='$interest_1'"));
	$interest_2_check = mysql_num_rows(mysql_query("SELECT name_interest FROM tags_interest WHERE name_interest='$interest_2'"));
	$interest_3_check = mysql_num_rows(mysql_query("SELECT name_interest FROM tags_interest WHERE name_interest='$interest_3'"));	
	$music_check = mysql_num_rows(mysql_query("SELECT name_music FROM tags_music WHERE name_music='$music'"));	
	$show_check = mysql_num_rows(mysql_query("SELECT name_show FROM tags_show WHERE name_show='$show'"));
	$major_check = mysql_num_rows(mysql_query("SELECT name_major FROM tags_major WHERE name_major='$major'"));
	$sport_check = mysql_num_rows(mysql_query("SELECT name_sport FROM tags_sport WHERE name_sport='$sport'"));	
	$movie_check = mysql_num_rows(mysql_query("SELECT name_movie FROM tags_movie WHERE name_movie='$movie'"));
	$game_check = mysql_num_rows(mysql_query("SELECT name_game FROM tags_game WHERE name_game='$game'"));
	$country_check = mysql_num_rows(mysql_query("SELECT name_country FROM tags_country WHERE name_country='$country'"));
	$state_check = mysql_num_rows(mysql_query("SELECT name_state FROM tags_state WHERE name_state='$state'"));

	
	
	//Add tags
	if ($country_check == 0 && $country!= ''){
		mysql_query("INSERT INTO tags_country VALUES('','$country')");
	}
	
	if ($state_check == 0 && $state != ''){
		mysql_query("INSERT INTO tags_state VALUES('','$state')");
	}
	
	if ($major_check == 0 && $major != ''){
		mysql_query("INSERT INTO tags_major VALUES('','$major')");
	} else if ($major == ''){
		$major= '-Undecided-';
	}
	
	if ($interest_1_check == 0 && $interest_1!= ''){
		mysql_query("INSERT INTO tags_interest VALUES('','$interest_1')");
	} else if ($interest_1 == ''){
		$interest_1 = "-None-";
	}

	if ($interest_2_check == 0 && $interest_2!= ''){
		mysql_query("INSERT INTO tags_interest VALUES('','$interest_2')");
	} else if ($interest_2 == ''){
		$interest_1 = "-None-";
	}
	
	if ($interest_3_check == 0 && $interest_3!= ''){
		mysql_query("INSERT INTO tags_interest VALUES('','$interest_3')");
	} else if ($interest_3 == ''){
		$interest_1 = "-None-";
	}
	
	if ($music_check == 0 && $music != ''){
		mysql_query("INSERT INTO tags_music VALUES('','$music')");
	} else if ($music == ''){
		$music = "-None-";
	}

	if ($show_check == 0 && $show != ''){
		mysql_query("INSERT INTO tags_show VALUES('','$show')");
	} else if ($show == ''){
		$show = '-None-';
	}
	
	
	if ($sport_check == 0 && $sport != ''){
		mysql_query("INSERT INTO tags_sport VALUES('','$sport')");
	} else if ($sport == ''){
		$sport = "-None-";
	}
	
	if ($movie_check == 0 && $movie != ''){
		mysql_query("INSERT INTO tags_movie VALUES('','$movie')");
	} else if ($movie == ''){
		$movie ='-None-';
	}
	
	
	if ($game_check == 0 && $game != ''){
		mysql_query("INSERT INTO tags_game VALUES('','$game')");
	} else if ($game == ''){
		$game = "-None-";
	}

	
	mysql_query("UPDATE search_info SET first_name='$first_name', last_name='$last_name', class_of= '$class_of', gender='$gender',location='$location', campus='$campus', social_site='$contact', loud='$loud', tidy='$tidy', country='$country', game='$game', interest='$interest_1', interest_2='$interest_2', interest_3='$interest_3', major='$major', movie='$movie', music='$music', tv_show='$show', sport='$sport', state='$state', hour='$hours', dorm_invite='$dorm_invite', weekend='$weekend',activity='$activity',smoke='$smoke' WHERE user_id='$my_id'");
	
	mysql_query("UPDATE users SET first_name='$first_name', last_name='$last_name' profile='$profile', future='$future', avatar='$avatar' WHERE id='$my_id'");
	
	
	die("You have updated your profile. <a href='home.php'>Please click here to return.</a>");
	
} else {
	die("You need to fill out ALL required information");

}



?>

</html>