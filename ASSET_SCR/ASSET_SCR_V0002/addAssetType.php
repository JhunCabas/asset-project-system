<?php
	include 'class/AssetType.php';
	$assettype = new AssetType();
	$assettype->setAssetTypeCode('01');
	$assettype->setAssetTypeName('sd');
	$assettype->insertAssetType();
	
	$assettype->getAssetTypeCode();
	$assettype->getAssetTypeName();
	
?>