<?php

		include_once("../class/AssetType.php");
		$updateType = new AssetType();
		
		
	/*
		$id = $_GET["id"];
		$upTypeName = $_GET["upFname"];
		$ypTypeDate = $_GET["upLname"];
		*/
		
		$id = $_GET["id"];
		$TypeName = $_GET["upTypeName"];
		/*
		$dateM = substr($TypeDate,0,6);
		$text = substr($TypeDate,6,4);
		$year = $text-543;
		$dateType = $dateM."".$year;

		$datetime = DateTime::createFromFormat('d/m/yy',$dateType);
		$dateT = $datetime->format('Y-m-d');
		
*/
			$updateType->setId($id);
			$updateType->setValues(null,$TypeName);
			$updateType->editAssetType();
		
		
?>
