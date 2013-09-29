<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ addListMenuType.php 
//** คำอธิบาย : ไฟล์นี้เป็น แสดง ListMenu ของประเภท
//** Version : 1.0
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//

	include_once("../class/Config.php");
	include_once("../class/AssetType.php");

	$showType = new AssetType();
	$dbType= new config();
	
	$arr = $showType->getAssetType();

?>*
    <select id="addAssetType" onchange="changeType();">
    <option value="00">ประเภทครุภัณฑ์</option>
<?php
	while($row=$dbType->fetch_array($arr)) {
		echo "<option value='".$row['assetTypeId']."'>";
		echo $row['assetTypeCode']." ".$row['assetTypeName']."</option>";
	}
 ?>
 	</select>
