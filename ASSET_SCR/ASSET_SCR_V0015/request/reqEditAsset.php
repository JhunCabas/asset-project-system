<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqEditAsset.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์แก้ไขข้อมูลครุภัณฑ์
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
		
		include_once("../class/Asset.php");
		include_once("../class/CheckAsset.php");
		$updateAsset = new Asset();
		$updateChk = new CheckAsset();
		
		
		$assetId = $_GET["assetId"];
		$upAssName =  $_GET["upAssName"];
		$upAssPrice =  $_GET["upAssPrice"];
		$upRemark =  $_GET["upRemark"];
		$upAssAddDate =  $_GET["upAddDate"];

		$dateM = substr($upAssAddDate,0,6);
		$month = substr($upAssAddDate,3,2);
		$text = substr($upAssAddDate,6,4);
		$YearD = substr($upAssAddDate,6,4);
		if($month>=10&&$month<=12){
			$YearD++;
		}
		$year = $text-543;
		$dateType = $dateM."".$year;

		$datetime = DateTime::createFromFormat('d/m/yy',$dateType);
		$dateT = $datetime->format('Y-m-d');
		
			$updateAsset->setAssetId($assetId);
			$updateAsset->setAssetName($upAssName);
			$updateAsset->setAssetPrice($upAssPrice);
			$updateAsset->setRemark($upRemark);
			$updateAsset->setAssetAddDate($dateT);
			$updateAsset->setAssetYear($YearD);
			$updateAsset->editAsset();
			
			$updateChk->setAssetId($assetId);
			$updateChk->setAssetAddDate($dateT);
			$updateChk->editCheckAsset();
		
		
?>
