<?php
class Mysql
{
	var $link;
	
	function connect($host,$user,$pass,$db,$multi=false)
	{
		$this->link = mysql_connect($host,$user,$pass,$db,$multi=false);
		mysql_select_db($db,$this->link);
		mysql_query('SET NAMES "utf8"',$this->link);
		return $this->link;
	}
	
	function query($command)
	{
		$query = mysql_query($command,$this->link);
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