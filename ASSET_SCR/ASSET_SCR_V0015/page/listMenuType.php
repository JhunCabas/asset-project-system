<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : listMenuType.php 
//** คำอธิบาย : ไฟล์นี้เป็น แสดง ListMenu ประเภทครุภัณฑ์
//** Version : 1.0
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//

	include_once("../class/Config.php");
	include_once("../class/AssetType.php");
	
	$showType = new AssetType();
	$dbType= new config();

	$arr = $showType->getAssetType();
?>
	ค้นหาตามประเภทครุภัณฑ์ : 
	<select id="assetType" onchange="changeTypeCode();">
	<option value="00">ประเภทครุภัณฑ์</option>
<?php
	while($row=$dbType->fetch_array($arr)) {
		echo "<option value='".$row['assetTypeId']."'>";
		echo $row['assetTypeCode']." ".$row['assetTypeName']."</option>";
	}
?>
	 </select>
   