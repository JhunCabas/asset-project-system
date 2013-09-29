<?php

		include_once("../class/Asset.php");
		include_once("../class/CheckAsset.php");
		$updateAsset = new Asset();
		$updateChk = new CheckAsset();
		
		
		$assetId = $_GET["assetId"];
		$upAssName =  $_GET["upAssName"];
		$upAssPrice =  $_GET["upAssPrice"];
		$upRemark =  $_GET["upRemark"];
		$upAssAddDate =  $_GET["upAddDate"];
		//$upAssAddDate =  "01/10/2556";

		$dateM = substr($upAssAddDate,0,6);
		$month = substr($upAssAddDate,3,2);
		$text = substr($upAssAddDate,6,4);
		$text2 = substr($upAssAddDate,6,4);
		if($month>=10&&$month<=12){
			$text2++;
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
			$updateAsset->setAssetYear($text2);
			$updateAsset->editAsset();
			
			$updateChk->setAssetId($assetId);
			$updateChk->setAssetAddDate($dateT);
			$updateChk->editCheckAsset();
		
		
?>
