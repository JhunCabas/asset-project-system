<?php
	include_once("../class/Config.php");
	include_once("../class/AssetType.php");


	$editType = new AssetType();
	$dbType= new config();
	
	$assetTypeId = $_GET["assetTypeId"];
	$editType->setAssetTypeId($assetTypeId);
	$arr = $editType->getEditAssetType();
	$data_array = array();
	$no=0;
	$stat=0;
	
	while($res = $dbType->fetch_object($arr))
{
		
		$data_array[$no]['assetTypeId'] = $res->assetTypeId;
		$data_array[$no]['assetTypeCode'] = $res->assetTypeCode;
		$data_array[$no]['assetTypeName'] = $res->assetTypeName;
		$no++;

}
	echo json_encode($data_array);
	

?>
