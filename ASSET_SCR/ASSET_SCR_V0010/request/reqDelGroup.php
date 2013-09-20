<?php

		include_once("../class/AssetGroup.php");
		$delGroup = new AssetGroup();
		
		$delId = $_GET["id"];
		
			$delGroup->setId($delId);
			$delGroup->delAssetGroup();
		
		
		
?>
