<?php
	session_start();
	include_once("../class/Config.php");
	include_once("../class/CheckAsset.php");
	
	$checkAsset = new CheckAsset();
	$db= new Config();

?>
    <table class="table table-bordered">
        <thead>
            <tr>
            	<th style="width: 1%; text-align:center">ลำดับ</th>
                <th style="width: 3%; text-align:center">วัน/เดือน/ปี</br>ที่ได้มา</th>
                <th style="width: 8%; text-align:center">เลขครุภัณฑ์</th>
                <th style="width: 15%; text-align:center">ชื่อครุภัณฑ์</th>
                <th style="width: 5%; text-align:center">ราคา</th>
                <th style="width: 10%; text-align:center">ใช้ประจำหน่วยงาน</th>
                <th style="width: 5%; text-align:center">สถานะ</th>
                <th style="width: 5%; text-align:center">ตรวจเช็ค</th>
            </tr>
        </thead>
            <tbody>
            
<?php
	
	$no=1;
	$assetYear = $_GET['assetYear'];
	//$yearChk = $assetYear-543;


	$arrYear = $checkAsset->getCheckAssetByYear($assetYear);
	$arrAll = $checkAsset->getCheckAsset();
	if($assetYear==null){
		$cmd = $arrAll;
	}
	else if($assetYear!=null){
		if($assetYear=="0000"){
		$cmd = $arrAll;
		}else{
			$cmd = $arrYear;
		}
	}else{
		$cmd = $arrAll;
	}
	
	while($res = $db->fetch_array($cmd))
{
		$selDate = $res['assetAddDate'];
		$numberAsString = number_format($res['assetPrice'], 2);
		if($res['status']=="Y"){
			$stat = "ใช้งานได้";
		}
		else if($res['status']=="N"){
			$stat = "ชำรุด";
		}
		else if($res['status']=="D"){
			$stat = "เสื่อมสภาพ";
		}else{
			$stat = "-";
		}
		
		$dateM = substr($selDate,4,6);
		$text = substr($selDate,0,4);
		$year = $text+543;
		$yy = substr($assetYear,2,4);
		$yearS = substr($year,2,4);
		$dateType = $year."".$dateM;
		
		$datetime = DateTime::createFromFormat('Y-m-d',$dateType);
		$dateT = $datetime->format('d/m/Y');
		
	echo "<tr>";
	echo "<td style='text-align:center'>".$no."</td>";
	echo "<td style='text-align:center'>".$dateT."</td>";
	echo "<td style='text-align:center'>".$yy."/".$res['assetTypeCode']."-".$res['assetTypeCode']."".$res['assetGroupCode']."-".$res['assetCode']."</td>";
	echo "<td style='text-align:left'>".$res['assetName']."</td>";
	echo "<td style='text-align:right'>".$numberAsString."</td>";
	echo "<td style='text-align:center'>".$res['assetLocation']."</td>";
	echo "<td style='text-align:center'>".$stat."</td>";
	echo "<td style='text-align:center'><a class='button big icon approve' onClick='getCheck(".$res['id'].");'></a></td>";
	echo "</tr>";
	
	$no++;
	
}
?>
        </tbody>
    </table>