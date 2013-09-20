<?php 
session_start();
unset ( $_SESSION['ses_userid'] );
unset ( $_SESSION['ses_username'] );
session_destroy();
echo "<meta http-equiv='refresh' content='2;URL=index.php' />";
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/pure-min.css" rel="stylesheet" type="text/css" />
<link href="css/buttonStyle.css" rel="stylesheet" type="text/css" />
<title>LogOut</title>
</head>
<body>
<div class="containerLogin">
    <div class="login">
    <h1><img src="image/assetBanner.png"></h1>
	<center>ออกจากระบบ</center>   
    </div>
</div>
    <p align="center"><font color="#FFFFFF"><br> Power By 542150005 ! </font></p>
  </section>
</div>
</body>
</html>