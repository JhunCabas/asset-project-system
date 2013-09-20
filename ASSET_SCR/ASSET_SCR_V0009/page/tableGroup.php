<?php
	
	include_once("../class/Config.php");
	include_once("../class/AssetGroup.php");


	$assGroup = new AssetGroup();
	$db= new config();

?>
    <table class="table table-bordered">
        <thead>
            <tr>
            	<th style="width: 5%; text-align:center">ลำดับ</th>
                <th style="width: 28%; text-align:center">รหัสประเภทครุภัณฑ์</th>
                <th style="width: 28%; text-align:center">รหัสหมวดครุภัณฑ์</th>
                <th style="width: 28%; text-align:center">ชื่อหมวดครุภัณฑ์</th>
                <th style="width: 10%; text-align:center">แก้ไข</th>
                <th style="width: 10%; text-align:center">ลบ</th>
            </tr>
        </thead>
            <tbody>
            
<?php
	
	$no=1;
	
	$typeCode = $_GET["id"];
	//$typeCode = $_GET["id"];
	
	$arr = $assGroup->getAssetGroup();
	$arr2 = $assGroup->getAssetGroupByType($typeCode);
	if($typeCode=="00"){
		$cmd=$arr;
	}
	else{
		$cmd=$arr2;
	}
	
	while($res = $db->fetch_array($cmd))
{
		
	echo "<tr>";
	echo "<td id='Uid".$no."' style='text-align:center'>".$no."</td>";
	echo "<td id='Ulname".$no."' style='text-align:center'>".$res['assetTypeCode']."</td>";
	echo "<td id='Uuname".$no."' style='text-align:center'>".$res['assetTypeCode']."".$res['assetGroupCode']."</td>";
	echo "<td id='Ufname".$no."'>".$res['assetGroupName']."</td>";
	echo "<td id='Uedit".$no."' style='text-align:center'><a class='button icon edit' onClick='getEditGroup(".$res['id'].");'></a></td>";
	echo "<td id='Udel".$no."' style='text-align:center'><a class='button icon remove danger' onClick='delGroup(".$res['id'].");'></a></td>";
	echo "</tr>";
	
	$no++;
	
}
?>
        </tbody>
    </table>

   
