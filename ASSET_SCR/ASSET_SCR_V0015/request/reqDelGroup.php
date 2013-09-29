<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqDelGroup.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์ลบข้อมูลหมวดครุภัณฑ์
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
		include_once("../class/AssetGroup.php");
		$delGroup = new AssetGroup();
		
		$delId = $_GET["assetGroupid"];
		
		$delGroup->setAssetGroupId($delId);
		$delGroup->delAssetGroup();
		
		
		
?>
