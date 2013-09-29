<?php

	
	define("dbHost","localhost");
	define("dbUser","root");
	define("dbPass","");
	define("dbName","b542150005_workshop");
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