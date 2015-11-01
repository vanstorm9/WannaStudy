<?php 
include 'connect.php';
include 'general.php';
include 'header.php';

$message = mysql_real_escape_string ($_POST['textarea1']);
$submit = $_POST['submit1'];
$school = $_POST['schoolhide'];
$major = $_POST['majorhide'];
$school_type = $_POST['school_type_hide'];
$subject = $_POST['subjecthide'];
$course = $_POST['coursehide'];
$topic = $_POST['topichide'];
$orange_but = $_POST['orangebuthide'];
$message = $_POST['textarea_post'];
$anonymous = $_POST['anonymous_box'];

$message = nl2br($message); 

if ($anonymous == 1){

$in_anonymous = mysql_num_rows(mysql_query("SELECT * FROM anonymous WHERE school='$school' && major='$major' && subject='$subject' && course='$course' && topic='$topic' && orange_topic='$orange_but' && user_id='$id'")); //or die("<font style='color: white'>Trouble finding previous anonymous data</font>");
$random = 0;

	if ($in_anonymous == 0){

		$random = rand(23456789,98765432);

		mysql_query("INSERT INTO anonymous VALUES('','$id','$random','$school','$major','$subject','$course','$topic','$orange_but')") or die("<font style='color: white'>Unable to create anonymous topic</font>");

		
	} else {
		$random_id_query = mysql_query("SELECT random_id FROM anonymous WHERE school='$school' && major='$major' && subject='$subject' && course='$course' && topic='$topic' && user_id ='$id'");
		$row_random_id = mysql_fetch_assoc($random_id_query);
		$random = $row_random_id['random_id']; 
		


	}

$id_tag = "Anonymous_".$random;
$user_id = "0";

} else {
	$id_tag = $fullname;
	$user_id = $id;

}


if (isset($submit)){
	if (isset($message)&&!empty($message)){

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
		
			
			mysql_query("INSERT INTO posts VALUES('','$message','','$school','$subject ','$course','$major','$orange_but','$topic',now(),now(),'$id_tag','$user_id')");
			mysql_query("UPDATE topics SET last_user='$id_tag' WHERE id ='$topic'");
			
			
			if ($orange_but != '0'){
				echo "<font style='color: white'>Your post has been created. <br>
				<a href='post.php?".$school_type."=".$school."&m=".$major."&sub=".$subject."&co=".$course."&top=".$topic."&oc=".$orange_but."'>Click here to see your post.</a></font>";
			} else {
				echo "<font style='color: white'>Your post has been created. <br>
				<a href='post.php?".$school_type."=".$school."&m=".$major."&sub=".$subject."&co=".$course."&top=".$topic."'>Click here to see your post.</a></font>";
			
			}
		
		} else {
			echo "<font style='color: white'>This was an error sending your message.</font>";
				
		}
		
	} else {
		echo "<font style='color: white'>You need to type in a message!</font>";
	}
} 
?>