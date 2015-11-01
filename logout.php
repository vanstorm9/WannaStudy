<?php 
include 'connect.php';
include 'general.php';

session_destroy();

header("Location: index.php");

?>