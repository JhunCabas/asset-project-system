<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqAddType.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์เพิ่มข้อมูลประเภทครุภัณฑ์
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
		
		include_once("../class/AssetType.php");
		$addType = new AssetType();
		
		$addTcode = $_GET["addTypeCode"];
		$addTname = $_GET["addTypeName"];
		
		$addType->setValues($addTcode,$addTname);
		$addType->addAssetType();
		
		
?>
