<?php

		
		include_once("../class/AssetType.php");
		$addType = new AssetType();
		
		$addTcode = $_GET["addTypeCode"];
		$addTname = $_GET["addTypeName"];
		$addTdate = $_GET["addTypeAddDate"];
		
		$dateM = substr($addTdate,0,6);
		$text = substr($addTdate,6,4);
		$year = $text-543;
		$dateType = $dateM."".$year;

		$datetime = DateTime::createFromFormat('d/m/yy',$dateType);
		$dateT = $datetime->format('Y-m-d');
		
		
		$addType->setValues($addTcode,$addTname,$dateT);
		$addType->addAssetType();
		
		
?>
