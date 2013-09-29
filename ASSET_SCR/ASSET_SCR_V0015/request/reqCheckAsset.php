<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqCheckAsset.php 
//** คำอธิบาย : ไฟล์นี้ เป็นการเช็คค่าซ้ำ
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
	include_once("../class/Asset.php");
	$chkAsset = new Asset();
	$dbCheck= new config();

	
	$addTypeId = $_GET["assetTypeId"];
	$addGroupId = $_GET["assetGroupId"];
	$addAssetAddDate = $_GET["assetAddDate"];
	$addAssetCode = $_GET["assetCode"];
	
		$dateM = substr($addAssetAddDate,0,6);
		$day = substr($addAssetAddDate,0,2);
		$month = substr($addAssetAddDate,3,2);
		$text = substr($addAssetAddDate,6,4);
		$text2 = substr($addAssetAddDate,6,4);
		if($month>=10&&$month<=12){
			$text2++;
		}
		
		$chkAsset->setAssetTypeId($addTypeId);
		$chkAsset->setAssetGroupId($addGroupId);
		$chkAsset->setAssetCode($addAssetCode);
		$chkAsset->setAssetYear($text2);
		$arr = $chkAsset->checkAsset();
		$rows = $dbCheck->num_rows($arr);
		$i=0;
		if($rows>$i){
		echo $rows;
		}
		else{ 
		echo $i;
		}
?>

