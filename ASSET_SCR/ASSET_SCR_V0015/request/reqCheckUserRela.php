<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqCheckUserRela.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์เช็คความสัมพันธ์
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

		$arr = $chkUser->getUserRelation($userId);
		$rows = $dbCheck->num_rows($arr);
		$i=0;
		if($rows>$i){
			echo $rows;
		}
		else{ 
			echo $i;
		}
?>

