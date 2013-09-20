<?php
		include_once("../class/Config.php");
		include_once("../class/Asset.php");
		include_once("../class/CheckAsset.php");
		
		$delAsset = new Asset();
		$delChkAsset = new CheckAsset();
		$db= new Config();
		
		$delId = $_GET["id"];
		//$delId = "12";
		
		
			$delAsset->setId($delId);
			
			$arr = $delAsset->getAssetById();
			$res = $db->fetch_array($arr);

			$DelChkType = $res['assetTypeCode'];
			$DelChkGroup = $res['assetGroupCode'];
			$DelChkAsset = $res['assetCode'];
			
			$delChkAsset->setAssetTypeCode($DelChkType);
			$delChkAsset->setAssetGroupCode($DelChkGroup);
			$delChkAsset->setAssetCode($DelChkAsset);
			$delChkAsset->delCheckAsset();
			
			$delAsset->delAsset();
		
		
		
?>
