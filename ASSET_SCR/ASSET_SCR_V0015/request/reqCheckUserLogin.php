<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqCheckUserLogin.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์เช็คค่าซ้ำ
//** Version : 1.0
//** CoddingDate : 13/08/2556
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//
	
	//*************** Check Seesion ****************
	session_start();

	include_once("../class/User.php");
	$user = new User();
	
	if (!$user->getSession())
	{
	   header("location: ../page/main.php");
	}
	//**********************************************
	include_once("../class/Config.php");
	include_once("../class/User.php");
	$chkUser = new User();
	$dbCheck= new config();
	
	$usname = $_GET["logUname"];
	$passw = $_GET["logPass"];

		$arr = $chkUser->login($usname,$passw);
		$i=0;
		if($arr>$i){
			echo $arr;
		}
		else{ 
			echo $i;
		}
?>

