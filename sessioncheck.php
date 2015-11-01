<?php
	session_start();	
	
	$user = $_SESSION['username'];
	

		
	
	if ($_SESSION['username']) {
	
	} else {
	header('Location: index.htm');
	}

?>