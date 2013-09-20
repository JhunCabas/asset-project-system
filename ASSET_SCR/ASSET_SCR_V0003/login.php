<?php

	ob_start(); 
	@session_start();
		
	include_once("config/config.php");
	include_once("class/Mysql.php");
	
	if(isset($_POST["submitBtm"]))
	{
		include_once("class/User.php");
		$user = new User();
		$user->login();
	}
	else{
			echo "<script language='javascript'>alert('ไม่พบข้อมูล')</script>";
		}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>ลงชื่อเข้าใช้ระบบ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link href="css/pure-min.css" rel="stylesheet" type="text/css" />
    <link href="css/buttonStyle.css" rel="stylesheet" type="text/css" />
	
</head>
<body>
    
</body>
</html>
