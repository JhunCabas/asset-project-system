<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : tableType.php 
//** คำอธิบาย : ไฟล์นี้  แสดงตาราง Type
//** Version : 1.0
//** CoddingDate : 12/09/2556
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//

	include_once("../class/Config.php");
	include_once("../class/AssetType.php");


	$assType = new AssetType();
	$db= new config();

?>
    <table class="table table-bordered">
        <thead>
            <tr>
            	<th style="width: 5%; text-align:center">ลำดับ</th>
                <th style="width: 20%; text-align:center">รหัสประเภทครุภัณฑ์</th>
                <th style="width: 55%; text-align:center">ชื่อประเภทครุภัณฑ์</th>
                <th style="width: 10%; text-align:center">แก้ไข</th>
                <th style="width: 10%; text-align:center">ลบ</th>
            </tr>
        </thead>
            <tbody>
            
<?php
	$searchName = $_GET["searchName"];
	$arr = $assType->getAssetSearch($searchName);
	$no=1;
	while($res = $db->fetch_array($arr))
{
	
	echo "<tr>";
	echo "<td id='Uid".$no."' style='text-align:center'>".$no."</td>";
	echo "<td id='Uuname".$no."' style='text-align:center'>".$res['assetTypeCode']."</td>";
	echo "<td id='Ufname".$no."'>".$res['assetTypeName']."</td>";
	echo "<td id='Uedit".$no."' style='text-align:center'>
	<a class='button icon edit' onClick='getEditType(".$res['assetTypeId'].");'></a></td>";
	echo "<td id='Udel".$no."' style='text-align:center'>
	<a class='button icon remove danger' onClick='delType(".$res['assetTypeId'].");'></a></td>";
	echo "</tr>";
	
	$no++;
	
}
?>
        </tbody>
    </table>

   
