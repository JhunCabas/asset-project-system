<?php
	include_once("../class/Config.php");
	include_once("../class/CheckAsset.php");
	
	$checkAsset = new CheckAsset();
	$dbAsset= new config();
	
	//$editId = $_GET["id"];
	$checkId = "5";
	$checkAsset->setId($checkId);
	$arr = $checkAsset->getCheckAssetById();
	$data_array = array();
	$no=1;
	
	while($res = $dbAsset->fetch_object($arr))
{
		if($res->status = "Y"){
			$stat = "ใช้งานได้";
		}
		else if($res->status = "N"){
			$stat = "ชำรุด";
		}
		else if($res->status = "D"){
			$stat = "เสื่อมสภาพ";
		}else{
			$stat = "-";
		}
		
		$selDate = $res->assetAddDate;
		$dateM = substr($selDate,4,6);
		$text = substr($selDate,0,4);
		$year = $text+543;
		$years = substr($year,2,4);
		$dateType = $year."".$dateM;
		$datetime = DateTime::createFromFormat('Y-m-d',$dateType);
		$dateT = $datetime->format('d/m/Y');
	
		$data_array[$res->id]['id'] = $res->id;
		$data_array[$res->id]['assetYear'] = $year;
		$data_array[$res->id]['assetAddDate'] = $dateT;
		$data_array[$res->id]['yearShort'] = $years;
		$data_array[$res->id]['assetTypeCode'] = $res->assetTypeCode;
		$data_array[$res->id]['assetGroupCode'] = $res->assetGroupCode;
		$data_array[$res->id]['assetCode'] = $res->assetCode;
		$data_array[$res->id]['assetName'] = $res->assetName;
		$data_array[$res->id]['checkDate'] = $res->checkDate;
		$data_array[$res->id]['status'] = $stat;
		
	

}
	echo json_encode($data_array);
	

?>
