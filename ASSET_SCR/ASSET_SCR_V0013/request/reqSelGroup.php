<?php
	include_once("../class/Config.php");
	include_once("../class/AssetGroup.php");


	$editGroup = new AssetGroup();
	$dbGroup= new config();
	
	$editId = $_GET["assetGroupId"];
	//$editId = "1";
	$editGroup->setAssetGroupId($editId);
	$arr = $editGroup->getEditAssetGroup();
	$data_array = array();
	$no=1;
	$stat=0;
	
	while($res = $dbGroup->fetch_object($arr))
{
	
		$data_array[$no]['assetGroupId'] = $res->assetGroupId;
		$data_array[$no]['assetGroupCode'] = $res->assetGroupCode;
		$data_array[$no]['assetGroupName'] = $res->assetGroupName;
		$data_array[$no]['assetTypeCode'] = $res->assetTypeCode;
		$no++;
	

}
	echo json_encode($data_array);
	

?>
