<?php
	include_once("../class/Config.php");
	include_once("../class/AssetGroup.php");
	$chkGroup = new AssetGroup();
	$dbCheck= new config();
	
	$addGroupCode = $_GET["addGroupCode"];
	$addTypeCode = $_GET["addTypeCode"];
	
	//$addGroupCode = "01";
	//$addTypeCode = "02";

		$chkGroup->setAssetGroupCode($addGroupCode);
		$chkGroup->setAssetTypeCode($addTypeCode);
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

