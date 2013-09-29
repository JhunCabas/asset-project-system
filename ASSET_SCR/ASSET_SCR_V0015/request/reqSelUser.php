<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : reqSelUser.php 
//** คำอธิบาย : ไฟล์นี้ เป็นไฟล์ เรียกข้อมูลประเภท
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
	include_once("../class/User.php");


	$editUser = new User();
	$dbss= new config();
	
	$userId = $_GET["userId"];
	$arr = $editUser->getEditUser($userId);
	$data_array = array();
	$no=0;
	$stat=0;
	while($res = $dbss->fetch_object($arr))
{
		$data_array[$no]['userId'] = $res->userId;
		$data_array[$no]['username'] = $res->username;
		$data_array[$no]['firstName'] = $res->firstName;
		$data_array[$no]['lastName'] = $res->lastName;
		$data_array[$no]['position'] = $res->position;
		if($res->userStatus=="Administrator"){
			$stat=1;
			$data_array[$no]['userStatus'] = $stat;
		}
		else if($res->userStatus=="Officer"){
			$stat=2;
			$data_array[$no]['userStatus'] = $stat;
		}
		else{
			$stat=0;
			$data_array[$no]['userStatus'] = $stat;
		}
		$no++;
	

}
	echo json_encode($data_array);
?>
