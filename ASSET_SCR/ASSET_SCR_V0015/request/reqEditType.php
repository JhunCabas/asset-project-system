<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqEditType.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์แก้ไขข้อมูลประเภทครุภัณฑ์
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
		include_once("../class/AssetType.php");
		$updateType = new AssetType();
		
		$assetTypeId = $_GET["assetTypeId"];
		$TypeName = $_GET["upTypeName"];
		
			$updateType->setAssetTypeId($assetTypeId);
			$updateType->setAssetTypeName($TypeName);
			$updateType->editAssetType();
		
		
?>
