<?php
session_start();

	include_once("class/User.php");
	$user = new User();
	
if ($user->get_session())
{
   header("location: page/main.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>ลงชื่อเข้าใช้ระบบ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="css/custom.css" rel="stylesheet" type="text/css" />
    <link href="css/normalise.css" rel="stylesheet" type="text/css" />
    <link href="css/loginStyle.css" rel="stylesheet" type="text/css" />
    <link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="css/jquery-ui-1.8.10.custom" rel="stylesheet" type="text/css"/>
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
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$login = $user->login($_POST["uname"], $_POST["passwd"]);
	if ($login) {
	   header("location: page/main.php");
	   
	} 	
}
?>
