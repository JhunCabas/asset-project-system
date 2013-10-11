<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ Asset.php 
//** คำอธิบาย : ไฟล์นี้เป็น Class Asset เก็บ Attribute และ Method ของ Asset
//** Version : 1.0
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//

	include_once "Config.php";


	class Asset{
		//****************************************************************//
		//** Attribute ของ Class Asset 
		//****************************************************************//
		private $assetId;
		private $assetCode;
		private $assetName;
		private $assetPrice;
		private $assetYear;
		private $assetLocation;
		private $assetAddDate;
		private $remark;
		private $assetTypeId;
		private $assetGroupId;
		private $userId;
		private $mysql;
		private $error;

		public function __construct(){
			$db= new Config();
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ครุภัณฑ์
		//****************************************************************//
		function getAsset()
		{
			
			return mysql_query('SELECT C.assetYear,
			C.assetId,
			C.assetCode,
			C.assetName,
			C.assetPrice,
			A.assetTypeCode,
			B.assetGroupCode,
			C.assetAddDate,
			C.remark 
			FROM assettype AS A,assetgroup AS B,asset AS C 
			WHERE C.assetTypeId = A.assetTypeId 
			AND C.assetGroupId=B.assetGroupId 
			ORDER BY C.assetYear DESC,
			A.assetTypeCode,B.assetGroupCode,C.assetCode ASC');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ครุภัณฑ์ แบบแบ่งหน้า
		//****************************************************************//
		function getAssetLimit($st,$end)
		{
			
			return mysql_query("SELECT C.assetYear,
			C.assetId,
			C.assetCode,
			C.assetName,
			C.assetPrice,
			A.assetTypeCode,
			B.assetGroupCode,
			C.assetAddDate,
			C.remark 
			FROM assettype AS A,
			assetgroup AS B,
			asset AS C 
			WHERE C.assetTypeId = A.assetTypeId 
			AND C.assetGroupId=B.assetGroupId 
			ORDER BY C.assetYear DESC,
			A.assetTypeCode,
			B.assetGroupCode,
			C.assetCode ASC LIMIT ".$st.",".$end."");
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ครุภัณฑ์ ด้วยการค้นหาด้วยเลขครุภัณฑ์
		//****************************************************************//
		function getSearchAsset($search)
		{
			return mysql_query('SELECT * 
			FROM (SELECT CONCAT(SUBSTR(assetYear,3,4),"/",
			assetTypeCode,"-",
			assetTypeCode,
			assetGroupCode,"-",
			assetCode) AS assetCodes 
			FROM asset) AS code 
			WHERE assetCodes LIKE "%'.$search.'%"');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล รหัสครุภัณฑ์ ที่สูงสุด
		//****************************************************************//
		function getAssetMax($assetTypeId,$assetGroupId)
		{
			
			return mysql_query('SELECT A.assetTypeCode,
			B.assetGroupCode,
			MAX(C.assetCode) AS assetCode 
			FROM assettype AS A,
			assetgroup AS B,
			asset AS C 
			WHERE C.assetTypeId = A.assetTypeId 
			AND C.assetGroupId = B.assetGroupId 
			AND C.assetYear="'.$this->getAssetYear().'" 
			AND A.assetTypeId="'.$assetTypeId.'" 
			AND B.assetGroupId="'.$assetGroupId.'"');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ครุภัณฑ์ ด้วยรหัส
		//****************************************************************//
		function getAssetById()
		{
			
			return mysql_query('SELECT assetId,
			assetCode,
			assetTypeId,
			assetGroupId,
			assetAddDate 
			FROM asset 
			WHERE assetId="'.$this->getAssetId().'" LIMIT 1');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ครุภัณฑ์ ด้วยปี
		//****************************************************************//
		function getAssetByYear($assetYear)
		{
			
			return mysql_query('SELECT assetId,
			assetCode,
			assetName,
			assetPrice,
			assetTypeCode,
			assetGroupCode,
			assetYear,
			assetAddDate,
			remark 
			FROM asset 
			WHERE assetYear="'.$assetYear.'" 
			ORDER BY assetYear DESC,
			assetTypeCode,
			assetGroupCode,
			assetCode ASC');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ครุภัณฑ์ ด้วยประเภท
		//****************************************************************//
		function getAssetByType($assetTypeCode)
		{
			
			return mysql_query('SELECT assetId,
			assetCode,
			assetName,
			assetPrice,
			assetYear,
			assetTypeCode,
			assetGroupCode,
			assetYear,
			assetAddDate,
			remark 
			FROM asset 
			WHERE assetTypeCode="'.$assetTypeCode.'" 
			ORDER BY assetYear DESC,
			assetTypeCode,
			assetGroupCode,
			assetCode ASC');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ครุภัณฑ์ ด้วยคำสั่ง
		//****************************************************************//
		function getAssetBy($command)
		{
			
			return mysql_query('SELECT C.assetId,
			C.assetCode,
			C.assetName,
			C.assetPrice,
			A.assetTypeCode,
			B.assetGroupCode,
			C.assetYear,
			C.assetAddDate,
			C.remark 
			FROM assettype AS A,
			assetgroup AS B,
			asset AS C 
			WHERE C.assetTypeId = A.assetTypeId 
			AND C.assetGroupId=B.assetGroupId '.$command.' 
			ORDER BY C.assetYear DESC,
			C.assetTypeId,
			C.assetGroupId,
			C.assetCode ASC');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ครุภัณฑ์ไป เช็ค
		//****************************************************************//
		function getAssetIdToCheck($assetTypeId,$assetGroupId,$assetCode)
		{
			
			return mysql_query('SELECT assetId 
			FROM asset 
			WHERE assetTypeId = "'.$assetTypeId.'" 
			AND assetGroupId= "'.$assetGroupId.'" 
			AND assetCode = "'.$assetCode.'"');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ปีครุภัณฑ์
		//****************************************************************//
		function getShowAssetYear()
		{
			
			return mysql_query('SELECT assetYear 
			FROM asset 
			GROUP BY assetYear 
			ORDER BY assetYear DESC');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ประเภทครุภัณฑ์
		//****************************************************************//
		function getShowAssetType()
		{
			
			return mysql_query('SELECT A.assetTypeCode,
			B.assetTypeName 
			FROM asset A,
			assettype B 
			WHERE A.assetTypeCode = B.assetTypeCode 
			GROUP BY assetTypeCode 
			ORDER BY assetTypeCode ASC');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ประเภทครุภัณฑ์ ด้วยปี
		//****************************************************************//
		function getShowAssetTypeByYear($year)
		{
			
			return mysql_query('SELECT B.assetTypeCode,
			B.assetTypeName,
			A.assetTypeId 
			FROM asset A,
			assettype B 
			WHERE A.assetTypeId = B.assetTypeId 
			AND A.assetYear = "'.$year.'" 
			GROUP BY B.assetTypeCode 
			ORDER BY B.assetTypeCode ASC');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล หมวดครุภัณฑ์ ด้วยประเภท
		//****************************************************************//
		function getShowAssetGroupByType($year,$type)
		{
			
			return mysql_query('SELECT A.assetTypeCode,
			B.assetGroupCode,
			B.assetGroupName,
			C.assetGroupId 
			FROM assettype A,
			assetgroup B,
			asset C 
			WHERE C.assetGroupId = B.assetGroupId 
			AND C.assetTypeId = A.assetTypeId 
			AND C.assetYear = "'.$year.'" 
			AND A.assetTypeId = "'.$type.'" 
			GROUP BY B.assetGroupCode 
			ORDER BY B.assetGroupCode ASC');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ครุภัณฑ์ ด้วยหมวด
		//****************************************************************//
		function getShowAssetByGroup($year,$type,$group)
		{
			
			return mysql_query('SELECT C.assetCode,
			C.assetName 
			FROM assettype A,
			assetgroup B,
			asset C 
			WHERE C.assetGroupId = B.assetGroupId 
			AND C.assetTypeId = A.assetTypeId 
			AND C.assetYear = "'.$year.'" 
			AND C.assetTypeId = "'.$type.'" 
			AND C.assetGroupId = "'.$group.'" 
			ORDER BY C.assetCode ASC');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ครุภัณฑ์ ระหว่างรหัส
		//****************************************************************//
		function getShowAssetBetween($year,$type,$group,$assStart,$assEnd)
		{
			
			return mysql_query('SELECT D.checkId,
			D.assetYear,
			A.assetTypeCode,
			B.assetGroupCode,
			C.assetCode,
			C.assetName 
			FROM assettype A,
			assetgroup B,
			asset C,
			checkasset D 
			WHERE D.assetTypeId = A.assetTypeId 
			AND D.assetGroupId = B.assetGroupId 
			AND D.assetId = C.assetId 
			AND D.assetYear = "'.$year.'" 
			AND D.assetTypeId = "'.$type.'" 
			AND D.assetGroupId = "'.$group.'" 
			AND C.assetCode BETWEEN "'.$assStart.'" 
			AND "'.$assEnd.'" 
			ORDER BY C.assetCode ASC');
		}
		
		//****************************************************************//
		//** Method เช็คข้อมูล ครุภัณฑ์
		//****************************************************************//
		function checkAsset()
		{
			
			return mysql_query('SELECT assetId 
			FROM asset 
			WHERE assetTypeId = "'.$this->getAssetTypeId().'" 
			AND assetGroupId = "'.$this->getAssetGroupId().'" 
			AND assetCode = "'.$this->getAssetCode().'" 
			AND assetYear = "'.$this->getAssetYear().'"');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ครุภัณฑ์ ไปแก้ไข
		//****************************************************************//
		function getEditAsset()
		{
			
			return mysql_query('SELECT C.assetId,
			C.assetCode,
			C.assetName,
			C.assetPrice,
			A.assetTypeCode,
			B.assetGroupCode,
			C.assetYear,
			C.assetAddDate,
			C.remark,
			D.firstName,
			D.lastName 
			FROM assettype AS A,
			assetgroup AS B,
			asset as C,
			user AS D 
			WHERE C.assetTypeId = A.assetTypeId 
			AND C.assetGroupId = B.assetGroupId 
			AND C.userId = D.userId 
			AND C.assetId = "'.$this->getAssetId().'"  LIMIT 1');
		}
		
		//****************************************************************//
		//** Method แก้ไขข้อมูล ครุภัณฑ์
		//****************************************************************//
		function editAsset()
		{
			
			return mysql_query('UPDATE asset 
			SET assetName="'.$this->getAssetName().'" ,
			assetPrice="'.$this->getAssetPrice().'" , 
			remark="'.$this->getRemark().'" ,
			assetAddDate="'.$this->getAssetAddDate().'",
			assetYear="'.$this->getAssetYear().'" 
			WHERE assetId="'.$this->getAssetId().'"');
		}
		
		//****************************************************************//
		//** Method เพิ่มข้อมูล ครุภัณฑ์
		//****************************************************************//
		function addAsset()
		{
			 mysql_query('INSERT INTO asset (assetCode,
			 assetName,
			 assetPrice,
			 assetTypeId,
			 assetGroupId,
			 assetYear,
			 assetLocation,
			 assetAddDate,
			 remark,
			 UserId)
			 VALUES ("'.$this->getAssetCode().'",
			 "'.$this->getAssetName().'",
			 "'.$this->getAssetPrice().'",
			 "'.$this->getAssetTypeId().'",
			 "'.$this->getAssetGroupId().'",
			 "'.$this->getAssetYear().'",
			 "'.$this->getAssetLocation().'",
			 "'.$this->getAssetAddDate().'",
			 "'.$this->getRemark().'",
			 "'.$this->getUserId().'")');
			 
			 return true;
		}
		
		//****************************************************************//
		//** Method ลบข้อมูล ครุภัณฑ์
		//****************************************************************//
		function delAsset()
		{
			 mysql_query('DELETE FROM asset 
			 WHERE assetId="'.$this->getAssetId().'"');
			 return true;
		}
		
		function setValues($assetCode,
			$assetName,
			$assetPrice,
			$assetTypeId,
			$assetGroupId,
			$assetYear,
			$assetLocation,
			$assetAddDate,
			$remark,
			$userId)
		{
			
			 $this->setAssetCode($assetCode);
			 $this->setAssetName($assetName);
			 $this->setAssetPrice($assetPrice);
			 $this->setAssetTypeId($assetTypeId);
			 $this->setAssetGroupId($assetGroupId);
			 $this->setAssetYear($assetYear);
			 $this->setAssetLocation($assetLocation);
			 $this->setAssetAddDate($assetAddDate);
			 $this->setRemark($remark);
			 $this->setUserId($userId);
		}
		
		//****************************************************************//
		//** Method Getter,Setter ของ Class Asset
		//****************************************************************//
		function getAssetId()
		{
			return $this->assetId;
		}
		
		function setAssetId($assetId)
		{
			$this->assetId = $assetId;
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