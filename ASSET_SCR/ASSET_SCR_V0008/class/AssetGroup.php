<?php

	//include 'Config.php';
	include_once "Config.php";

	class AssetGroup{
		private $id;
		private $assetGroupCode;
		private $assetGroupName;
		private $assetTypeCode;
		private $mysql;
		private $error;
			
		public function __construct(){
			$db= new Config();
		}


		function AssetGroup($mysql)
		{
			$this->mysql = $mysql;
		}
		
		function getAssetGroup()
		{
			
			return mysql_query('SELECT id,assetGroupCode,assetGroupName,assetTypeCode FROM assetgroup ORDER BY assetTypeCode,assetGroupCode ASC');
		}
		
		function getAssetGroupByType($assetTypeCode)
		{
			
			return mysql_query('SELECT id,assetGroupCode,assetGroupName,assetTypeCode FROM assetgroup WHERE assetTypeCode="'.$assetTypeCode.'" ORDER BY assetTypeCode,assetGroupCode ASC');
		}
		
		function checkAssetGroup()
		{
			
			return mysql_query('SELECT id,assetGroupCode,assetGroupName,assetTypeCode FROM assetgroup WHERE assetGroupCode="'.$this->getAssetGroupCode().'" AND assetTypeCode="'.$this->getAssetTypeCode().'"');
		}
		
		function getEditAssetGroup()
		{
			
			return mysql_query('SELECT id,assetGroupCode,assetGroupName,assetTypeCode FROM assetgroup WHERE id = "'.$this->id.'" LIMIT 1');
		}
		
		function editAssetGroup()
		{
			
			return mysql_query('UPDATE assetgroup SET assetGroupName="'.$this->getAssetGroupName().'" WHERE id="'.$this->id.'"');
		}
		
		function addAssetGroup()
		{
			 mysql_query('INSERT INTO assetgroup (assetGroupCode,assetGroupName,assetTypeCode)
			  VALUES ("'.$this->getAssetGroupCode().'",
			 "'.$this->getAssetGroupName().'",
			 "'.$this->getAssetTypeCode().'")');
			 
			 return true;
		}
		
		function setValues($assetGroupCode,$assetGroupName,$assetTypeCode)
		{
			
			 $this->setAssetGroupCode($assetGroupCode);
			 $this->setAssetGroupName($assetGroupName);
			 $this->setAssetTypeCode($assetTypeCode);
		}
		
		function delAssetGroup()
		{
			 mysql_query('DELETE FROM assetgroup WHERE id="'.$this->id.'"');
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
		function getAssetGroupCode()
		{
			return $this->assetGroupCode;
		}
		
		function setAssetGroupCode($assetGroupCode)
		{
			$this->assetGroupCode = $assetGroupCode;
		}
		function getAssetGroupName()
		{
			return $this->assetGroupName;
		}
		
		function setAssetGroupName($assetGroupName)
		{
			$this->assetGroupName = $assetGroupName;
		}
		function getAssetTypeCode()
		{
			return $this->assetTypeCode;
		}
		
		function setAssetTypeCode($assetTypeCode)
		{
			$this->assetTypeCode = $assetTypeCode;
		}
		
	}

	
	
				
				
			
?>