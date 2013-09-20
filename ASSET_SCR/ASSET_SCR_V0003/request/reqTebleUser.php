<?php
	
	include_once("../class/Config.php");
	include_once("../class/User.php");


	$userss = new User();
	$dbss= new config();
	
	$arr = $userss->getUser();
	$no=0;
	while($res = $dbss->fetch_object($arr))
{
		$no++;
		$data_array[$no]['id'] = $res->id;
		$data_array[$no]['username'] = $res->username;
		$data_array[$no]['firstName'] = $res->firstName;
		$data_array[$no]['lastName'] = $res->lastName;
		$data_array[$no]['position'] = $res->position;
		$data_array[$no]['status'] = $res->status;
}
	echo json_encode($data_array);
?>
