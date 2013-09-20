<?php

	//include 'Config.php';
	include_once "Config.php";

	class AssetType{
		private $id;
		private $assetTypeCode;
		private $assetTypeName;
		private $assetTypeAddDate;
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
			
			return mysql_query('SELECT id,assetTypeCode,assetTypeName,assetTypeAddDate FROM assettype');
		}
		
		function checkAssetType($assetTypeCode)
		{
			
			return mysql_query('SELECT id,assetTypeCode,assetTypeName,assetTypeAddDate FROM assettype WHERE assetTypeCode="'.$assetTypeCode.'"');
		}
		
		function getEditAssetType()
		{
			
			return mysql_query('SELECT id,assetTypeCode,assetTypeName,assetTypeAddDate FROM assettype WHERE id = "'.$this->id.'" LIMIT 1');
		}
		
		function editAssetType()
		{
			
			return mysql_query('UPDATE assettype SET assetTypeName="'.$this->getAssetTypeName().'",assetTypeAddDate="'.$this->getAssetTypeAddDate().'" WHERE id="'.$this->id.'"');
		}
		
		function addAssetType()
		{
			 mysql_query('INSERT INTO assettype (assetTypeCode,assetTypeName,assetTypeAddDate)
			  VALUES ("'.$this->getAssetTypeCode().'",
			 "'.$this->getAssetTypeName().'",
			 "'.$this->getAssetTypeAddDate().'")');
			 
			 return true;
		}
		
		function setValues($assetTypeCode,$assetTypeName,$assetTypeAddDate)
		{
			
			 $this->setAssetTypeCode($assetTypeCode);
			 $this->setAssetTypeName($assetTypeName);
			 $this->setAssetTypeAddDate($assetTypeAddDate);
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
		function getAssetTypeAddDate()
		{
			return $this->assetTypeAddDate;
		}
		
		function setAssetTypeAddDate($assetTypeAddDate)
		{
			$this->assetTypeAddDate = $assetTypeAddDate;
		}
		
	}

	
	
				
				
			
?>