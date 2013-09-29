<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqAddUser.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไล์เพิ่มข้อมูลผู้ใช้
//** Version : 1.0
//** CoddingDate : 13/08/2556
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//
		session_start();

		include_once("../class/User.php");
		$user = new User();
		
		if (!$user->getSession())
		{
		   header("location: ../page/main.php");
		}
		
		include_once("../class/User.php");
		
		$regUser = new User();
		
		$usname = $_GET["regUname"];
		$paword = $_GET["regPass"];
		$firstName = $_GET["regFname"];
		$lastName = $_GET["regLname"];
		$position = $_GET["regPosition"];
		$stat = $_GET["regStatus"];
		
		if($stat=="ผู้ดูแลระบบ"){
			$stat="Administrator";
			$regUser->setValues($usname,$paword,$firstName,$lastName,$position,$stat);
			$regUser->addUser();
		}
		else if($stat=="เจ้าหน้าที่พัสดุ"){
			$stat="Officer";
			$regUser->setValues($usname,$paword,$firstName,$lastName,$position,$stat);
			$regUser->addUser();
		}
		else{
			
		}
		
		
?>
