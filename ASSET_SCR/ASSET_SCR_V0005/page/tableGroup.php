<?php
	
	include_once("../class/Config.php");
	include_once("../class/AssetType.php");


	$assType = new AssetType();
	$db= new config();

?>
    <table class="table table-bordered">
        <thead>
            <tr>
            	<th style="width: 5%; text-align:center">ลำดับ</th>
                <th style="width: 28%; text-align:center">รหัสประเภทครุภัณฑ์</th>
                <th style="width: 28%; text-align:center">ชื่อประเภทครุภัณฑ์</th>
                <th style="width: 28%; text-align:center">วัน/เดือน/ปี ที่ได้มา</th>
                <th style="width: 10%; text-align:center">แก้ไข</th>
                <th style="width: 10%; text-align:center">ลบ</th>
            </tr>
        </thead>
            <tbody>
            
<?php
	$arr = $assType->getAssetType();
	$no=1;
	while($res = $db->fetch_array($arr))
{
		$datetime = DateTime::createFromFormat('Y-m-d',$res['assetTypeAddDate']);
		$dateT = $datetime->format('d/m/Y');
		$texts = substr($dateT,6,4);
		$dates = substr($dateT,0,6);
		$years = $texts+543;
		$showdate = $dates."".$years;
	
	echo "<tr>";
	echo "<td id='Uid".$no."' style='text-align:center'>".$no."</td>";
	echo "<td id='Uuname".$no."' style='text-align:center'>".$res['assetTypeCode']."</td>";
	echo "<td id='Ufname".$no."'>".$res['assetTypeName']."</td>";
	echo "<td id='Ulname".$no."' style='text-align:center'>".$showdate."</td>";
	echo "<td id='Uedit".$no."' style='text-align:center'><a class='button icon edit' onClick='getEditType(".$res['id'].");'></a></td>";
	echo "<td id='Udel".$no."' style='text-align:center'><a class='button icon remove danger' onClick='delType(".$res['id'].");'></a></td>";
	echo "</tr>";
	
	$no++;
	
}
?>
        </tbody>
    </table>

   
