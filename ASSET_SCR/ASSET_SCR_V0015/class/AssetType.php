<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ AssetType.php 
//** คำอธิบาย : ไฟล์นี้เป็น Class AssetType เก็บ Attribute และ Method ของ AssetType
//** Version : 1.0
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//
	include_once "Config.php";

	class AssetType{
		//****************************************************************//
		//** Attribute ของ Class AssetType 
		//****************************************************************//
		private $assetTypeId;
		private $assetTypeCode;
		private $assetTypeName;
		private $mysql;
		private $error;
			
		public function __construct(){
			$db= new Config();
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ประเภทครุภัณฑ์ แบบค้นหาด้วยชื่อ
		//****************************************************************//
		function getAssetSearch($search)
		{
			
			return mysql_query('SELECT assetTypeId,
			assetTypeCode,
			assetTypeName 
			FROM assettype 
			WHERE assetTypeName LIKE "%'.$search.'%" 
			ORDER BY assetTypeCode ASC');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ประเภทครุภัณฑ์
		//****************************************************************//
		function getAssetType()
		{
			
			return mysql_query('SELECT assetTypeId,
			assetTypeCode,
			assetTypeName 
			FROM assettype 
			ORDER BY assetTypeCode ASC');
		}
		
		//****************************************************************//
		//** Method เช็คข้อมูล ประเภทครุภัณฑ์
		//****************************************************************//
		function checkAssetType($assetTypeCode)
		{
			
			return mysql_query('SELECT assetTypeId,
			assetTypeCode,
			assetTypeName 
			FROM assettype 
			WHERE assetTypeCode="'.$assetTypeCode.'"');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ประเภทครุภัณฑ์ ไปแก้ไข
		//****************************************************************//
		function getEditAssetType()
		{
			
			return mysql_query('SELECT assetTypeId,
			assetTypeCode,
			assetTypeName 
			FROM assettype 
			WHERE assetTypeId = "'.$this->getAssetTypeId().'" 
			ORDER BY assetTypeCode ASC LIMIT 1');
		}
		
		//****************************************************************//
		//** Method แก้ไขข้อมูล ประเภทครุภัณฑ์
		//****************************************************************//
		function editAssetType()
		{
			
			return mysql_query('UPDATE assettype 
			SET assetTypeName="'.$this->getAssetTypeName().'" 
			WHERE assetTypeId="'.$this->getAssetTypeId().'"');
		}
		
		//****************************************************************//
		//** Method เพิ่มข้อมูล ประเภทครุภัณฑ์
		//****************************************************************//
		function addAssetType()
		{
			 mysql_query('INSERT INTO assettype (assetTypeCode,
			 assetTypeName)
			 VALUES ("'.$this->getAssetTypeCode().'",
			 "'.$this->getAssetTypeName().'")');
			 return true;
		}
		
		//****************************************************************//
		//** Method ลบข้อมูล ประเภทครุภัณฑ์
		//****************************************************************//
		function delAssetType()
		{
			 mysql_query('DELETE FROM assettype WHERE assetTypeId="'.$this->getAssetTypeId().'"');
			 return true;
		}
		
		//****************************************************************//
		//** Method set ข้อมูลรวม ประเภทครุภัณฑ์
		//****************************************************************//
		function setValues($assetTypeCode,$assetTypeName)
		{
			
			 $this->setAssetTypeCode($assetTypeCode);
			 $this->setAssetTypeName($assetTypeName);
			
		}
		
		//****************************************************************//
		//** Method Getter,Setter ของ Class AssetType 
		//****************************************************************//
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