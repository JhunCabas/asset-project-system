<?php

	//include 'Config.php';
	include_once "Config.php";

	class CheckAsset{
		private $checkId;
		private $assetTypeId;
		private $assetGroupId;
		private $assetYear;
		private $assetAddDate;
		private $assetId;
		private $checkDate;
		private $CheckStatus;
		private $userId;
		private $mysql;
		private $error;
			
		public function __construct(){
			$db= new Config();
		}
		
		function getCheckAsset()
		{
			
			return mysql_query('SELECT D.checkId,C.assetId,D.assetYear,D.assetAddDate,A.assetTypeCode,B.assetGroupCode,C.assetCode,C.assetName,C.assetPrice,C.assetLocation,D.checkStatus FROM assettype AS A, assetgroup AS B, asset AS C, checkasset AS D WHERE D.assetTypeId = A.assetTypeId AND D.assetGroupId = B.assetGroupId AND D.assetId = C.assetId ORDER BY D.assetAddDate DESC,A.assetTypeCode,B.assetGroupCode,C.assetCode ASC');
		}
		
		function getCheckAssetByStatus($status)
		{
			
			return mysql_query('SELECT D.checkId,D.assetYear,D.assetAddDate,A.assetTypeCode,B.assetGroupCode,C.assetCode,C.assetName,C.assetPrice,C.assetLocation,D.checkStatus FROM assettype AS A,assetgroup AS B,asset AS C,checkasset AS D WHERE D.assetTypeId = A.assetTypeId AND D.assetGroupId = B.assetGroupId AND D.assetId = C.assetId AND D.checkStatus = "'.$status.'" ORDER BY D.assetAddDate DESC,A.assetTypeCode,B.assetGroupCode,C.assetCode ASC');
		}
		
		function getCheckAssetById()
		{
			
			return mysql_query('SELECT D.checkId,D.assetYear,D.assetAddDate,A.assetTypeCode,B.assetGroupCode,C.assetCode,C.assetName,C.assetPrice,C.assetLocation,D.checkStatus,D.checkDate,E.firstName,E.lastName FROM assettype AS A,assetgroup AS B,asset AS C,checkasset AS D,user AS E WHERE D.assetAddDate = C.assetAddDate AND D.assetTypeId = A.assetTypeId AND D.assetGroupId = B.assetGroupId AND D.assetId = C.assetId AND D.userId = E.userId AND D.checkId = "'.$this->getCheckId().'" ORDER BY D.assetAddDate DESC,A.assetTypeCode,B.assetGroupCode,C.assetCode ASC');
		}
		
		function getCheckAssetByYear($year)
		{
			
			return mysql_query('SELECT D.checkId,C.assetId,D.assetYear,D.assetAddDate,A.assetTypeCode,B.assetGroupCode,C.assetCode,C.assetName,C.assetPrice,C.assetLocation,D.checkStatus FROM assettype AS A,assetgroup AS B,asset AS C,checkasset AS D WHERE D.assetTypeId = A.assetTypeId AND D.assetGroupId = B.assetGroupId AND D.assetId = C.assetId AND D.assetYear = "'.$year.'" ORDER BY D.assetAddDate DESC,A.assetTypeCode,B.assetGroupCode,C.assetCode ASC');
		}
		
		function getCheckYear($year)
		{
			
			return mysql_query('SELECT assetYear FROM checkasset WHERE assetYear = "'.$year.'" GROUP BY assetYear ORDER BY assetYear DESC');
		}
		
		function getShowAssetYear()
		{
			
			return mysql_query('SELECT assetYear FROM checkasset GROUP BY assetYear ORDER BY assetYear DESC');
		}
		
		function checkAssetStatus()
		{
			
			return mysql_query('UPDATE checkasset SET checkStatus="'.$this->getCheckStatus().'" ,userId = "'.$this->getUserId().'", checkDate = CURDATE() WHERE checkId="'.$this->getCheckId().'"');
		}
		
		function editCheckAsset()
		{
			
			return mysql_query('UPDATE checkasset SET assetAddDate="'.$this->getAssetAddDate().'" WHERE assetId="'.$this->getAssetId().'"');
		}
		
		function addCheckAsset()
		{
			 mysql_query('INSERT INTO checkasset (assetId,assetTypeId,assetGroupId,assetYear,assetAddDate,userId)
			  VALUES ("'.$this->getAssetId().'",
			  "'.$this->getAssetTypeId().'",
			  "'.$this->getAssetGroupId().'",
			  "'.$this->getAssetYear().'",
			 "'.$this->getAssetAddDate().'",
			 "'.$this->getUserId().'")');
			 
			 return true;
		}
		
		function delCheckAsset()
		{
			 mysql_query('DELETE FROM checkasset WHERE assetTypeId="'.$this->getAssetTypeId().'" AND assetGroupId="'.$this->getAssetGroupId().'" AND assetId="'.$this->getAssetId().'"');
			 return true;
		}
		
		function getCheckId()
		{
			return $this->checkId;
		}
		
		function setCheckId($checkId)
		{
			$this->checkId = $checkId;
		}
		
		function getAssetTypeId()
		{
			return $this->assetTypeId;
		}
		
		function setAssetTypeId($assetTypeId)
		{
			$this->assetTypeId = $assetTypeId;
		}
		
		function getAssetGroupId()
		{
			return $this->assetGroupId;
		}
		
		function setAssetGroupId($assetGroupId)
		{
			$this->assetGroupId = $assetGroupId;
		}
		
		function getAssetYear()
		{
			return $this->assetYear;
		}
		
		function setAssetYear($assetYear)
		{
			$this->assetYear = $assetYear;
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
		function getCheckStatus()
		{
			return $this->checkStatus;
		}
		
		function setCheckStatus($checkStatus)
		{
			$this->checkStatus = $checkStatus;
		}
		
		function getUserId()
		{
			return $this->userId;
		}
		
		function setUserId($userId)
		{
			$this->userId = $userId;
		}
		
	}

	
	
				
				
			
?>