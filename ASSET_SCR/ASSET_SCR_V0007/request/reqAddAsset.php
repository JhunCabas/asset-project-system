<?php

		
		include_once("../class/Asset.php");
		include_once("../class/CheckAsset.php");
		$addAsset = new Asset();
		$addCheck = new CheckAsset();
		
		/*
		$addYear = $_GET["addYear"];
		$addType = $_GET["addType"];
		$addGroup = $_GET["addGroup"];
		$addAsset = $_GET["addAsset"];
		$addAssName = $_GET["addAssName"];
		$addPrice = $_GET["addPrice"];
		$addAddDate = $_GET["addAddDate"];
		$addRemark = $_GET["addRemark"];
		*/
		
		//$assetYear = $_GET["addYear"];
		$assetTypeCode = $_GET["addType"];
		$assetGroupCode = $_GET["addGroup"];
		$assetCode = $_GET["addAsset"];
		$assetName = $_GET["addAssName"];
		$assetPrice = $_GET["addPrice"];
		//$assetAddDate = "01/10/2556";
		$assetAddDate = $_GET["addAddDate"];
		$remark = $_GET["addRemark"];
		$assetLocation = "วิทยาลัยแม่ฮ่องสอน";
		
		$dateM = substr($assetAddDate,0,6);
		$day = substr($assetAddDate,0,2);
		$month = substr($assetAddDate,3,2);
		$text = substr($assetAddDate,6,4);
		$text2 = substr($assetAddDate,6,4);
		//echo $day."-".$month."--".$text;
		if($month>=10&&$month<=12){
			$text2++;
		}
		$assYear = $text2+543;
		$year = $text-543;
		$dateType = $dateM."".$year;

		$datetime = DateTime::createFromFormat('d/m/yy',$dateType);
		$dateT = $datetime->format('Y-m-d');
		
		//echo $dateT."---".$text.":".$assetPrice;
		
		$addAsset->setValues($assetCode,$assetName,$assetPrice,$assetTypeCode,$assetGroupCode,$text2,$assetLocation,$dateT,$remark);
		$addAsset->addAsset();
		
		$addCheck->setAssetTypeCode($assetTypeCode);
		$addCheck->setAssetGroupCode($assetGroupCode);
		$addCheck->setAssetCode($assetCode);
		$addCheck->setAssetAddDate($dateT);
		$addCheck->setAssetYear($text2);
		//$addCheck->setAssetId();
		$addCheck->addCheckAsset();
		
		
?>
