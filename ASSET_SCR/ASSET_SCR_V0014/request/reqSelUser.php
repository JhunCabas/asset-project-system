<?php
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
