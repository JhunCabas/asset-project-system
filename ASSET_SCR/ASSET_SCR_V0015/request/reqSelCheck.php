<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqSelAsset.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์ เรียกข้อมูลตรวจเช็คครุภัณฑ์
//** Version : 1.0
//** CoddingDate : 13/08/2556
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//

	//*************** Check Session ****************
	session_start();

	include_once("../class/User.php");
	$user = new User();
	
	if (!$user->getSession())
	{
	   header("location: ../page/main.php");
	}
	//**********************************************
	include_once("../class/Config.php");
	include_once("../class/CheckAsset.php");
	
	$checkAsset = new CheckAsset();
	$dbAsset= new config();
	
	$checkId = $_GET["checkId"];
	$checkAsset->setCheckId($checkId);
	$arr = $checkAsset->getCheckAssetById();
	$data_array = array();
	$no=0;
	
	while($res = $dbAsset->fetch_object($arr))
{
		if($res->checkStatus=="Y"){
			$stat = "ใช้งานได้";
		}
		else if($res->checkStatus=="N"){
			$stat = "ชำรุด";
		}
		else if($res->checkStatus=="D"){
			$stat = "เสื่อมสภาพ";
		}else if($res->checkStatus==null){
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
		
		
	
		$data_array[$no]['checkId'] = $res->checkId;
		$data_array[$no]['assetYear'] = $res->assetYear;
		$data_array[$no]['assetAddDate'] = $dateT;
		$data_array[$no]['yearShort'] = $years;
		$data_array[$no]['assetTypeCode'] = $res->assetTypeCode;
		$data_array[$no]['assetGroupCode'] = $res->assetGroupCode;
		$data_array[$no]['assetCode'] = $res->assetCode;
		$data_array[$no]['assetName'] = $res->assetName;
		$data_array[$no]['checkDate'] = $dateCh;
		$data_array[$no]['checkStatus'] = $stat;
		$data_array[$no]['firstName'] = $res->firstName;
		$data_array[$no]['lastName'] = $res->lastName;
		
	$no++;

}
	echo json_encode($data_array);

?>
