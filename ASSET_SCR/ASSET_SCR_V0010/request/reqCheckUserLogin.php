<?php
	include_once("../class/Config.php");
	include_once("../class/User.php");
	$chkUser = new User();
	$dbCheck= new config();
	
	$usname = $_GET["logUname"];
	$passw = $_GET["logPass"];

	//$usname = "ramuss";

		$arr = $chkUser->login($usname,$passw);
		$i=0;
		if($arr>$i){
		echo $arr;
		}
		else{ 
		echo $i;
		}
?>

