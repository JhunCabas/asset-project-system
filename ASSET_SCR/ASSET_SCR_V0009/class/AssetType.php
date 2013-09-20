<?php

	//include 'Config.php';
	include_once "Config.php";

	class AssetType{
		private $id;
		private $assetTypeCode;
		private $assetTypeName;
		private $mysql;
		private $error;
			
		public function __construct(){
			$db= new Config();
		}


		function AssetType($mysql)
		{
			$this->mysql = $mysql;
		}
		
		function getAssetType()
		{
			
			return mysql_query('SELECT id,assetTypeCode,assetTypeName FROM assettype ORDER BY assetTypeCode ASC');
		}
		
		function checkAssetType($assetTypeCode)
		{
			
			return mysql_query('SELECT id,assetTypeCode,assetTypeName FROM assettype WHERE assetTypeCode="'.$assetTypeCode.'"');
		}
		
		function getEditAssetType()
		{
			
			return mysql_query('SELECT id,assetTypeCode,assetTypeName FROM assettype WHERE id = "'.$this->id.'" ORDER BY assetTypeCode ASC LIMIT 1');
		}
		
		function editAssetType()
		{
			
			return mysql_query('UPDATE assettype SET assetTypeName="'.$this->getAssetTypeName().'" WHERE id="'.$this->id.'"');
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
			 mysql_query('DELETE FROM assettype WHERE id="'.$this->id.'"');
			 return true;
		}
		
		function getId()
		{
			return $this->id;
		}
		
		function setId($id)
		{
			$this->id = $id;
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