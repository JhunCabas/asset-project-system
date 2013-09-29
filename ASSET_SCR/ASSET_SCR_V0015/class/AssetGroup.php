<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ AssetGroup.php 
//** คำอธิบาย : ไฟล์นี้เป็น Class AssetGroup เก็บ Attribute และ Method ของ AssetGroup
//** Version : 1.0
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//

	include_once "Config.php";

	class AssetGroup{
		//****************************************************************//
		//** Attribute ของ Class AssetGroup 
		//****************************************************************//
		private $assetGroupId;
		private $assetGroupCode;
		private $assetGroupName;
		private $assetTypeId;
		private $mysql;
		private $error;
			
		public function __construct(){
			$db= new Config();
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล หมวดครุภัณฑ์
		//****************************************************************//
		function getAssetGroup()
		{
			
			return mysql_query('SELECT A.assetGroupId,
			A.assetGroupCode,
			A.assetGroupName,
			B.assetTypeCode 
			FROM assetgroup AS A,
			assettype AS B 
			WHERE B.assetTypeId = A.assetTypeId 
			ORDER BY B.assetTypeCode,
			A.assetGroupCode ASC');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล หมวดครุภัณฑ์ ด้วยประเภท
		//****************************************************************//
		function getAssetGroupByType($assetTypeId)
		{
			
			return mysql_query('SELECT A.assetGroupId,
			A.assetGroupCode,
			A.assetGroupName,
			B.assetTypeCode 
			FROM assetgroup AS A,
			assettype AS B 
			WHERE B.assetTypeId = A.assetTypeId 
			AND B.assetTypeId = "'.$assetTypeId.'" 
			ORDER BY B.assetTypeCode,A.assetGroupCode ASC');
		}
		
		//****************************************************************//
		//** Method เช็คข้อมูล หมวดครุภัณฑ์
		//****************************************************************//
		function checkAssetGroup()
		{
			
			return mysql_query('SELECT * FROM assetgroup 
			WHERE assetGroupCode="'.$this->getAssetGroupCode().'" 
			AND assetTypeId="'.$this->getAssetTypeId().'"');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล หมวดครุภัณฑ์ ไปแก้ไข
		//****************************************************************//
		function getEditAssetGroup()
		{
			return mysql_query('SELECT A.assetGroupId,
			A.assetGroupCode,
			A.assetGroupName,
			B.assetTypeCode 
			FROM assetgroup AS A,
			assettype AS B 
			WHERE B.assetTypeId = A.assetTypeId
			AND A.assetGroupId = "'.$this->getAssetGroupId().'" LIMIT 1');
		}
		
		//****************************************************************//
		//** Method แก้ไขข้อมูล หมวดครุภัณฑ์
		//****************************************************************//
		function editAssetGroup()
		{
			
			return mysql_query('UPDATE assetgroup 
			SET assetGroupName="'.$this->getAssetGroupName().'" 
			WHERE assetGroupId="'.$this->getAssetGroupId().'"');
		}
		
		//****************************************************************//
		//** Method เพิ่มข้อมูล หมวดครุภัณฑ์
		//****************************************************************//
		function addAssetGroup()
		{
			 mysql_query('INSERT INTO assetgroup (assetGroupCode,
			 assetGroupName,
			 assetTypeId)
			 VALUES ("'.$this->getAssetGroupCode().'",
			 "'.$this->getAssetGroupName().'",
			 "'.$this->getAssetTypeId().'")');
			 return true;
		}
		
		//****************************************************************//
		//** Method ลบข้อมูล หมวดครุภัณฑ์
		//****************************************************************//
		function delAssetGroup()
		{
			 mysql_query('DELETE FROM assetgroup WHERE assetGroupId="'.$this->getAssetGroupId().'"');
			 return true;
		}
		
		//****************************************************************//
		//** Method set ข้อมูลรวม หมวดครุภัณฑ์
		//****************************************************************//
		function setValues($assetGroupCode,$assetGroupName,$assetTypeId)
		{
			
			 $this->setAssetGroupCode($assetGroupCode);
			 $this->setAssetGroupName($assetGroupName);
			 $this->setAssetTypeId($assetTypeId);
		}

		//****************************************************************//
		//** Method Getter,Setter ของ Class AssetGroup 
		//****************************************************************//
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