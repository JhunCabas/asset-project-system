<?php
session_start();
		include_once("../class/CheckAsset.php");
		$updateChk = new CheckAsset();
		
		
		$checkId = $_GET["checkId"];
		$status = $_GET["status"];
		$userId = $_SESSION["id"];
		
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

			$updateChk->setCheckId($checkId);
			$updateChk->setCheckStatus($stat);
			$updateChk->setUserId($userId);
			$updateChk->checkAssetStatus();
		
		
?>
