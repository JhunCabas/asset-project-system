<?php
	include_once("../class/Config.php");
	include_once("../class/Asset.php");


	$genAsset = new Asset();
	$db= new config();
	
	$year = $_GET["addYear"];
	$type = $_GET["addType"];
	$group = $_GET["addGroup"];
	/*
	$editId = $_GET["id"];
	$editId = $_GET["id"];
	$editId = $_GET["id"];
	$editId = $_GET["id"];
*/
	$genAsset->setAssetYear($year);
	$genAsset->setAssetTypeCode($type);
	$genAsset->setAssetGroupCode($group);
	$arr = $genAsset->getAssetMax();
	$data_array = array();
	$no=1;
	$stat=0;
	
	$res = $db->fetch_array($arr);
	$code = $res['assetCode'];
	$genCode = str_pad($code+1, 3, "0", STR_PAD_LEFT);
	
	echo $genCode;
	
	

?>
