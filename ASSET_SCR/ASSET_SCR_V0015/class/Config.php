<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ Asset.php 
//** คำอธิบาย : ไฟล์นี้เป็น Class Asset เก็บ Attribute และ Method ของ Asset
//** อัพเดท : 04/09/2556 สร้าง Attribute และ Method 
//** อัพเดท : 12/09/2556 แก้ไข Attribute และ Method ตาม diagram
//** อัพเดท : 15/09/2556 แก้ไข Method 
//** อัพเดท : 24/09/2556 แก้ไข Attribute และ Method ตาม diagramใหม่ 
//** อัพเดท : 28/09/2556 แก้ไข Method และเพิ่ม comment
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//
	
	define("dbHost","localhost");
	define("dbUser","root");
	define("dbPass","");
	define("dbName","dbAsset");
	/*
	$dbHost = "localhost";
	$dbUser = "root";
	$dbPass = "";
	$dbName = "b542150005_workshop";
	*/
	



	class Config{

		public function __construct()
		{
				$con=mysql_connect(dbHost,dbUser,dbPass) or die("Cannot connect to database server!");
				mysql_query("SET NAMES UTF8");
				mysql_select_db(dbName,$con);
				
			}
		
		function num_rows($command)
		{
			return mysql_num_rows($command);
		}
		
		function fetch_array($command)
		{
			return mysql_fetch_array($command);
		}
		
		function fetch_object($command)
		{
			return mysql_fetch_object($command);
		}
		
		function fetch_row($command)
		{
			return mysql_fetch_row($command);
		}
		
		function free_result($command)
		{
			return mysql_free_result($command);
		}
	}
?>