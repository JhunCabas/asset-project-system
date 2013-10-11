<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqSelUpdateCheck.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์ เรียกข้อมูลมาตรวจเช็ค
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
		
		include_once("../class/CheckAsset.php");
		$updateChk = new CheckAsset();

		$checkId = $_GET["checkId"];
		$status = $_GET["status"];
		$userId = $_GET["userId"];
		$userId = $_SESSION["id"];
	
		
		if($status=="ใช้งานได้"){
			$stat="Y";
		}
		else if($status=="ชำรุด"){
			$stat="N";
		}
		else if($status=="เสื่อมสภาพ"){
			$stat="D";
		}
		else{
			$stat=null;
		}
			$updateChk->setCheckId($checkId);
			$updateChk->setCheckStatus($stat);
			$updateChk->setUserId($userId);
			$updateChk->checkAssetStatus();
?>
