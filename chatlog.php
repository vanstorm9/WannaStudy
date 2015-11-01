<?php 
require 'connect.php';
include 'general.php';

$school = $_REQUEST['school'];
$major = $_REQUEST['m'];


$result1 = mysql_query("SELECT * FROM chat_logs WHERE school='$school' && major='$major' ORDER by id ASC") or die("Failing in selecting from logs");



while($extract = mysql_fetch_array($result1)){
	
	$full_name = $extract['full_name'];
	
	$hash_query = mysql_query("SELECT random FROM users WHERE full_name='$full_name'");
	$row_hash = mysql_fetch_assoc($hash_query);
	$my_hash = $row_hash['random'];
	
	$firstnamequery = mysql_query("SELECT firstname FROM users WHERE full_name='$full_name'");
	$rowfirstname = mysql_fetch_assoc($firstnamequery);
	$firstname = $rowfirstname['firstname'];
	
	$lastnamequery = mysql_query("SELECT lastname FROM users WHERE full_name='$full_name'");
	$rowlastname = mysql_fetch_assoc($lastnamequery);
	$lastname = $rowlastname['lastname'];
	
	echo "<span class='uname'><font style='color:white;'><u><a style='color:#5bc0de;' href='profile.php?q=".$my_hash."&u=".$firstname."-".$lastname."'>". $extract['full_name'] . "</a></u> (". $extract['date']. " ". $extract['time']. ") </font></span><font style='color:white;'>:</font> <span class='msg'><font style='color:white;'>" . $extract['message'] . "</font></span><br>";
}
?>