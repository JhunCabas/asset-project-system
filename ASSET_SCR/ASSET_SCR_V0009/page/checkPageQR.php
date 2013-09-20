	<div class="containerCheck">
    <div class="check">
        <center><h1><font size="6">ตรวจเช็คสถานะ</font></h1></center>
      <center>
      <?php
	  	$chkAsset->setId($encode);
		$arr = $chkAsset->getCheckAssetById();
		
		while($res = $dbAsset->fetch_array($arr)){
			if($res['status']=="Y"){
			$stat = "ใช้งานได้";
		}
		else if($res['status']=="N"){
			$stat = "ชำรุด";
		}
		else if($res['status']=="D"){
			$stat = "เสื่อมสภาพ";
		}else if($res['status']==null){
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
		}else{
			$datetime2 = DateTime::createFromFormat('Y-m-d',$res['checkDate']);
			$dateCh = $datetime2->format('d/m/Y');
			$dateCh = "ยังไม่ได้ตรวจเช็ค";
		}
			echo "<font size='3'>";
			echo $years."/".$res['assetTypeCode']."-".$res['assetTypeCode']."".$res['assetGroupCode']."-".$res['assetCode'];
			echo " : ";
			echo $res['assetName']."</br>";
			echo "วันที่เช็คล่าสุด : ".$dateCh."</br>";
			echo "สถานะ : ".$stat."</br>";
			echo "</font>";
		}
	  ?>
      </br>
        <a class="button big icon approve"  onClick="onCheckQrY(<?php echo $encode ?>);" style='width: 130px;'><font size="4">ใช้งานได้</font></a>
		</br></br>
        <a class="button big icon approve" onClick="onCheckQrN(<?php echo $encode ?>);" style='width: 130px;'><font size="4">ชำรุด</font></a>
		</br></br>
        <a class="button big icon approve" onClick="onCheckQrD(<?php echo $encode ?>);" style='width: 130px;'><font size="4">เสื่อมสภาพ</font></a>
		</br></br>
        </center>
        
	</div>
    
    
