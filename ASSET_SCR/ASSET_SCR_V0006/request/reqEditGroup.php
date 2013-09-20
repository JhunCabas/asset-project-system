<?php

		include_once("../class/AssetGroup.php");
		$updateGroup = new AssetGroup();
		
		
		$id = $_GET["id"];
		$groupName = $_GET["editGname"];
		

			$updateGroup->setId($id);
			$updateGroup->setValues(null,$groupName,null);
			$updateGroup->editAssetGroup();
		
		
?>
