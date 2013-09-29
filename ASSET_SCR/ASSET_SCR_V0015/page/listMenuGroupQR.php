<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : listMenuGroupQR.php 
//** คำอธิบาย : ไฟล์นี้เป็น แสดง ListMenu หมวดครุภัณฑ์ หน้า QR
//** Version : 1.0
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//
	include_once("../class/Config.php");
	include_once("../class/Asset.php");

	$showAsset = new Asset();
	$dbAsset= new config();
	
	$year = $_GET['assetYear'];
	$type = $_GET['assetType'];

	$arrGroup = $showAsset->getShowAssetGroupByType($year,$type);
?>
    <select id="assetGroupQR" onchange="changeGroupQR();">
    <option value="00">หมวดครุภัณฑ์</option>
<?php
	while($row=$dbAsset->fetch_array($arrGroup)) {
		echo "<option value='".$row['assetGroupId']."'>";
		echo  $row['assetTypeCode']."".$row['assetGroupCode']." ".$row['assetGroupName']."</option>";
	}
?>
 	</select>
