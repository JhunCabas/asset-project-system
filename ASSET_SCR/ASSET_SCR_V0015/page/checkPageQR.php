<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : checkPageQR.php 
//** คำอธิบาย : ไฟล์นี้เป็น แสดงรายละเอียดหน้า ตรวจเช็คครุภัณฑ์
//** Version : 1.0
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//
?>
    <div class="containerCheck">
    <div id="checkQRMo" class="check">
    <center><h1><font size="6">ตรวจเช็คสถานะ</font></h1></center>
   	<center>
<?php
	$userId = $_SESSION['uId'];
	$_SESSION["id"] = $userId;

	$chkAsset->setCheckId($encode);
	$arr = $chkAsset->getCheckAssetById();

	while($res = $dbAsset->fetch_array($arr)){
		if($res['checkStatus']=="Y"){
			$stat = "ใช้งานได้";
		}
		else if($res['checkStatus']=="N"){
			$stat = "ชำรุด";
		}
		else if($res['checkStatus']=="D"){
			$stat = "เสื่อมสภาพ";
		}else if($res['checkStatus']==null){
			$stat = "-";
		}

		$selDate = $res['assetAddDate'];
		$newYear = $res['assetYear'];
		
		$dateM = substr($selDate,4,6);
		$text = substr($selDate,0,4);
		$year = $text+543;
		$years = substr($newYear,2,4);
		$dateType = $year."".$dateM;
		$datetime = DateTime::createFromFormat('Y-m-d',$dateType);
		$dateT = $datetime->format('d/m/Y');

		if($res['checkDate']!="0000-00-00"){
				$chkDate = $res['checkDate'];
				$mm = substr($chkDate,4,6);
				$yy = substr($chkDate,0,4);
				$rrrr = $yy+543;
				$dateTest = $rrrr."".$mm;
				$datetime1 = DateTime::createFromFormat('Y-m-d',$dateTest);
				$dateCh = $datetime1->format('d/m/Y');
			}
			else{
				$datetime2 = DateTime::createFromFormat('Y-m-d',$res['checkDate']);
				$dateCh = $datetime2->format('d/m/Y');
				$dateCh = "ยังไม่ได้ตรวจเช็ค";
			}
		echo "<font size='3'>";
		echo $years."/".$res['assetTypeCode']."-".$res['assetTypeCode']."".$res['assetGroupCode']."-".$res['assetCode'];
		echo " : ";
		echo $res['assetName']."</br>";
		echo "เช็คล่าสุด : ".$res['firstName']."  ".$res['lastName'];
		echo "  ในวันที่ : ".$dateCh."</br>";
		echo "สถานะ : ".$stat."</br>";
		echo "</font>";
	}
?>
	</br>
	<a class="button big icon approve"  onClick="onCheckQrY(<?php echo $encode.",".$_SESSION["id"]  ?>);" 
    style='width: 200px;'><font size="4">ใช้งานได้</font></a>
	</br></br>
	<a class="button big icon remove danger" onClick="onCheckQrN(<?php echo $encode.",".$_SESSION["id"] ?>);" 
    style='width: 200px;'><font size="4">ชำรุด</font></a>
	</br></br>
	<a class="button big icon trash danger" onClick="onCheckQrD(<?php echo $encode.",".$_SESSION["id"]  ?>);" 
    style='width: 200px;'><font size="4">เสื่อมสภาพ</font></a>
    </br></br>
    </center>
	</div>


