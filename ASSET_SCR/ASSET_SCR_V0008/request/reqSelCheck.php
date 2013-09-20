<?php
	include_once("../class/Config.php");
	include_once("../class/CheckAsset.php");
	
	$checkAsset = new CheckAsset();
	$dbAsset= new config();
	
	$checkId = $_GET["id"];
	//$checkId = "5";
	$checkAsset->setId($checkId);
	$arr = $checkAsset->getCheckAssetById();
	$data_array = array();
	$no=1;
	
	while($res = $dbAsset->fetch_object($arr))
{
		if($res->status=="Y"){
			$stat = "ใช้งานได้";
		}
		else if($res->status=="N"){
			$stat = "ชำรุด";
		}
		else if($res->status=="D"){
			$stat = "เสื่อมสภาพ";
		}else if($res->status==null){
			$stat = "-";
		}
		
		$selDate = $res->assetAddDate;
		$newYear = $res->assetYear;
		
		$dateM = substr($selDate,4,6);
		$text = substr($selDate,0,4);
		$year = $text+543;
		$years = substr($newYear,2,4);
		$dateType = $year."".$dateM;
		$datetime = DateTime::createFromFormat('Y-m-d',$dateType);
		$dateT = $datetime->format('d/m/Y');
		
		if($res->checkDate!="0000-00-00"){
			
			$chkDate = $res->checkDate;
			$mm = substr($chkDate,4,6);
			$yy = substr($chkDate,0,4);
			$rrrr = $yy+543;
			$dateTest = $rrrr."".$mm;
			$datetime1 = DateTime::createFromFormat('Y-m-d',$dateTest);
			$dateCh = $datetime1->format('d/m/Y');
		}else{
			$datetime2 = DateTime::createFromFormat('Y-m-d',$res->checkDate);
			$dateCh = $datetime2->format('d/m/Y');
			$dateCh = "ยังไม่ได้ตรวจเช็ค";
		}
		
		
	
		$data_array[$res->id]['id'] = $res->id;
		$data_array[$res->id]['assetYear'] = $res->assetYear;
		$data_array[$res->id]['assetAddDate'] = $dateT;
		$data_array[$res->id]['yearShort'] = $years;
		$data_array[$res->id]['assetTypeCode'] = $res->assetTypeCode;
		$data_array[$res->id]['assetGroupCode'] = $res->assetGroupCode;
		$data_array[$res->id]['assetCode'] = $res->assetCode;
		$data_array[$res->id]['assetName'] = $res->assetName;
		$data_array[$res->id]['checkDate'] = $dateCh;
		$data_array[$res->id]['status'] = $stat;
		
	

}
	echo json_encode($data_array);
	

?>
