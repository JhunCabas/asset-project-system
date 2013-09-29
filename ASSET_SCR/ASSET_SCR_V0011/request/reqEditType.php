<?php

		include_once("../class/AssetType.php");
		$updateType = new AssetType();
		
		$id = $_GET["id"];
		$TypeName = $_GET["upTypeName"];
		
			$updateType->setId($id);
			$updateType->setValues(null,$TypeName);
			$updateType->editAssetType();
		
		
?>
