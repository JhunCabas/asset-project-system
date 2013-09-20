<?php
	include_once("../class/Config.php");
	include_once("../class/User.php");


	$editUser = new User();
	$dbss= new config();
	
	$editId = $_GET["id"];
	$arr = $editUser->getEditUser($editId);
	$data_array = array();
	$no=1;
	$stat=0;
	while($res = $dbss->fetch_object($arr))
{
		$data_array[$res->id]['id'] = $res->id;
		$data_array[$res->id]['username'] = $res->username;
		$data_array[$res->id]['firstName'] = $res->firstName;
		$data_array[$res->id]['lastName'] = $res->lastName;
		$data_array[$res->id]['position'] = $res->position;
		if($res->status=="Administrator"){
			$stat=1;
			$data_array[$res->id]['status'] = $stat;
		}
		else if($res->status=="Officer"){
			$stat=2;
			$data_array[$res->id]['status'] = $stat;
		}
		else{
			$stat=0;
			$data_array[$res->id]['status'] = $stat;
		}
		//$data_array[$res->id]['status'] = $res->status;
	

}
	echo json_encode($data_array);
?>
