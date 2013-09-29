<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqDelAsset.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์ลบข้อมูลครุภัณฑ์
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
		include_once("../class/Asset.php");
		include_once("../class/CheckAsset.php");
		
		$delAsset = new Asset();
		$delChkAsset = new CheckAsset();
		$db= new Config();
		
		$delId = $_GET["assetId"];
		$delAsset->setAssetId($delId);
		
		$arr = $delAsset->getAssetById();
		$res = $db->fetch_array($arr);

		$DelChkType = $res['assetTypeId'];
		$DelChkGroup = $res['assetGroupId'];
		$DelChkAsset = $res['assetId'];
		
		$delChkAsset->setAssetTypeId($DelChkType);
		$delChkAsset->setAssetGroupId($DelChkGroup);
		$delChkAsset->setAssetId($DelChkAsset);
		$delChkAsset->delCheckAsset();
		
		$delAsset->delAsset();
		
		
		
?>
