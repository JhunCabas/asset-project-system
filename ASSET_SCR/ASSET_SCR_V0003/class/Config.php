<?php

	/*
	define("DB_HOST","localhost");
	define("DB_USER","root");
	define("DB_PASS","");
	define("DB_NAME","b542150005_workshop");
	*/
	 $db_host = "localhost";
	 $db_user = "root";
	 $db_pass = "";
	 $db_name = "b542150005_workshop";



	class Config{

		public function __construct()
		{
				$con=mysql_connect("localhost","root","") or die("Cannot connect to database server!");
				mysql_query("SET NAMES UTF8");
				mysql_select_db("b542150005_workshop",$con);
				
			}
			
			
		function query($command)
		{
			$query = mysql_query($command);
			if(!$query)die(mysql_error());
			return $query;
			
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