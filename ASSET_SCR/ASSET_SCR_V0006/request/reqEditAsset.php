<?php

		include_once("../class/Asset.php");
		$updateAsset = new Asset();
		
		
		$id = $_GET["id"];
		$upAssName =  $_GET["upAssName"];
		$upAssPrice =  $_GET["upAssPrice"];
		$upRemark =  $_GET["upRemark"];
		$upAssAddDate =  $_GET["upAddDate"];


		$dateM = substr($upAssAddDate,0,6);
		$text = substr($upAssAddDate,6,4);
		$year = $text-543;
		$dateType = $dateM."".$year;

		$datetime = DateTime::createFromFormat('d/m/yy',$dateType);
		$dateT = $datetime->format('Y-m-d');
		
			$updateAsset->setId($id);
			$updateAsset->setAssetName($upAssName);
			$updateAsset->setAssetPrice($upAssPrice);
			$updateAsset->setRemark($upRemark);
			$updateAsset->setAssetAddDate($dateT);
			$updateAsset->editAsset();
		
		
?>
