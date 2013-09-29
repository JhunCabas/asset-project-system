<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : listMenuYearCheck.php 
//** คำอธิบาย : ไฟล์นี้เป็น แสดง ListMenu ประเภทครุภัณฑ์ หน้า QR
//** Version : 1.0
//** CoddingDate : 02/09/2556
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//

		include_once("../class/Config.php");
		include_once("../class/Asset.php");
		
		$showAsset = new Asset();
		$dbAsset= new config();
	
		$arrYear = $showAsset->getShowAssetYear();
?>
		<select id="assetYearQR" onchange="changeYearQR();">
		<option value="0000">ประจำปี</option>
<?php
		while($row=$dbAsset->fetch_array($arrYear)) {
			$selDate = $row['years'];
			echo "<option value='".$row['assetYear']."'>";
			echo  $row['assetYear']."</option>";
		}
?>
		</select>
	