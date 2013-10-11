<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : listMenuGroup.php 
//** คำอธิบาย : ไฟล์นี้เป็น แสดง ListMenu หมวดครุภัณฑ์
//** Version : 1.0
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//

	include_once("../class/Config.php");
	include_once("../class/AssetGroup.php");

	$showGroup = new AssetGroup();
	$dbGroup= new config();

	$searchType = $_GET["assetTypeCode"];
	echo $searchType;
	$arr = $showGroup->getAssetGroupByType($searchType);
?>
    <select id="assetGroup" onchange="changeGroupCode();">
    <option value="00">หมวดครุภัณฑ์</option>
<?php
	while($rowG=$dbGroup->fetch_array($arr)) {
		echo "<option value='".$rowG['assetGroupId']."'>";
		echo $rowG['assetTypeCode']."".$rowG['assetGroupCode']." ".$rowG['assetGroupName']."</option>";
}
?>
 	</select>
