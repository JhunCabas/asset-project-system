<?php

		include_once("../class/CheckAsset.php");
		$updateChk = new CheckAsset();
		
		
		$id = $_GET["id"];
		$status = $_GET["status"];
		if($status=="ใช้งานได้"){
			$stat="Y";
		}
		else if($status=="ชำรุด"){
			$stat="N";
		}
		else if($status=="เสื่อมสภาพ"){
			$stat="D";
		}
		else{
			$stat=null;
		}

			$updateChk->setId($id);
			$updateChk->setStatus($stat);
			$updateChk->checkAssetStatus();
		
		
?>
