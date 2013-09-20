<?php
	include_once("../class/Config.php");
	include_once("../class/Asset.php");
	$chkAsset = new Asset();
	$dbCheck= new config();
	
	//$addGroupCode = $_GET["addGroupCode"];
	//$addTypeCode = $_GET["addTypeCode"];
	
	$addYear = $_GET["addYear"];
	$addTypeCode = $_GET["addTypeCode"];
	$addGroupCode = $_GET["addGroupCode"];
	$addAssetCode = $_GET["addAssetCode"];

		$chkAsset->setAssetYear($addYear);
		$chkAsset->setAssetTypeCode($addTypeCode);
		$chkAsset->setAssetGroupCode($addGroupCode);
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

