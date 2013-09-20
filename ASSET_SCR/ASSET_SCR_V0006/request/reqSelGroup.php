<?php
	include_once("../class/Config.php");
	include_once("../class/AssetGroup.php");


	$editGroup = new AssetGroup();
	$dbGroup= new config();
	
	$editId = $_GET["id"];
	//$editId = "01";
	$editGroup->setId($editId);
	$arr = $editGroup->getEditAssetGroup();
	$data_array = array();
	$no=1;
	$stat=0;
	
	while($res = $dbGroup->fetch_object($arr))
{
	
		$data_array[$res->id]['id'] = $res->id;
		$data_array[$res->id]['assetGroupCode'] = $res->assetGroupCode;
		$data_array[$res->id]['assetGroupName'] = $res->assetGroupName;
		$data_array[$res->id]['assetTypeCode'] = $res->assetTypeCode;
		
	

}
	echo json_encode($data_array);
	

?>
