<?php

		include_once("../class/AssetType.php");
		$updateType = new AssetType();
		
		$assetTypeId = $_GET["assetTypeId"];
		$TypeName = $_GET["upTypeName"];
		
			$updateType->setAssetTypeId($assetTypeId);
			$updateType->setAssetTypeName($TypeName);
			$updateType->editAssetType();
		
		
?>
