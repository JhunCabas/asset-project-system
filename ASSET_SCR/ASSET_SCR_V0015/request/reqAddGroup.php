<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqAddGroup.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไล์เพิ่มข้อมูลหมวดครุภัณฑ์
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
		
		include_once("../class/AssetGroup.php");
		$addGroup = new AssetGroup();
		
		$addGcode = $_GET["addGroupCode"];
		$addGname = $_GET["addGroupName"];
		$addTypeId = $_GET["addTypeId"];
		
		$addGroup->setValues($addGcode,$addGname,$addTypeId);
		$addGroup->addAssetGroup();
		
		
?>
