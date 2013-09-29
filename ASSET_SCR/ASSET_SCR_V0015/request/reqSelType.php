<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqSelType.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์ เรียกข้อมูลประเภทครุภัณฑ์
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
