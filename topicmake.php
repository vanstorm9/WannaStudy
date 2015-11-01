<?php 
include 'connect.php';
include 'general.php';
include 'header.php';

$message = $_POST['textarea_topic'];
$title = mysql_real_escape_string ($_POST['subjectbox']);
$submit = $_POST['submit'];
$major = $_POST['majorhide'];
$school = $_POST['schoolhide'];
$subject = $_POST['subjecthide'];
$course = $_POST['coursehide'];
$school_type = $_POST['school_type_hide'];
$anonymous = $_POST['anonymous_box'];
$orange_topic = $_POST['orangetopichide'];
$random = rand();
$message = nl2br($message); 
$valid_name = "subject_topic_".$random;


if ($anonymous == 1){


$random = rand(23456789,98765432);
$id_tag = "Anonymous_".$random;
$user_id = "0";

} else {
	$id_tag = $fullname;
	$user_id = $id;

}

if (isset($submit)){
	if (isset($message)&&!empty($message)){
		
	
		if (isset($title)&&!empty($title)){
			
		
			if (!empty($message)&&!empty($school)&&!empty($subject)&&!empty($course)&&isset($message)&&isset($school)&&isset($subject)&&isset($course)){
				
				$latexstring='';
				$string = $message;
				
				$array = explode("[math]",$string); 
				
				
				foreach($array as $i =>$key) {
				
					if ($i%2 != 0){
						
						
						$output_equation = '
						<img src="http://latex.codecogs.com/gif.latex?'.$array[$i].'" style="background-color: white; padding: 5px;" title="'.$array[$i].'" /><br><br>
						'; 
						
						$equation_array = "[math]".$array[$i]."[math]";
					   // echo  $equation_array;
						
						$latexstring = str_replace($equation_array, $output_equation, $string);
						
					$string =  $latexstring;    
					}
				
				
				}

				
				$message = $string;
				
				mysql_query("INSERT INTO topics VALUES('','$title','$valid_name','$id_tag','$user_id','','$school','$subject','$course','$major','$orange_topic',now(),now(),'$id_tag','','','','','1','$my_major_int') ") or die("There was an error creating your topic.");
				
				$message_id_query = mysql_query("SELECT id FROM topics WHERE valid_name='$valid_name' && name='$title'");
				$message_id_row = mysql_fetch_assoc($message_id_query);
				$topic_id = $message_id_row['id'];
				
				mysql_query("INSERT INTO anonymous VALUES('','$id','$random','$school','$major','$subject','$course','$topic_id','$orange_topic')");
				
				mysql_query("INSERT INTO posts VALUES('','$message','','$school','$subject ','$course','$major','$orange_topic','$topic_id',now(),now(),'$id_tag','$user_id') ");
				
				if ($orange_topic != ''){
					echo "<font style='color: white'>Your topic has been created.</font><br>
					<a href='topics.php?".$school_type."=".$school."&m=".$major."&sub=".$subject."&co=".$course."&oc=".$orange_topic."'>Click here to return back to your course section.</a>";
					
				} else {
					echo "<font style='color: white'>Your topic has been created.</font><br>
					<a href='topics.php?".$school_type."=".$school."&m=".$major."&sub=".$subject."&co=".$course."'>Click here to return back to your course section.</a>";
					
				}
			
			} else {
			
			
				echo "<font style='color: white'>This was an error sending your message.</font>";
				
			}
		} else {
			echo "<font style='color: white'>You need to type in the title!</font>";
		}
	} else {
		echo "<font style='color: white'>You need to type in a message!</font>";
	}
} 
?>