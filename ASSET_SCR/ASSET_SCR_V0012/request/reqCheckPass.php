<?php
	include_once("../class/Config.php");
	include_once("../class/User.php");
	$chkUser = new User();
	$dbCheck= new config();
	
	$userId = $_GET["userId"];
	$opass = $_GET["opass"];

		$pass = md5($opass);
		$arr = $chkUser->getOpass($userId,$pass);
		$rows = $dbCheck->num_rows($arr);
		$i=0;
		if($rows>$i){
		echo $rows;
		}
		else{ 
		echo $i;
		}
?>

