<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqAddAsset.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไล์เพิ่มข้อมูลครุภัณฑ์
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
		include_once("../class/CheckAsset.php");
		$addAsset = new Asset();
		$addCheck = new CheckAsset();
		$db = new Config();
		
		
		$assetTypeId = $_GET["addType"];
		$assetGroupId = $_GET["addGroup"];
		$assetCode = $_GET["addAsset"];
		$assetName = $_GET["addAssName"];
		$assetNum = $_GET["addAssNum"];
		$assetPrice = $_GET["addPrice"];
		$assetAddDate = $_GET["addAddDate"];
		$remark = $_GET["addRemark"];
		$assetLocation = "วิทยาลัยแม่ฮ่องสอน";
		$userId = $_SESSION["id"];
		
		$dateM = substr($assetAddDate,0,6);
		$day = substr($assetAddDate,0,2);
		$month = substr($assetAddDate,3,2);
		$text = substr($assetAddDate,6,4);
		$yearD = substr($assetAddDate,6,4);
		
		if($month>=10&&$month<=12){
			$yearD++;
		}
		
		$assYear = $yearD+543;
		$year = $text-543;
		$dateType = $dateM."".$year;

		$datetime = DateTime::createFromFormat('d/m/yy',$dateType);
		$dateT = $datetime->format('Y-m-d');
		
		if($assetNum==""){
			$addAsset->setValues($assetCode,$assetName,$assetPrice,$assetTypeId,
			$assetGroupId,$yearD,$assetLocation,$dateT,$remark,$userId);
			$addAsset->addAsset();
			
			$arr = $addAsset->getAssetIdToCheck($assetTypeId,$assetGroupId,$assetCode);
			$result = $db->fetch_array($arr);
			
			$addCheck->setAssetTypeId($assetTypeId);
			$addCheck->setAssetGroupId($assetGroupId);
			$addCheck->setAssetId($result['assetId']);
			$addCheck->setAssetYear($yearD);
			$addCheck->setAssetAddDate($dateT);
			$addCheck->setUserId($userId);
			$addCheck->addCheckAsset();
		}
		else if($assetNum>1){
			$i=1;
			$gens = $assetCode;
			$gen = $gens-1;	
			while($i<=$assetNum){
				$genCode = str_pad($gen+1, 3, "0", STR_PAD_LEFT);
				
				$addAsset->setValues($genCode,$assetName,$assetPrice,$assetTypeId,
				$assetGroupId,$yearD,$assetLocation,$dateT,$remark,$userId);
				$addAsset->addAsset();
				
				$arr = $addAsset->getAssetIdToCheck($assetTypeId,$assetGroupId,$genCode);
				$result = $db->fetch_array($arr);
				
				$addCheck->setAssetTypeId($assetTypeId);
				$addCheck->setAssetGroupId($assetGroupId);
				$addCheck->setAssetId($result['assetId']);
				$addCheck->setAssetYear($yearD);
				$addCheck->setAssetAddDate($dateT);
				$addCheck->setUserId($userId);
				$addCheck->addCheckAsset();
				$gen++;
				$i++;
			}
		
		}
		else{
				$addAsset->setValues($assetCode,$assetName,$assetPrice,$assetTypeId,
				$assetGroupId,$yearD,$assetLocation,$dateT,$remark,$userId);
				$addAsset->addAsset();
				
				$arr = $addAsset->getAssetIdToCheck($assetTypeId,$assetGroupId,$assetCode);
				$result = $db->fetch_array($arr);
				
				$addCheck->setAssetTypeId($assetTypeId);
				$addCheck->setAssetGroupId($assetGroupId);
				$addCheck->setAssetId($result['assetId']);
				$addCheck->setAssetYear($yearD);
				$addCheck->setAssetAddDate($dateT);
				$addCheck->setUserId($userId);
				$addCheck->addCheckAsset();
		}
		
		
		
?>
