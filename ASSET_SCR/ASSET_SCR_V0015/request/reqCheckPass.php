<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqCheckPass.php 
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

