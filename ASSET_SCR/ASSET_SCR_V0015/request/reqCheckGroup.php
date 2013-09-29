<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqCheckGroup.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์เช็คค่าซ้ำ
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
	
	include_once("../class/Config.php");
	include_once("../class/AssetGroup.php");
	$chkGroup = new AssetGroup();
	$dbCheck= new config();
	
	$addGroupCode = $_GET["addGroupCode"];
	$addTypeId = $_GET["addTypeId"];

		$chkGroup->setAssetGroupCode($addGroupCode);
		$chkGroup->setAssetTypeId($addTypeId);
		$arr = $chkGroup->checkAssetGroup();
		$rows = $dbCheck->num_rows($arr);
		$i=0;
		if($rows>$i){
			echo $rows;
		}
		else{ 
			echo $i;
		}
?>

