<?php

	//include 'Config.php';
	include_once "Config.php";

	class AssetGroup{
		private $assetGroupId;
		private $assetGroupCode;
		private $assetGroupName;
		private $assetTypeId;
		private $mysql;
		private $error;
			
		public function __construct(){
			$db= new Config();
		}
		
		function getAssetGroup()
		{
			
			return mysql_query('SELECT A.assetGroupId,A.assetGroupCode,A.assetGroupName,B.assetTypeCode FROM assetgroup AS A,assettype AS B WHERE B.assetTypeId = A.assetTypeId ORDER BY B.assetTypeCode,A.assetGroupCode ASC');
		}
		
		function getAssetGroupByType($assetTypeId)
		{
			
			return mysql_query('SELECT A.assetGroupId,A.assetGroupCode,A.assetGroupName,B.assetTypeCode FROM assetgroup AS A,assettype AS B WHERE B.assetTypeId = A.assetTypeId AND B.assetTypeId = "'.$assetTypeId.'" ORDER BY B.assetTypeCode,A.assetGroupCode ASC');
		}
		
		function checkAssetGroup()
		{
			
			return mysql_query('SELECT * FROM assetgroup WHERE assetGroupCode="'.$this->getAssetGroupCode().'" AND assetTypeId="'.$this->getAssetTypeId().'"');
		}
		
		function getEditAssetGroup()
		{
			
			return mysql_query('SELECT A.assetGroupId,A.assetGroupCode,A.assetGroupName,B.assetTypeCode FROM assetgroup AS A,assettype AS B WHERE A.assetGroupId = "'.$this->getAssetGroupId().'" LIMIT 1');
		}
		
		function editAssetGroup()
		{
			
			return mysql_query('UPDATE assetgroup SET assetGroupName="'.$this->getAssetGroupName().'" WHERE assetGroupId="'.$this->getAssetGroupId().'"');
		}
		
		function addAssetGroup()
		{
			 mysql_query('INSERT INTO assetgroup (assetGroupCode,assetGroupName,assetTypeId)
			  VALUES ("'.$this->getAssetGroupCode().'",
			 "'.$this->getAssetGroupName().'",
			 "'.$this->getAssetTypeId().'")');
			 
			 return true;
		}
		
		function setValues($assetGroupCode,$assetGroupName,$assetTypeId)
		{
			
			 $this->setAssetGroupCode($assetGroupCode);
			 $this->setAssetGroupName($assetGroupName);
			 $this->setAssetTypeId($assetTypeId);
		}
		
		function delAssetGroup()
		{
			 mysql_query('DELETE FROM assetgroup WHERE assetGroupId="'.$this->getAssetGroupId().'"');
			 return true;
		}
		
		function getAssetGroupId()
		{
			return $this->assetGroupId;
		}
		
		function setAssetGroupId($assetGroupId)
		{
			$this->assetGroupId = $assetGroupId;
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
		function getAssetTypeId()
		{
			return $this->assetTypeId;
		}
		
		function setAssetTypeId($assetTypeId)
		{
			$this->assetTypeId = $assetTypeId;
		}
		
	}

	
	
				
				
			
?>