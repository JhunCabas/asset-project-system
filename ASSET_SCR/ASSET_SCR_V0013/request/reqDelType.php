<?php

		include_once("../class/AssetType.php");
		$delType = new AssetType();
		
		$delId = $_GET["assetTypeId"];
		
			$delType->setAssetTypeId($delId);
			$delType->delAssetType();
		
		
		
?>
