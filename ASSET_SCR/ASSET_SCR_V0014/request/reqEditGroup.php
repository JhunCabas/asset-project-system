<?php

		include_once("../class/AssetGroup.php");
		$updateGroup = new AssetGroup();
		
		
		$assetGroupId = $_GET["assetGroupId"];
		$groupName = $_GET["editGname"];
		

			$updateGroup->setAssetGroupId($assetGroupId);
			$updateGroup->setAssetGroupName($groupName);
			$updateGroup->editAssetGroup();
		
		
?>
