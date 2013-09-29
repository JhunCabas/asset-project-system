<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : tableMain.php 
//** คำอธิบาย : ไฟล์นี้  แสดงตาราง Main
//** Version : 1.0
//** CoddingDate : 12/09/2556
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//

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
            </tr>
        </thead>
            <tbody>
            
<?php
	
	$no=1;
	$assStat = $_GET["id"];
	if($assStat=="0"){
		$stat = "";
	}
	else if($assStat=="1"){
		$stat = "Y";
	}
	else if($assStat=="2"){
		$stat = "N";
	}
	else if($assStat=="3"){
		$stat = "D";
	}
	else{
		$stat = "";
	}
	
	
	$page = $_GET['selectedPage'];
	$iPage = 20;
	if($page>0){
		$startPage = $page*$iPage;
		$endPage = 20;
		$arrL = $checkAsset->getCheckAssetByStatusLim($stat,$startPage,$endPage);
		$arrA = $checkAsset->getCheckAssetByStatus($stat);
		$cmd = $arrL;
		$cmdA = $arrA;
		
	}
	else{
		$startPage = 0;
		$endPage = 20;
		$arrL = $checkAsset->getCheckAssetByStatusLim($stat,$startPage,$endPage);
		$arrA = $checkAsset->getCheckAsset();
		$cmd = $arrL;
		$cmdA = $arrA;
	}
	$num = $db->num_rows($cmdA);
	$numPage = round($num/20);
	echo "จำนวนหน้าทั้งหมด : ";
	$i=0;
	$j=1;
	while($i<$numPage){
		echo "<input type='button' value='".$j."' class='button' onclick='changePageMain(0,".$i.");'>";
		$i++;
		$j++;
	}
	$no1=$startPage;
	$no=$no1+1;
	
	while($res = $db->fetch_array($cmd))
{
		$selDate = $res['assetAddDate'];
		$assYear = $res['assetYear'];
		$numberAsString = number_format($res['assetPrice'], 2);
		if($res['checkStatus']=="Y"){
			$stat = "ใช้งานได้";
		}
		else if($res['checkStatus']=="N"){
			$stat = "ชำรุด";
		}
		else if($res['checkStatus']=="D"){
			$stat = "เสื่อมสภาพ";
		}else{
			$stat = "-";
		}
		
		$dateM = substr($selDate,4,6);
		$text = substr($selDate,0,4);
		$year = $text+543;
		$yy = substr($assYear,2,4);
		$yearS = substr($year,2,4);
		$dateType = $year."".$dateM;
		
		$datetime = DateTime::createFromFormat('Y-m-d',$dateType);
		$dateT = $datetime->format('d/m/Y');
		$dateE = "55";
		
	echo "<tr>";
	echo "<td style='text-align:center'>".$no."</td>";
	echo "<td style='text-align:center'>".$dateT."</td>";
	echo "<td style='text-align:center'>".$yy."/".$res['assetTypeCode']."-
	".$res['assetTypeCode']."".$res['assetGroupCode']."-".$res['assetCode']."</td>";
	echo "<td style='text-align:left'>".$res['assetName']."</td>";
	echo "<td style='text-align:right'>".$numberAsString."</td>";
	echo "<td style='text-align:center'>".$res['assetLocation']."</td>";
	echo "<td style='text-align:center'>".$stat."</td>";
	echo "</tr>";
	
	$no++;
	
}
?>
        </tbody>
    </table>