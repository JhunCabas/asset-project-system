<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqEditUser.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์แก้ไขข้อมูลผู้ใช้
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
		$firstName = $_GET["upFname"];
		$lastName = $_GET["upLname"];
		$position = $_GET["upPosition"];
		$stat = $_GET["upStatus"];
		
		
		if($stat=="1"){
			$stat="Administrator";
			$updateUser->setValues(null,null,$firstName,$lastName,$position,$stat);
			$updateUser->editUser($userId);
		}
		else if($stat=="2"){
			$stat="Officer";
			$updateUser->setValues(null,null,$firstName,$lastName,$position,$stat);
			$updateUser->editUser($userId);
		}
		else{
			
		}
		
		
?>
