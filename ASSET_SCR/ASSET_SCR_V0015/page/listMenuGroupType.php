<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : listMenuGroupType.php 
//** คำอธิบาย : ไฟล์นี้เป็น แสดง ListMenu ประเภทครุภัณฑ์ หน้า จัดการหมวด
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
	<select id="assetTypeG" onchange="changeGroupType();">
	<option value="00">ประเภทครุภัณฑ์</option>
<?php
	while($rowT=$dbType->fetch_array($arr)) {
		echo "<option value='".$rowT['assetTypeCode']."'>";
		echo $rowT['assetTypeCode']." ".$rowT['assetTypeName']."</option>";
	}
?>
	 </select>