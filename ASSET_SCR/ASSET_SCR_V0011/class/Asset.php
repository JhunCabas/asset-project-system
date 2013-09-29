<?php

	//include 'Config.php';
	include_once "Config.php";

	class Asset{
		private $id;
		private $assetCode;
		private $assetName;
		private $assetPrice;
		private $assetTypeCode;
		private $assetGroupCode;
		private $assetYear;
		private $assetLocation;
		private $assetAddDate;
		private $remark;
		private $search;
		private $mysql;
		private $error;
			
		public function __construct(){
			$db= new Config();
		}
		
		function getAsset()
		{
			
			return mysql_query('SELECT id,assetCode,assetName,assetPrice,assetTypeCode,assetGroupCode,assetYear,assetAddDate,remark FROM asset ORDER BY assetYear DESC,assetTypeCode,assetGroupCode,assetCode ASC');
		}
		
		function getSearchAsset($search)
		{
			return mysql_query('SELECT * FROM (
SELECT CONCAT(SUBSTR(assetYear,3,4),"/",assetTypeCode,"-",assetTypeCode,assetGroupCode,"-",assetCode) AS assetCodes FROM asset) AS code WHERE assetCodes LIKE "%'.$search.'%"');
		}
		
		function getAssetMax()
		{
			
			return mysql_query('SELECT MAX(assetCode) AS assetCode FROM asset WHERE assetYear="'.$this->getAssetYear().'" AND assetTypeCode="'.$this->getAssetTypeCode().'" AND assetGroupCode="'.$this->getAssetGroupCode().'"');
		}
		
		function getAssetById()
		{
			
			return mysql_query('SELECT id,assetCode,assetTypeCode,assetGroupCode,assetAddDate FROM asset WHERE id="'.$this->id.'" ORDER BY assetTypeCode,assetGroupCode,assetCode ASC');
		}
		
		function getAssetByYear($assetYear)
		{
			
			return mysql_query('SELECT id,assetCode,assetName,assetPrice,assetTypeCode,assetGroupCode,assetYear,assetAddDate,remark FROM asset WHERE assetYear="'.$assetYear.'" ORDER BY assetYear DESC,assetTypeCode,assetGroupCode,assetCode ASC');
		}
		
		function getAssetByType($assetTypeCode)
		{
			
			return mysql_query('SELECT id,assetCode,assetName,assetPrice,assetYear,assetTypeCode,assetGroupCode,assetYear,assetAddDate,remark FROM asset WHERE assetTypeCode="'.$assetTypeCode.'" ORDER BY assetYear DESC,assetTypeCode,assetGroupCode,assetCode ASC');
		}
		
		function getAssetBy($command)
		{
			
			return mysql_query('SELECT id,assetCode,assetName,assetPrice,assetTypeCode,assetGroupCode,assetYear,assetAddDate,remark FROM asset '.$command.' ORDER BY assetYear DESC,assetTypeCode,assetGroupCode,assetCode ASC');
		}
		
		function getShowAssetYear()
		{
			
			return mysql_query('SELECT assetYear FROM asset GROUP BY assetYear ORDER BY assetYear DESC');
		}
		
		function getShowAssetType()
		{
			
			return mysql_query('SELECT A.assetTypeCode,B.assetTypeName FROM asset A,assetType B WHERE A.assetTypeCode = B.assetTypeCode GROUP BY assetTypeCode ORDER BY assetTypeCode ASC');
		}
		
		function getShowAssetTypeByYear($year)
		{
			
			return mysql_query('SELECT A.assetTypeCode,B.assetTypeName FROM asset A,assettype B WHERE A.assetTypeCode = B.assetTypeCode AND A.assetYear = "'.$year.'" GROUP BY assetTypeCode ORDER BY assetTypeCode ASC');
		}
		
		function getShowAssetGroupByType($year,$type)
		{
			
			return mysql_query('SELECT A.assetTypeCode,A.assetGroupCode,B.assetGroupName FROM asset A,assetgroup B WHERE A.assetGroupCode = B.assetGroupCode AND A.assetTypeCode = B.assetTypeCode AND A.assetYear = "'.$year.'" AND A.assetTypeCode = "'.$type.'" GROUP BY assetGroupCode ORDER BY assetGroupCode ASC');
		}
		
			function getShowAssetByGroup($year,$type,$group)
		{
			
			return mysql_query('SELECT A.assetTypeCode,A.assetGroupCode,A.assetCode,A.assetName FROM asset A,assetgroup B WHERE A.assetGroupCode = B.assetGroupCode AND A.assetTypeCode = B.assetTypeCode AND A.assetYear = "'.$year.'" AND A.assetTypeCode = "'.$type.'" AND A.assetGroupCode = "'.$group.'" ORDER BY A.assetCode ASC');
		}
		
		function getShowAssetBetween($year,$type,$group,$assStart,$assEnd)
		{
			
			return mysql_query('SELECT B.id,A.assetYear,A.assetTypeCode,A.assetGroupCode,A.assetCode,A.assetName FROM asset A,checkasset B WHERE A.assetGroupCode = B.assetGroupCode AND A.assetTypeCode = B.assetTypeCode AND A.assetCode = B.assetCode AND A.assetYear = B.assetYear AND A.assetYear = "'.$year.'" AND A.assetTypeCode = "'.$type.'" AND A.assetGroupCode = "'.$group.'" AND A.assetCode BETWEEN "'.$assStart.'" AND "'.$assEnd.'" ORDER BY A.assetCode ASC');
		}
		
		function checkAsset()
		{
			
			return mysql_query('SELECT id,assetCode,assetName,assetPrice,assetYear,assetTypeCode,assetGroupCode,assetYear,assetAddDate,remark FROM asset WHERE assetYear = "'.$this->getAssetYear().'" AND assetGroupCode="'.$this->getAssetGroupCode().'" AND assetTypeCode="'.$this->getAssetTypeCode().'" AND assetCode="'.$this->getAssetCode().'"');
		}
		
		function getEditAsset()
		{
			
			return mysql_query('SELECT id,assetCode,assetName,assetPrice,assetTypeCode,assetGroupCode,assetYear,assetAddDate,remark FROM asset WHERE id = "'.$this->id.'" LIMIT 1');
		}
		
		function editAsset()
		{
			
			return mysql_query('UPDATE asset SET assetName="'.$this->getAssetName().'" ,assetPrice="'.$this->getAssetPrice().'" , remark="'.$this->getRemark().'" ,assetAddDate="'.$this->getAssetAddDate().'",assetYear="'.$this->getAssetYear().'" WHERE id="'.$this->id.'"');
		}
		
		function addAsset()
		{
			 mysql_query('INSERT INTO asset (assetCode,assetName,assetPrice,assetTypeCode,assetGroupCode,assetYear,assetLocation,assetAddDate,remark)
			  VALUES ("'.$this->getAssetCode().'",
			 "'.$this->getAssetName().'",
			 "'.$this->getAssetPrice().'",
			 "'.$this->getAssetTypeCode().'",
			 "'.$this->getAssetGroupCode().'",
			 "'.$this->getAssetYear().'",
			 "'.$this->getAssetLocation().'",
			 "'.$this->getAssetAddDate().'",
			 "'.$this->getRemark().'")');
			 
			 return true;
		}
		
		function setValues($assetCode,$assetName,$assetPrice,$assetTypeCode,$assetGroupCode,$assetYear,$assetLocation,$assetAddDate,$remark)
		{
			
			 $this->setAssetCode($assetCode);
			 $this->setAssetName($assetName);
			 $this->setAssetPrice($assetPrice);
			 $this->setAssetTypeCode($assetTypeCode);
			 $this->setAssetGroupCode($assetGroupCode);
			 $this->setAssetYear($assetYear);
			 $this->setAssetLocation($assetLocation);
			 $this->setAssetAddDate($assetAddDate);
			 $this->setRemark($remark);
		}
		
		function delAsset()
		{
			 mysql_query('DELETE FROM asset WHERE id="'.$this->id.'"');
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
		function getAssetName()
		{
			return $this->assetName;
		}
		
		function setAssetName($assetName)
		{
			$this->assetName = $assetName;
		}
		function getAssetPrice()
		{
			return $this->assetPrice;
		}
		
		function setAssetPrice($assetPrice)
		{
			$this->assetPrice = $assetPrice;
		}
		function getAssetYear()
		{
			return $this->assetYear;
		}
		
		function setAssetYear($assetYear)
		{
			$this->assetYear = $assetYear;
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
		
		function getAssetLocation()
		{
			return $this->assetLocation;
		}
		
		function setAssetLocation($assetLocation)
		{
			$this->assetLocation = $assetLocation;
		}
		
		function getAssetAddDate()
		{
			return $this->assetAddDate;
		}
		
		function setAssetAddDate($assetAddDate)
		{
			$this->assetAddDate = $assetAddDate;
		}
		function getRemark()
		{
			return $this->remark;
		}
		
		function setRemark($remark)
		{
			$this->remark = $remark;
		}
		
	}

	
	
				
				
			
?>