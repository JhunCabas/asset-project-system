<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqSelAsset.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์ เรียกข้อมูลเลขครุภัณฑ์
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
	include_once("../class/Asset.php");
	
	$editAsset = new Asset();
	$dbAsset= new config();
	
	$editId = $_GET["assetId"];
	
	$editAsset->setAssetId($editId);
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
	
		$data_array[$res->assetId]['assetId'] = $res->assetId;
		$data_array[$res->assetId]['assetCode'] = $res->assetCode;
		$data_array[$res->assetId]['assetName'] = $res->assetName;
		$data_array[$res->assetId]['assetPrice'] = $res->assetPrice;
		$data_array[$res->assetId]['assetYear'] = $year;
		$data_array[$res->assetId]['assetTypeCode'] = $res->assetTypeCode;
		$data_array[$res->assetId]['assetGroupCode'] = $res->assetGroupCode;
		$data_array[$res->assetId]['assetAddDate'] = $dateT;
		$data_array[$res->assetId]['remark'] = $res->remark;
		$data_array[$res->assetId]['firstName'] = $res->firstName;
		$data_array[$res->assetId]['lastName'] = $res->lastName;
		
	

}
	echo json_encode($data_array);
	

?>