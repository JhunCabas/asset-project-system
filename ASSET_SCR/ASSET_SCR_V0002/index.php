<?php
ob_start(); 
	session_start(); 

		if($_SESSION["POSITION"]!="Administrator"){
			if($_SESSION["POSITION"]!="Officer"){
				header("location: index.php");
			}
		}
	
	include_once("includes/config.php");
	include_once("includes/class_mysql.php");
	include_once("class/class_Student.php");
	include ("showtime.php");
	
	$db = new DB();
	$stdEditForm = new Student();
	$db->connectdb(DB_NAME,DB_USER,DB_PASS);*/
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
<center>
<div id="dialog"></div>
<?php include ("page/loginPage.php"); ?>
</center>

<script type="text/javascript" src="js/validate.js"></script> 
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script>
</body>
</html>