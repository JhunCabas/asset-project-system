<?php
	include_once("../class/Config.php");
	include_once("../class/AssetType.php");
	$chkType = new AssetType();
	$dbCheck= new config();
	
	$addTypeCode = $_GET["addTypeCode"];
	//$addTypeCode = "02";

		$arr = $chkType->checkAssetType($addTypeCode);
		$rows = $dbCheck->num_rows($arr);
		$i=0;
		if($rows>$i){
		echo $rows;
		}
		else{ 
		echo $i;
		}
?>

