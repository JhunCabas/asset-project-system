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
		include_once("../class/CheckAsset.php");
		
		$showYear = new CheckAsset();
		$dbAsset= new config();

		$arr = $showYear->getShowAssetYear();
?>
		<select id="assetYearCheck" onchange="changeYearCheck();">
		<option value="0000">ประจำปี</option>
<?php
		while($row=$dbAsset->fetch_array($arr)) {
		$selDate = $row['assetYear'];
			echo "<option value='".$selDate."'>";
			echo $selDate."</option>";
		}
?>
		</select>
	   