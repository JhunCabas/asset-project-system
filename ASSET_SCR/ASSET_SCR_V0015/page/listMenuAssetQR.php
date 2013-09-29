<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : listMenuAssetQR.php 
//** คำอธิบาย : ไฟล์นี้เป็น แสดง ListMenu ครุภัณฑ์ หน้า QR
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
	$group = $_GET['assetGroup'];

	$arrAsset= $showAsset->getShowAssetByGroup($year,$type,$group);
	$arrAsset2= $showAsset->getShowAssetByGroup($year,$type,$group);
?>
	ตั้งแต่ : <select id="assetQRStart" onchange="">
<?php
	while($row=$dbAsset->fetch_array($arrAsset)) {
		echo "<option value='".$row['assetCode']."'>";
		echo  $row['assetCode']."</option>";
}
?>
 	</select>
 	ถึง : <select id="assetQREnd" onchange="">
<?php
	while($rows=$dbAsset->fetch_array($arrAsset2)) {
		echo "<option value='".$rows['assetCode']."'>";
		echo  $rows['assetCode']."</option>";
}
?>
 	</select>
&nbsp;&nbsp;
<?php
	echo "<a class='button big icon log' onClick='printQR();'>พิมพ์ QR CODE</a>"
?>