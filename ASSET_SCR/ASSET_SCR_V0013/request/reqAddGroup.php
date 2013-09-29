<?php

		
		include_once("../class/AssetGroup.php");
		$addGroup = new AssetGroup();
		
		$addGcode = $_GET["addGroupCode"];
		$addGname = $_GET["addGroupName"];
		$addTypeId = $_GET["addTypeId"];
		
		$addGroup->setValues($addGcode,$addGname,$addTypeId);
		$addGroup->addAssetGroup();
		
		
?>
