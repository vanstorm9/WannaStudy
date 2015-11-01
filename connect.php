<?php 
mysql_connect('127.0.0.1', '(INSERT USERNAME HERE)', '(INSERT PASSWORD HERE)');
mysql_select_db('a4557730_wanna');

session_start();

$user = $_SESSION['username'];
?>

