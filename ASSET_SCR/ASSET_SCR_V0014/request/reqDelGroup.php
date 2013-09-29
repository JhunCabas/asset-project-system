<?php

		include_once("../class/AssetGroup.php");
		$delGroup = new AssetGroup();
		
		$delId = $_GET["assetGroupid"];
		
			$delGroup->setAssetGroupId($delId);
			$delGroup->delAssetGroup();
		
		
		
?>
