<?php
	include_once("../class/Config.php");
	include_once("../class/AssetGroup.php");
	$chkGroup = new AssetGroup();
	$dbCheck= new config();
	
	$addGroupCode = $_GET["addGroupCode"];
	$addTypeId = $_GET["addTypeId"];
	
	//$addGroupCode = "02";
	//$addTypeId = 1;

		$chkGroup->setAssetGroupCode($addGroupCode);
		$chkGroup->setAssetTypeId($addTypeId);
		$arr = $chkGroup->checkAssetGroup();
		$rows = $dbCheck->num_rows($arr);
		$i=0;
		if($rows>$i){
		echo $rows;
		}
		else{ 
		echo $i;
		}
?>

