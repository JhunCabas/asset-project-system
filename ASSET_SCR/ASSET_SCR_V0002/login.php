<?php
session_start();
if($ses_userid =$_SESSION['ses_userid']&&$ses_username = $_SESSION['ses_username']){
	//header("Location:main.php");
}
else{
$username = $_POST['username'];
$_SESSION['ses_userid'] = session_id();
$_SESSION['ses_username'] = $username;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/pure-min.css" rel="stylesheet" type="text/css" />
<link href="css/buttonStyle.css" rel="stylesheet" type="text/css" />
<title>Login...</title>
</head>
<body>
<div class="containerLogin">
    <div class="login">
    <h1><img src="image/assetBanner.png"></h1>
        
        <?php
			if($username=="admin"){
				echo "<meta http-equiv='refresh' content='3;URL=main.php' />";
				echo "<p align='center'><font size='5px;'>ยินดีต้อนรับ คุณ";
				echo $username ;
				echo "</font><p align='center'><font size='5px;'>... เข้าสู้ระบบจัดการครุภัณฑ์มูลค่าต่ำกว่าเกณฑ์ ...</font></p>";
			}
			else{
				echo "<meta http-equiv='refresh' content='3;URL=index.php' />";
				echo "<p align='center'><font size='5px;'>คุณยังไม่ได้ใส่ลงทะเบียนเข้าใช้งาน</font>";
			}
		?>
        
        </p>
    </div>
</div>
</body>
</html>
<?php
}
?>