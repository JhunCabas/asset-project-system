<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqEditGroup.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์แก้ไขข้อมูลหมวดครุภัณฑ์
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
		include_once("../class/AssetGroup.php");
		$updateGroup = new AssetGroup();
		
		
		$assetGroupId = $_GET["assetGroupId"];
		$groupName = $_GET["editGname"];
		
		$updateGroup->setAssetGroupId($assetGroupId);
		$updateGroup->setAssetGroupName($groupName);
		$updateGroup->editAssetGroup();
		
		
?>
