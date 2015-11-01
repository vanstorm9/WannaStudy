<html>
<head>
	<script src= "http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css" type="text/css"/>
	<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>


	<script src='jquery.js'></script>
	<script src='index.js'></script>
	<script src='ui.js'></script>

	<link href = "css/bootstrap.min.css" rel= "stylesheet">
	<link href = "css/styles.css" rel= "stylesheet">
	<link href = "css/buttons.css" rel= "stylesheet">
	<link href = "css/lartab.css" rel= "stylesheet">
	
	<?php
		include 'header.php';
		include 'connect.php';
		include 'general.php';
		include 'navbar.html';

		if ($_GET['hs']&&empty($_GET['uni'])){
			$school = $_GET['hs'];
			$school_type = 'hs';
		} else if ($_GET['uni']&&empty($_GET['hs'])){
			$school = $_GET['uni'];
			$major = $_GET['m'];
			$school_type = 'uni';
		}

		$post_subject_name = mysql_query("SELECT name FROM major WHERE school='$school' && id='$major'");
		$subject_name_row = mysql_fetch_assoc($post_subject_name);
		$subject_name = $subject_name_row['name'];

	?>
	

		
</head>

	<script>
		
		
			function submitChat(){
				if(form1.msg.value == ''){
					alert("You need to type in a message to send.");
					return;
				}
				
				
				var uname = '<?php echo $fullname; ?>';
				var school = '<?php echo $school;?>';
				var major = '<?php echo $major;?>';
				var id = '<?php echo $id;?>';
				var msg = form1.msg.value;
				var xmlhttp = new XMLHttpRequest();
				
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
						
					}
				}
				
				xmlhttp.open('GET','chat_insert.php?id='+ id +'&uname='+ uname +'&msg='+msg+'&school='+school+'&m='+major,true);
				xmlhttp.send();
			}
			
			$(document).ready(function(e) {
				var school = '<?php echo $school;?>';
				var major = '<?php echo $major;?>';
				$.ajaxSetup({cache:false});
				setInterval(function(){$('#chatlogs').load('chatlog.php?school='+school+'&m='+major);},1000);
			});
										
		</script>
	
<body>
	<center><h1><font style='color:white;'><?php echo $subject_name; ?> Chatroom</font></h1></center>
	
	
	<div style='width:80%; margin-left: auto;margin-right:auto;'>
		<div style='margin-left: auto;margin-right:auto;width: 70%;'>
			<form name="form1" style='margin: 10px 10px;'>
			<div id='chatlogs' style='left: 0px; border: 1px solid white; min-height: 400px;'>
				<font style='color:white;'>LOADING CHATLOGS PLEASE WAIT. . . </font>
			</div>

			<font style='color:white; margin-left: auto;margin-right:auto;'>Your Message:</font> <br>
				<textarea name="msg" style='width:500px;height:20px;'></textarea><br>
				<a href='#' onclick='submitChat()'>Send</a><br><br>
			</form>
		</div>
	</div>
	
	
</body>
	
	
	
</html>