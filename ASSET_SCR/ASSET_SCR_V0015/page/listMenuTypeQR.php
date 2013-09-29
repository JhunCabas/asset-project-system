<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : listMenuTypeQR.php 
//** คำอธิบาย : ไฟล์นี้เป็น แสดง ListMenu ประเภทครุภัณฑ์ หน้า QR
//** Version : 1.0
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//

		include_once("../class/Config.php");
		include_once("../class/Asset.php");
		
		$showAsset = new Asset();
		$dbAsset= new config();
		

		$year = $_GET['assetYear'];		
		$arrType = $showAsset->getShowAssetTypeByYear($year);
?>
		<select id="assetTypeQR" onchange="changeTypeQR();">
		<option value="00">ประเภทครุภัณฑ์</option>
<?php
		while($row=$dbAsset->fetch_array($arrType)) {
			echo "<option value='".$row['assetTypeId']."'>";
			echo  $row['assetTypeCode']." ".$row['assetTypeName']."</option>";
		}
?>
		</select>
	