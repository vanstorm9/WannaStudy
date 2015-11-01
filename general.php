<?php 
include 'connect.php';


$user = $_SESSION['username'];


$queryfirstnameget = mysql_query("SELECT firstname FROM users WHERE username='$user'");
	$rowfirstname = mysql_fetch_assoc($queryfirstnameget);
	$firstname= $rowfirstname['firstname'];
	

	$queryemailget = mysql_query("SELECT email FROM users WHERE username='$user'");
	$rowemail = mysql_fetch_assoc($queryemailget);
	$emailaddress= $rowemail['email'];

	$queryidget = mysql_query("SELECT id FROM users WHERE username='$user'");
	$rowid = mysql_fetch_assoc($queryidget);
	$id= $rowid['id'];

	$queryuserget = mysql_query("SELECT username FROM users WHERE username='$user'");
	$rowuser = mysql_fetch_assoc($queryuserget);
	$username= $rowuser['username'];
	
	$hash_query = mysql_query("SELECT random FROM users WHERE username='$user'");
	$row_hash = mysql_fetch_assoc($hash_query);
	$my_hash = $row_hash['random'];
	
	$queryadminget = mysql_query("SELECT activated FROM users WHERE username= '$user'");
	$rowadmin = mysql_fetch_assoc($queryadminget);
	$adminstate = $rowadmin['activated'];
	
	$firstnamequery = mysql_query("SELECT firstname FROM users WHERE username= '$username'");
	$rowfirstname = mysql_fetch_assoc($firstnamequery);
	$firstname = $rowfirstname['firstname'];
	
	$lastnamequery = mysql_query("SELECT lastname FROM users WHERE username= '$username'");
	$rowlastname = mysql_fetch_assoc($lastnamequery);
	$lastname = $rowlastname['lastname'];
	
	$fullname = $firstname." ".$lastname; 
	$fullnameURL = $firstname."_".$lastname; 
	
	$school_type_query = mysql_query("SELECT school_type FROM users WHERE username= '$username'");
	$row_school_type = mysql_fetch_assoc($school_type_query);
	$my_school_type = $row_school_type['school_type'];
	
	$school_query = mysql_query("SELECT name FROM school WHERE id= (SELECT school FROM users WHERE id='$id')");
	$row_school = mysql_fetch_assoc($school_query);
	$my_school = $row_school['name'];
	
	$my_num_post = mysql_num_rows(mysql_query("SELECT * FROM posts WHERE owner_id='$id'"));
	

	$school_int_query = mysql_query("SELECT school FROM users WHERE username= '$username'");
	$row_school_int = mysql_fetch_assoc($school_int_query);
	$my_school_int = $row_school_int['school'];
	
	$major_query = mysql_query("SELECT name FROM major WHERE id= (SELECT major FROM users WHERE id='$id')");
	$row_major = mysql_fetch_assoc($major_query);
	$my_major = $row_major['name'];

	$major_int_query = mysql_query("SELECT major FROM users WHERE username= '$username'");
	$row_major_int = mysql_fetch_assoc($major_int_query);
	$my_major_int = $row_major_int['major'];	
	
	$class_year_query = mysql_query("SELECT class_year FROM users WHERE username= '$username'");
	$row_class_year = mysql_fetch_assoc($class_year_query);
	$my_class_year = $row_class_year['class_year'];	
	
	
	$avatarquery = mysql_query("SELECT avatar FROM users WHERE username= '$username'");
	$rowavatar = mysql_fetch_assoc($avatarquery);
	$avatar = $rowavatar['avatar'];
	
	$activatedquery = mysql_query("SELECT activated FROM users WHERE username= '$username'");
	$rowactivated = mysql_fetch_assoc($activatedquery);
	$activated = $rowactivated['activated'];
	
    $fullname = $firstname." ".$lastname;
	
	$my_pos_reputation = mysql_num_rows(mysql_query("SELECT * FROM like_dislike WHERE like_reciever='$id' && like_cond='1'"));
	$my_neg_reputation = mysql_num_rows(mysql_query("SELECT * FROM like_dislike WHERE like_reciever='$id' && like_cond='0'"));

	$my_reputation = $my_pos_reputation - $my_neg_reputation;

?>