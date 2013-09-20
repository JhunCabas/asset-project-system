<?php

		
		include_once("../class/AssetGroup.php");
		$addGroup = new AssetGroup();
		
		$addGcode = $_GET["addGroupCode"];
		$addGname = $_GET["addGroupName"];
		$addTcode = $_GET["addTypeCode"];
		
		$addGroup->setValues($addGcode,$addGname,$addTcode);
		$addGroup->addAssetGroup();
		
		
?>
