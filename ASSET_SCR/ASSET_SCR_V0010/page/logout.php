<?php 
session_start();
	include_once("../class/User.php");
	$user = new User();
	$user->logout();
	header("location: ../index.php");
 ?>