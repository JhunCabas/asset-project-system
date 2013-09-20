<?php

	include_once("../class/Config.php");
	include_once("../class/Asset.php");
	
	$editAsset = new Asset();
	$dbAsset= new config();
	
	$editId = $_GET["id"];
	//$editId = "9";
	$editAsset->setId($editId);
	$arr = $editAsset->getEditAsset();
	$data_array = array();
	$no=1;
	$stat=0;
	
	while($res = $dbAsset->fetch_object($arr))
{
		$selDate = $res->assetAddDate;
		
		$dateM = substr($selDate,4,6);
		$text = substr($selDate,0,4);
		$year = $text+543;
		$dateType = $year."".$dateM;
		
		$datetime = DateTime::createFromFormat('Y-m-d',$dateType);
		$dateT = $datetime->format('d/m/Y');
	
		$data_array[$res->id]['id'] = $res->id;
		$data_array[$res->id]['assetCode'] = $res->assetCode;
		$data_array[$res->id]['assetName'] = $res->assetName;
		$data_array[$res->id]['assetPrice'] = $res->assetPrice;
		$data_array[$res->id]['assetYear'] = $year;
		$data_array[$res->id]['assetTypeCode'] = $res->assetTypeCode;
		$data_array[$res->id]['assetGroupCode'] = $res->assetGroupCode;
		$data_array[$res->id]['assetAddDate'] = $dateT;
		$data_array[$res->id]['remark'] = $res->remark;
		
	

}
	echo json_encode($data_array);
	

?>
