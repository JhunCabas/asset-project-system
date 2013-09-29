<?php
	include_once("../class/Config.php");
	include_once("../class/AssetType.php");


	$editType = new AssetType();
	$dbType= new config();
	
	$editId = $_GET["id"];
	//$editId = "14";
	$editType->setId($editId);
	$arr = $editType->getEditAssetType();
	$data_array = array();
	$no=1;
	$stat=0;
	
	while($res = $dbType->fetch_object($arr))
{
	/*
		$selDate = $res->assetTypeAddDate;
		
		$dateM = substr($selDate,4,6);
		$text = substr($selDate,0,4);
		$year = $text+543;
		$dateType = $year."".$dateM;
		
		$datetime = DateTime::createFromFormat('Y-m-d',$dateType);
		$dateT = $datetime->format('d/m/Y');
		*/
		
		$data_array[$res->id]['id'] = $res->id;
		$data_array[$res->id]['assetTypeCode'] = $res->assetTypeCode;
		$data_array[$res->id]['assetTypeName'] = $res->assetTypeName;
	

}
	echo json_encode($data_array);
	

?>
