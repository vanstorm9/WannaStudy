<html>
<head>
<link type="text/css" href="studystylesheet.css" rel="stylesheet">

<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<link href = "css/bootstrap.min.css" rel= "stylesheet">
<link href = "css/styles.css" rel= "stylesheet">
<?php 
include 'connect.php';
include 'general.php';
include 'navbar.html';


?>
</head>



<title>Posts</title>
<body>

<?php 
if ($_GET['hs']&&empty($_GET['uni'])){
	$school = $_GET['hs'];
	$school_type = 'hs';
} else if ($_GET['uni']&&empty($_GET['hs'])){
	$school = $_GET['uni'];
	$major = $_GET['maj'];
	$school_type = 'uni';
}
	
$major = $_GET['m'];
$subject = $_GET['sub'];
$course = $_GET['co'];
$topic = $_GET['top'];
$orange_but = $_GET['oc'];



if ($orange_but == ''){
	$orange_but = 0;
}


$i = 0;


$post_post_name = mysql_query("SELECT name FROM topics WHERE school='$school' && subject='$subject' && id='$topic' && cours='$course'");
$post_post_row = mysql_fetch_assoc($post_post_name);
$post_name = $post_post_row['name'];
	
$post_topic_name = mysql_query("SELECT name FROM cours WHERE school='$school' && subject='$subject' && id='$course'");
$topic_name_row = mysql_fetch_assoc($post_topic_name);
$topic_name = $topic_name_row['name'];

$post_course_name = mysql_query("SELECT name FROM subjet WHERE school='$school' && id='$subject'");
$course_name_row = mysql_fetch_assoc($post_course_name);
$course_name = $course_name_row['name'];

$post_subject_name = mysql_query("SELECT name FROM major WHERE school='$school' && id='$major'");
$subject_name_row = mysql_fetch_assoc($post_subject_name);
$subject_name = $subject_name_row['name'];

$post_major_name = mysql_query("SELECT name FROM school WHERE id='$school'");
$major_name_row = mysql_fetch_assoc($post_major_name);
$major_name = $major_name_row['name'];

$valid_topic_check = mysql_num_rows(mysql_query("SELECT * FROM topics WHERE school='$school' && major='$major' && subject='$subject'&& cours='$course' && id='$topic'"));

if($valid_topic_check == 0){
	die("<font color='white'>Topic does not exist.</font>");
}

?>


<div style='padding: 10px;'>

<br>
<font style='color:white;'>Back to: 
<a href='college.php'><u>Colleges</u></a> ->
<a href='major.php?<?php echo $school_type; ?>=<?php echo $school;?>'><u><?php echo $major_name; ?></u></a> ->
<a href='subject.php?<?php echo $school_type; ?>=<?php echo $school;?>&m=<?php echo $major;?>'><u><?php echo $subject_name; ?></u></a> ->
 <a href='course.php?<?php echo $school_type; ?>=<?php echo $school;?>&m=<?php echo $major;?>&sub=<?php echo $subject; ?>'><u><?php echo $course_name; ?></u></a> ->
 <a href='topics.php?<?php echo $school_type; ?>=<?php echo $school;?>&m=<?php echo $major;?>&sub=<?php echo $subject; ?>&co=<?php echo $course; ?>'><u><?php echo $topic_name; ?></u></a></font>
<br><br>
<center><font style='color:white;'><h1><?php echo $post_name;?></h1></font></center>
<br><br>

	<?php 

	
	if ($orange_but != ''){
		$post_query = mysql_query("SELECT id, message, school, subject, cours, orange_but date, time, topics, owner, owner_id FROM posts WHERE school='$school' && major='$major' && subject='$subject'&& cours='$course' && topics='$topic' && orange_but != '0' ORDER BY id ASC");
		$post_max_num_query = mysql_query("SELECT MAX(id) FROM posts WHERE school='$school' && major='$major' && subject='$subject'&& cours='$course' && topics='$topic' && orange_but != '0'");	
		$post_max_num = mysql_result($post_max_num_query, 0);  
		
		$post_min_num_query = mysql_query("SELECT MIN(id) FROM posts WHERE school='$school' && major='$major' && subject='$subject'&& cours='$course' && topics='$topic' && orange_but != '0'");	
		$post_min_num = mysql_result($post_min_num_query, 0);  
		
		if($post_min_num == $post_max_num){
			$original_post = 1;
		} else {
			$original_post = 0;
		}
	} else {
		$post_query = mysql_query("SELECT id, message, school, subject, cours, orange_but, date, time, topics, owner, owner_id FROM posts WHERE school='$school' && major='$major' && subject='$subject'&& cours='$course' && topics='$topic' && orange_but = '0' ORDER BY id ASC");
		$post_max_num_query = mysql_query("SELECT MAX(id) FROM posts WHERE school='$school' && major='$major' && subject='$subject'&& cours='$course' && topics='$topic' && orange_but = '0'");
		$post_max_num = mysql_result($post_max_num_query, 0);  
		
		$post_min_num_query = mysql_query("SELECT MIN(id) FROM posts WHERE school='$school' && major='$major' && subject='$subject'&& cours='$course' && topics='$topic' && orange_but = '0'");
		$post_min_num = mysql_result($post_min_num_query, 0);  
		
		if($post_min_num == $post_max_num){
			$original_post = 1;
		} else{
			$original_post = 0;
		}
	}
	
	
	
	

	while($post_row = mysql_fetch_array($post_query)){

		
		$post_id = $post_row['id'];
		$post_message = $post_row['message'];
		$post_school = $post_row['school'];
		$post_owner = $post_row['owner'];
		$post_owner_id = $post_row['owner_id'];
		$post_subject = $post_row['subject'];
		$post_course = $post_row['cours'];
		$post_orange_but = $post_row['orange_but'];
		$post_topic = $post_row['topics'];
		$original_post_date = $post_row['date'];
		$original_post_time = $post_row['time'];
		
		$post_time = date("g:i:s a", strtotime($original_post_time));		
		$post_date = date("m/d/y", strtotime($original_post_date));
		
		


		$post_avatar_query = mysql_query("SELECT avatar FROM users WHERE id='$post_owner_id'");
		$post_avatar_row = mysql_fetch_assoc($post_avatar_query);
		$post_avatar = $post_avatar_row['avatar'];
		
		$topic_resolved_query = mysql_query("SELECT resolved FROM topics WHERE id='$post_topic' && owner_id='$id'");
		$topic_resolved_row = mysql_fetch_assoc($topic_resolved_query);
		$topic_resolved = $topic_resolved_row['resolved'];
		
		
		
		
		
		$school_query = mysql_query("SELECT name FROM school WHERE id= (SELECT school FROM users WHERE id='$post_owner_id')");
		$row_school = mysql_fetch_assoc($school_query);
		$poster_school = $row_school['name'];
		
		$major_query = mysql_query("SELECT name FROM major WHERE id= (SELECT major FROM users WHERE id='$post_owner_id')");
		$row_major = mysql_fetch_assoc($major_query);
		$poster_major = $row_major['name'];
		
		$class_year_query = mysql_query("SELECT class_year FROM users WHERE id='$post_owner_id'");
		$row_class_year = mysql_fetch_assoc($class_year_query);
		$poster_class_year = $row_class_year['class_year'];	
		
		$poster_num_post = mysql_num_rows(mysql_query("SELECT * FROM posts WHERE owner_id='$post_owner_id'"));
		
		
		$post_rep_pos = mysql_num_rows(mysql_query("SELECT * FROM like_dislike WHERE post_id='$post_id' && school='$school' && major='$major' && subject='$subject' && cours='$course' && topics='$topic' && orange_but='$orange_but' && like_cond='1'"));
		$post_rep_neg = mysql_num_rows(mysql_query("SELECT * FROM like_dislike WHERE post_id='$post_id' && school='$school' && major='$major' && subject='$subject' && cours='$course' && topics='$topic' && orange_but='$orange_but' && like_cond='0'"));	
		
		$post_rep = $post_rep_pos - $post_rep_neg;
		
		if ($post_rep == 0){
			$rep_color = '';
		} else if($post_rep < 0){
			$rep_color = 'red';
		} else {
			$rep_color = '#04B404';
		}
		
		if (mysql_num_rows($post_avatar_query) == 0){
			$post_avatar = 'http://bit.ly/TWdFJa';
		} 
	
	
	?>
	
	<center><table class='table table-condensed table-borderless '>
		<tr>
			<td style='width:20%'>
				<div class='box' style='width:250px;'>
					<?php
					if($post_owner_id!=0){
					?>
						<center><i><?php echo $poster_major;?></i></center>
					<?php 
					}
					?>
					
					<center><img src='<?php echo $post_avatar;?>' style='width:150px; height:150px;'>
					<p><u><b><?php echo $post_owner; ?></b></u></p>
					</center>
					
					<?php
					if($post_owner_id!=0){
					?>
						<table>
							<tr>
								<td>Reputation:&nbsp;&nbsp;</td>
								<td></td>
							</tr>
							<tr>
								<td>Class Year:&nbsp;&nbsp;</td>
								<td><?php echo $poster_class_year;?></td>
							</tr>
							<tr>
								<td>Posts:&nbsp;&nbsp;</td>
								<td><?php echo $poster_num_post;?></td>
							</tr>
							<tr>
								<td>Location:&nbsp;&nbsp;</td>
								<td></td>
							</tr>
							<tr>
								<td>Join Date:&nbsp;&nbsp;</td>
								<td></td>
							</tr>
						</table>
					<?php 
					}
					?>
				</div>
			</td>
			<td style='width:60% padding:15px;'>
				<div class='box' style='width:100%;'>
				<div>
					<div style="float:left;">
						<b><?php echo $post_owner; ?> : </b> | <font color='white' size='2px'>Date: <?php echo $post_date; ?> | Time: <?php echo $post_time; ?></font><br>
					</div>
					<div style="float:right;">
						<?php 
		
						if($post_owner_id == 0){
							$anonymous_user_relation_id_query = mysql_query("SELECT user_id FROM anonymous WHERE user_id='$id' && school='$school' && major='$major' && subject='$subject' && course='$course' && topic='$topic'");
							$anonymous_user_relation_id_row = mysql_fetch_assoc($anonymous_user_relation_id_query);
							$post_owner_id = $anonymous_user_relation_id_row['user_id'];
						}			
			
						if($post_max_num == $post_id && $post_owner_id == $id){
							if($orange_but == 0){
							?>
								<a href="post_delete.php?<?php echo $school_type;?>=<?php echo $school;?>&m=<?php echo $major;?>&sub=<?php echo $subject;?>&co=<?php echo $course;?>&to=<?php echo $topic; ?>&opp=<?php echo $original_post;?>01&ic=<?php echo $post_id; ?>">Delete Post</a>
							<?php
							} else {
							?>
								<a href="post_delete.php?<?php echo $school_type;?>=<?php echo $school;?>&m=<?php echo $major;?>&sub=<?php echo $subject;?>&co=<?php echo $course;?>&to=<?php echo $topic; ?>&oc=<?php echo $orange_but;?>&opp=<?php echo $original_post;?>01&ic=<?php echo $post_id; ?>">Delete Post</a>
							<?php
							}
						}else{

						}	
						?>
					</div>
				</div>
				<br>
				<p style='clear:both;'><?php echo $post_message."<br>"; ?></p>
					
					
					
				<?php 
				
				$anti_copy_check = mysql_num_rows(mysql_query("SELECT * FROM like_dislike WHERE post_id='$post_id' && school='$school' && major='$major' && subject='$subject' && cours='$course' && topics='$topic' && orange_but='$orange_but' && like_giver='$id'"));
				
				if ($anti_copy_check == 0){
					$disable_like_tag = '';
					$like_message = 'Like';
					$dislike_message = 'Dislike';
				} else {
					$anti_copy_like_check = mysql_num_rows(mysql_query("SELECT * FROM like_dislike WHERE post_id='$post_id' && school='$school' && major='$major' && subject='$subject' && cours='$course' && topics='$topic' && orange_but='$orange_but' && like_giver='$id' && like_cond='1'"));
					$anti_copy_dislike_check = mysql_num_rows(mysql_query("SELECT * FROM like_dislike WHERE post_id='$post_id' && school='$school' && major='$major' && subject='$subject' && cours='$course' && topics='$topic' && orange_but='$orange_but' && like_giver='$id' && like_cond='0'"));
					
					if ($anti_copy_like_check == 1 && $anti_copy_dislike_check == 0){
						$disable_like_tag = 'disabled="disabled"';
						$like_message = 'You liked!';
						$dislike_message = 'Dislike';
					} else if ($anti_copy_like_check == 0 && $anti_copy_dislike_check == 1){
						$disable_like_tag = 'disabled="disabled"';
						$dislike_message = 'You disliked!';
						$like_message = 'Like';
					}
				}
				
				
				if ($user){
					if ($id != $post_owner_id){
				?>
				<p>
				<button type="button" class="btn btn-default btn-sm" id='like_but' name='like_but' onclick='raise_up(<?php echo $i; ?>,<?php echo $post_id;?>, <?php echo $major;?>, <?php echo $subject;?>, <?php echo $course;?>, <?php echo $topic;?>, <?php echo $orange_but;?>, <?php echo $school;?>, 1)' <?php echo $disable_like_tag;?>><div id="adiv1_<?php echo $i?>"><span class="glyphicon glyphicon-thumbs-up"></span> <font style='font-size:120%;'><?php echo $like_message;?></font></div></button>
				<button type="button" class="btn btn-default btn-sm" id='dislike_but' name='dislike_but' onclick='raise_up(<?php echo $i; ?>,<?php echo $post_id;?>, <?php echo $major;?>, <?php echo $subject;?>, <?php echo $course;?>, <?php echo $topic;?>, <?php echo $orange_but;?>, <?php echo $school;?>, 0)' <?php echo $disable_like_tag;?>><div id="adiv0_<?php echo $i?>"><span class="glyphicon glyphicon-thumbs-down"></span> <font style='font-size:120%;'><?php echo $dislike_message;?></font></div></button>&nbsp;&nbsp;&nbsp;&nbsp;
				</p>
				<?php 
					$i++;
				
					}
				}
				?>
				
				
				(<font style='color:<?php echo $rep_color;?>'><b><?php echo $post_rep;?></b></font>) 
				
				
					
				</div>
				<?php 
				if ($post_min_num == $post_id && $post_owner_id == $id){
					
					if($orange_but == 0){
						if($topic_resolved==0){
							?>
								<br>
								<a href="topic_resolved.php?<?php echo $school_type;?>=<?php echo $school;?>&m=<?php echo $major;?>&sub=<?php echo $subject;?>&co=<?php echo $course;?>&to=<?php echo $topic; ?>&ic=<?php echo $post_id; ?>"><button type="button" class="btn btn-success "><span class='glyphicon glyphicon-ok' style='color:white;'></span> Question Resolved</button></a>
								<br>
							<?php
						} else if($topic_resolved==1){
							?>
								<br>
								<a href="topic_resolved.php?<?php echo $school_type;?>=<?php echo $school;?>&m=<?php echo $major;?>&sub=<?php echo $subject;?>&co=<?php echo $course;?>&ar=1&to=<?php echo $topic; ?>&ic=<?php echo $post_id; ?>"><button type="button" class="btn btn-success ">Question Not Resolved</button></a>
								<br>
							<?php
						}
						
					
					} else {
						if($topic_resolved==0){
							?>
								<br>
								<a href="topic_resolved.php?<?php echo $school_type;?>=<?php echo $school;?>&m=<?php echo $major;?>&sub=<?php echo $subject;?>&co=<?php echo $course;?>&to=<?php echo $topic; ?>&oc=<?php echo $orange_but;?>&ic=<?php echo $post_id; ?>"><button type="button" class="btn btn-success "><span class='glyphicon glyphicon-ok' style='color:white;'></span> Question Resolved</button></a>
								<br>
							<?php
						} else if($topic_resolved==1){
							?>
								<br>
								<a href="topic_resolved.php?<?php echo $school_type;?>=<?php echo $school;?>&m=<?php echo $major;?>&sub=<?php echo $subject;?>&co=<?php echo $course;?>&ar=1&to=<?php echo $topic; ?>&oc=<?php echo $orange_but;?>&ic=<?php echo $post_id; ?>"><button type="button" class="btn btn-success ">Question Not Resolved</button></a>
								<br>
				
							<?php			
						}
					
					}
				
					
				
				}	
				?>
				
				
			</td>
		</tr>
	</table></center>
	<br>


	
	<?php

	}
	?>
	<br><br><br>
<?php

if ($user){
?>
<center><div>
	<form method='post' action='sendpost.php'>
		<center><textarea class="form-control" style='width:60%;' rows='12' name='textarea_post'></textarea></center><br>
		<a href='latex_math_reference.php' target='_blank'>How to type math symbols (like integral, fractions, sum, square root, etc)</a>
		<br>
        <input type='checkbox' name='anonymous_box' value='1'>		
		<font color='white' size='2px'>Send as Anonymous</font>
		<input type='hidden' name='subjecthide' value='<?php echo $subject;?>'>
		<input type='hidden' name='majorhide' value='<?php echo $major;?>'>
		<input type='hidden' name='school_type_hide' value='<?php echo $school_type;?>'>
		<input type='hidden' name='schoolhide' value='<?php echo $school;?>'>
		<input type='hidden' name='coursehide' value='<?php echo $course;?>'>
		<input type='hidden' name='topichide' value='<?php echo $topic;?>'>
		<input type='hidden' name='orangebuthide' value='<?php echo $orange_but;?>'>
		
		
		
                <br>
		<center><input type='submit' name='submit1' class='submit1' value='Submit Comment'></center><br><br>
	</form>
</div></center>
<?php
} else {

}

?>
	
</div>

<script type="text/javascript"> 



	function raise_up(adiv_tag, recieving_id, major, subject, course, topic, orange_but, school, like_dislike){

		if (window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		} else{
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		}
		
		

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
				<?php 
				$like_post_query = mysql_query("SELECT * FROM posts WHERE owner_id!='$id' && school='$school' && major='$major' && subject='$subject'&& cours='$course' && topics='$topic' && orange_but = '0'");
				
				
				
				
				$j = 0;
				while($like_post_row = mysql_fetch_array($like_post_query)){	
				
				
				?>
					if (adiv_tag == <?php echo $j; ?>){
						if (like_dislike == 1){
							document.getElementById("adiv1_<?php echo $j;?>").innerHTML =  xmlhttp.responseText;
						} else if (like_dislike == 0){
							document.getElementById("adiv0_<?php echo $j;?>").innerHTML =  xmlhttp.responseText;
						}
					}
				<?php
					$j++;
				}
				
				?>
				
				
			}
										
		}
				
	xmlhttp.open('GET','include.inc.php?p=' + recieving_id + '&m=' + major + '&sub=' + subject + '&co=' + course + '&t=' + topic + '&oc=' + orange_but + '&s=' + school + '&ld=' + like_dislike, true);
	xmlhttp.send();
	
	

	}

</script>




</body>





</html>