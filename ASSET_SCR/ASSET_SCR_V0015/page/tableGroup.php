<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : tableGroup.php 
//** คำอธิบาย : ไฟล์นี้  แสดงตาราง Group
//** Version : 1.0
//** CoddingDate : 12/09/2556
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//

	include_once("../class/Config.php");
	include_once("../class/AssetGroup.php");

	$assGroup = new AssetGroup();
	$db= new Config();

?>
    <table class="table table-bordered">
        <thead>
            <tr>
            	<th style="width: 5%; text-align:center">ลำดับ</th>
                <th style="width: 17%; text-align:center">รหัสประเภทครุภัณฑ์</th>
                <th style="width: 17%; text-align:center">รหัสหมวดครุภัณฑ์</th>
                <th style="width: 40%; text-align:center">ชื่อหมวดครุภัณฑ์</th>
                <th style="width: 10%; text-align:center">แก้ไข</th>
                <th style="width: 10%; text-align:center">ลบ</th>
            </tr>
        </thead>
            <tbody>
            
<?php
	
	$no=1;
	
	$typeId = $_GET["assetTypeId"];
	
	$arr = $assGroup->getAssetGroup();
	$arr2 = $assGroup->getAssetGroupByType($typeId);
	if($typeId==0){
		$cmd=$arr;
	}
	else{
		$cmd=$arr2;
	}
	while($res = $db->fetch_array($cmd))
{
		
	echo "<tr>";
	echo "<td style='text-align:center'>".$no."</td>";
	echo "<td style='text-align:center'>".$res['assetTypeCode']."</td>";
	echo "<td style='text-align:center'>".$res['assetTypeCode']."".$res['assetGroupCode']."</td>";
	echo "<td>".$res['assetGroupName']."</td>";
	echo "<td style='text-align:center'>
	<a class='button icon edit' onClick='getEditGroup(".$res['assetGroupId'].");'></a></td>";
	echo "<td style='text-align:center'>
	<a class='button icon remove danger' onClick='delGroup(".$res['assetGroupId'].");'></a></td>";
	echo "</tr>";
	
	$no++;
	
}
?>
        </tbody>
    </table>

   