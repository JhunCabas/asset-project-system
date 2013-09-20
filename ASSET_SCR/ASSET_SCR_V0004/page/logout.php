<?php 
session_start();

$_SESSION['login'] = FALSE;
session_destroy();
echo "<meta http-equiv='refresh' content='0;URL=../index.php' />";
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>ลงชื่อเข้าใช้ระบบ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/loginStyle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link href="css/pure-min.css" rel="stylesheet" type="text/css" />
    <link href="css/buttonStyle.css" rel="stylesheet" type="text/css" />
	
</head>
<body>
<center>
<div id="dialog"></div>
sdsd
</center>
</body>
</html>