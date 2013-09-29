<?php
	include_once("../class/Config.php");
	include_once("../class/Asset.php");
	$chkAsset = new Asset();
	$dbCheck= new config();

	
	$addTypeId = $_GET["assetTypeId"];
	$addGroupId = $_GET["assetGroupId"];
	$addAssetCode = $_GET["assetCode"];
	

		$chkAsset->setAssetTypeId($addTypeId);
		$chkAsset->setAssetGroupId($addGroupId);
		$chkAsset->setAssetCode($addAssetCode);
		$arr = $chkAsset->checkAsset();
		$rows = $dbCheck->num_rows($arr);
		$i=0;
		if($rows>$i){
		echo $rows;
		}
		else{ 
		echo $i;
		}
?>

