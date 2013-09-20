<?php
	//เลือก Json ออกมาในรูปแบบ PHP

	include 'config.php';
	
	$query = mysql_query('SELECT id,assetId,assetName,assetTypeId,assetGroup,IF(assetStatus="L","สูญหาย","ไม่") AS assetStatus FROM asset ORDER BY id ASC')or die(mysql_error());
	//$arr = mysql_fetch_object($query)or die(mysql_error());
	
	$data_array = array();
	
	while($arr = mysql_fetch_object($query))
	{
		//$arr->id
		//$arr->name
		//$arr->lastname
		
		//$data_array[$arr->id] = $arr;
		$data_array[$arr->id]['id'] = $arr->id;
		$data_array[$arr->id]['assetId'] = $arr->assetId;
		$data_array[$arr->id]['assetName'] = $arr->assetName;
		$data_array[$arr->id]['assetTypeId'] = $arr->assetTypeId;
		$data_array[$arr->id]['assetGroup'] = $arr->assetGroup;
		$data_array[$arr->id]['assetStatus'] = $arr->assetStatus;
	}
	
	echo json_encode($data_array);
	
	/*
	print_r($arr)or die(mysql_error());
	var_dump($arr)or die(mysql_error());
	*/
	/*
	mysql_fetch_arry $arr[0] $arr[1], $arr[name] $arr[lastname]
	mysql_fetch_row $arr[0] $arr[1]
	mysql_fetch_assoc $arr[name] $arr[lastname]
	mysql_fetch_object $arr->name,$arr->lastname
	*/
	
?>