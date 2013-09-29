<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqSelSearchType.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์ เรียกข้อมูลค้นหาประเภทครุภัณฑ์
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
	
	$searchAsset = new Asset();
	$dbAsset= new config();

	$term = $_GET['term'];
	$arr = $searchAsset->getSearchAsset($term);
	$data_array = array();
	$no=1;
	
	while($res = $dbAsset->fetch_object($arr))
{
		$data_array[$no]['assetCodes'] = $res->assetCodes;
		$no++;
}
	echo json_encode($data_array);
	

?>
