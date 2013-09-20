<?php

		include_once("../class/AssetType.php");
		$delType = new AssetType();
		
		$delId = $_GET["id"];
		
			$delType->setId($delId);
			$delType->delAssetType();
		
		
		
?>
