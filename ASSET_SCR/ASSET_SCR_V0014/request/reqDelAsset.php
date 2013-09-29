<?php
		include_once("../class/Config.php");
		include_once("../class/Asset.php");
		include_once("../class/CheckAsset.php");
		
		$delAsset = new Asset();
		$delChkAsset = new CheckAsset();
		$db= new Config();
		
		$delId = $_GET["assetId"];
		//$delId = "12";
		
		
			$delAsset->setAssetId($delId);
			
			$arr = $delAsset->getAssetById();
			$res = $db->fetch_array($arr);

			$DelChkType = $res['assetTypeId'];
			$DelChkGroup = $res['assetGroupId'];
			$DelChkAsset = $res['assetId'];
			
			$delChkAsset->setAssetTypeId($DelChkType);
			$delChkAsset->setAssetGroupId($DelChkGroup);
			$delChkAsset->setAssetId($DelChkAsset);
			$delChkAsset->delCheckAsset();
			
			$delAsset->delAsset();
		
		
		
?>
