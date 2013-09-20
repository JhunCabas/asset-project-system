<?php
	include_once("../class/Config.php");
	include_once("../class/Asset.php");
	
	$searchAsset = new Asset();
	$dbAsset= new config();
	
	//$term = trim($_GET['term']);
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
