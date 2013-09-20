<?php
class AssetType
{
	var $id = 0;
	var $assetTypeCode = '';
	var $assetTypeName ='';
	var $assetTypeAddDate ='';
	var $mysql;
	var $error;

	function AssetType($mysql)
	{
		$this->mysql = $mysql;
	}
	function getAssetType()
	{
		return $this->mysql->query('SELECT student_name FROM student');
	}
	function insertAssetType()
	{
	
		
		$now=date("Y-m-d H:i:s");
		 $this->mysql->query('INSERT INTO assettype (assetTypeCode,assetTypeName,assetTypeAddDate)
		  VALUES ("'.$this->getAssetTypeCode().'",
		 "'.$this->getAssetTypeName().'",
		 " ")');
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