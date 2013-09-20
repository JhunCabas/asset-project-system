<?php

	//include 'Config.php';
	include_once "Config.php";

	class CheckAsset{
		private $id;
		private $assetCode;
		private $assetTypeCode;
		private $assetGroupCode;
		private $assetAddDate;
		private $assetId;
		private $checkDate;
		private $status;
		private $mysql;
		private $error;
			
		public function __construct(){
			$db= new Config();
		}


		function CheckAsset($mysql)
		{
			$this->mysql = $mysql;
		}
		
		function getCheckAsset()
		{
			
			return mysql_query('SELECT B.id,B.assetAddDate,B.assetTypeCode,B.assetGroupCode,B.assetCode,A.assetName,A.assetPrice,A.assetLocation,B.status FROM asset AS A,checkasset AS B WHERE B.assetAddDate = A.assetAddDate AND B.assetTypeCode = A.assetTypeCode AND B.assetGroupCode = A.assetGroupCode AND B.assetCode = A.assetCode ORDER BY B.assetAddDate DESC,B.assetTypeCode,B.assetGroupCode,B.assetCode ASC');
		}
		
		function getCheckAssetById()
		{
			
			return mysql_query('SELECT B.id,B.assetAddDate,B.assetTypeCode,B.assetGroupCode,B.assetCode,A.assetName,A.assetPrice,A.assetLocation,B.status,B.checkDate FROM asset AS A,checkasset AS B WHERE B.assetAddDate = A.assetAddDate AND B.assetTypeCode = A.assetTypeCode AND B.assetGroupCode = A.assetGroupCode AND B.assetCode = A.assetCode AND B.id = "'.$this->id.'" ORDER BY B.assetAddDate DESC,B.assetTypeCode,B.assetGroupCode,B.assetCode ASC');
		}
		
		function getCheckAssetByYear($assetAddDate)
		{
			
			return mysql_query('SELECT B.id,B.assetAddDate,B.assetTypeCode,B.assetGroupCode,B.assetCode,A.assetName,A.assetPrice,A.assetLocation,B.status FROM asset AS A,checkasset AS B WHERE A.assetAddDate LIKE "%'.$assetAddDate.'%" AND B.assetTypeCode = A.assetTypeCode AND B.assetGroupCode = A.assetGroupCode AND B.assetCode = A.assetCode ORDER BY B.assetAddDate DESC,B.assetTypeCode,B.assetGroupCode,B.assetCode ASC');
		}
		
		function getShowAssetYear()
		{
			
			return mysql_query('SELECT SUBSTR(assetAddDate,1,4) AS years FROM checkasset GROUP BY years ORDER BY years DESC');
		}
		
		function checkAssetStatus()
		{
			
			return mysql_query('UPDATE checkasset SET status="'.$this->getAssetName().'" WHERE id="'.$this->id.'"');
		}
		
		function addCheckAsset()
		{
			 mysql_query('INSERT INTO checkasset (assetCode,assetTypeCode,assetGroupCode,assetAddDate)
			  VALUES ("'.$this->getAssetCode().'",
			  "'.$this->getAssetTypeCode().'",
			  "'.$this->getAssetGroupCode().'",
			 "'.$this->getAssetAddDate().'")');
			 
			 return true;
		}
		
		function delCheckAsset()
		{
			 mysql_query('DELETE FROM checkasset WHERE assetTypeCode="'.$this->getAssetTypeCode().'" AND assetGroupCode="'.$this->getAssetGroupCode().'" AND assetCode="'.$this->getAssetCode().'"');
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
		function getAssetCode()
		{
			return $this->assetCode;
		}
		
		function setAssetCode($assetCode)
		{
			$this->assetCode = $assetCode;
		}
		
		
		function getAssetTypeCode()
		{
			return $this->assetTypeCode;
		}
		
		function setAssetTypeCode($assetTypeCode)
		{
			$this->assetTypeCode = $assetTypeCode;
		}
		function getAssetGroupCode()
		{
			return $this->assetGroupCode;
		}
		
		function setAssetGroupCode($assetGroupCode)
		{
			$this->assetGroupCode = $assetGroupCode;
		}
		function getAssetAddDate()
		{
			return $this->assetAddDate;
		}
		
		function setAssetAddDate($assetAddDate)
		{
			$this->assetAddDate = $assetAddDate;
		}
		
		function getAssetId()
		{
			return $this->assetId;
		}
		
		function setAssetId($assetId)
		{
			$this->assetId = $assetId;
		}
		
		function getCheckDate()
		{
			return $this->checkDate;
		}
		
		function setCheckDate($checkDate)
		{
			$this->checkDate = $checkDate;
		}
		function getStatus()
		{
			return $this->status;
		}
		
		function setStatus($status)
		{
			$this->status = $status;
		}
		
	}

	
	
				
				
			
?>