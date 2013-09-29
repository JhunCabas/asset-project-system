<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqEditPass.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์แก้ไขข้อมูลรหัสผ่าน
//** Version : 1.0
//** CoddingDate : 13/08/2556
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//

		//*************** Check Session ****************
		session_start();
	
		include_once("../class/User.php");
		$user = new User();
		
		if (!$user->getSession())
		{
		   header("location: ../page/main.php");
		}
		//**********************************************
		include_once("../class/User.php");
		$updateUser = new User();
		
		$userId = $_GET["userId"];
		$oldPass = $_GET["oldPass"];
		$newPass = $_GET["newPass"];
		
		$updateUser->setPassword($newPass);
		$updateUser->getEditPassword($userId,$oldPass);
	
		
?>
