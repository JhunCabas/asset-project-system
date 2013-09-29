<?php

	//include 'Config.php';
	include_once "Config.php";

	class AssetType{
		private $assetTypeId;
		private $assetTypeCode;
		private $assetTypeName;
		private $mysql;
		private $error;
			
		public function __construct(){
			$db= new Config();
		}
		
		function getAssetSearch($search)
		{
			
			return mysql_query('SELECT assetTypeId,assetTypeCode,assetTypeName FROM assettype WHERE assetTypeName LIKE "%'.$search.'%" ORDER BY assetTypeCode ASC');
		}
		
		function getAssetType()
		{
			
			return mysql_query('SELECT assetTypeId,assetTypeCode,assetTypeName FROM assettype ORDER BY assetTypeCode ASC');
		}
		
		function checkAssetType($assetTypeCode)
		{
			
			return mysql_query('SELECT assetTypeId,assetTypeCode,assetTypeName FROM assettype WHERE assetTypeCode="'.$assetTypeCode.'"');
		}
		
		function getEditAssetType()
		{
			
			return mysql_query('SELECT assetTypeId,assetTypeCode,assetTypeName FROM assettype WHERE assetTypeId = "'.$this->getAssetTypeId().'" ORDER BY assetTypeCode ASC LIMIT 1');
		}
		
		function editAssetType()
		{
			
			return mysql_query('UPDATE assettype SET assetTypeName="'.$this->getAssetTypeName().'" WHERE assetTypeId="'.$this->getAssetTypeId().'"');
		}
		
		function addAssetType()
		{
			 mysql_query('INSERT INTO assettype (assetTypeCode,assetTypeName)
			  VALUES ("'.$this->getAssetTypeCode().'",
			 "'.$this->getAssetTypeName().'")');
			 
			 return true;
		}
		
		function setValues($assetTypeCode,$assetTypeName)
		{
			
			 $this->setAssetTypeCode($assetTypeCode);
			 $this->setAssetTypeName($assetTypeName);
			
		}
		
		function delAssetType()
		{
			 mysql_query('DELETE FROM assettype WHERE assetTypeId="'.$this->getAssetTypeId().'"');
			 return true;
		}
		
		function getAssetTypeId()
		{
			return $this->assetTypeId;
		}
		
		function setAssetTypeId($assetTypeId)
		{
			$this->assetTypeId = $assetTypeId;
		}
		function getAssetTypeCode()
		{
			return $this->assetTypeCode;
		}
		
		function setAssetTypeCode($assetTypeCode)
		{
			$this->assetTypeCode = $assetTypeCode;
		}
		function getAssetTypeName()
		{
			return $this->assetTypeName;
		}
		
		function setAssetTypeName($assetTypeName)
		{
			$this->assetTypeName = $assetTypeName;
		}
		
	}

	
	
				
				
			
?>