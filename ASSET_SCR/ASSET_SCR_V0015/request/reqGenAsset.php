<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqGenAsset.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์ Generate เลขครุภัณฑ์
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


	$genAsset = new Asset();
	$db= new config();
	
	$year = $_GET["addYear"];
	$type = $_GET["addType"];
	$group = $_GET["addGroup"];
	
	$genAsset->setAssetYear($year);
	$arr = $genAsset->getAssetMax($type,$group);
	$data_array = array();
	$no=1;
	$stat=0;
	
	$res = $db->fetch_array($arr);
	$code = $res['assetCode'];
	$genCode = str_pad($code+1, 3, "0", STR_PAD_LEFT);
	
	echo $res['assetTypeCode']."-".$res['assetTypeCode']."".$res['assetGroupCode']."-".$genCode;
	
	

?>
