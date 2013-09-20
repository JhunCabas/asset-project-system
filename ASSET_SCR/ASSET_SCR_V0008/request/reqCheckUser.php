<?php
	include_once("../class/Config.php");
	include_once("../class/User.php");
	$chkUser = new User();
	$dbCheck= new config();
	
	$usname = $_GET["regUname"];
	//$usname = "ramuss";

		$arr = $chkUser->checkUser($usname);
		$rows = $dbCheck->num_rows($arr);
		$i=0;
		if($rows>$i){
		echo $rows;
		}
		else{ 
		echo $i;
		}
?>

