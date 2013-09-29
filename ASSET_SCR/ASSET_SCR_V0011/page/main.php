<?php
session_start();
	include_once("../class/User.php");
	include_once("../class/Config.php");
	$user = new User();
	$dbU = new Config();
	
	$usr = $_SESSION['uname'];
	$fname = $_SESSION['fName'];
	$lname = $_SESSION['lName'];
	$position = $_SESSION['position'];
	$status = $_SESSION['status'];

	$_SESSION["stat"] = $status;
	//echo $usr;
	if (!$user->getSession())
	{
	   header("location:index.php");
	}
	else{/*
		$user->setUsername('ssss');
		$user->setPassword('ssss');
		$user->setFirstName('ssss');
		$user->setLastName('ssss');
		$user->setPosition('ssss');
		$user->setStatus('Officer');
		$user->add();*/
		//$user->add("usss","psss","aaaa","bbbb","sd","Officer");
	}
?>
<!doctype html>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<title>MANAGE</title>
<link href="../css/custom.css" rel="stylesheet" type="text/css" />
<link href="../css/normalise.css" rel="stylesheet" type="text/css" />
<link href="../css/manage.css" rel="stylesheet" type="text/css" />
<link href="../css/buttonStyle.css" rel="stylesheet" type="text/css" />
<link href="../css/table.css" rel="stylesheet" type="text/css" />
<link href="../css/jquery-ui.css" rel="stylesheet"/>
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="../js/jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script>
<script src="../js/jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script>
<script src="../js/manage.js" type="text/javascript"></script>
<script src="../js/managePage.js" type="text/javascript"></script>
<script src="../js/showAdd.js" type="text/javascript"></script>
<script src="../js/validate.js" type="text/javascript"></script>

</head>
<body>
<div id="dialog"></div>
<div id="dialog2"></div>
<div class="container">
	<div class="menu">
   		<h1>เมนู</h1>
        <center><font>ยินดีต้อนร้บ</font></br></br>
        
		<?php
		echo "คุณ";
        echo $fname;
		echo "  ";
		echo $lname;
		echo " </br> ";
		echo " ตำแหน่ง : ";
		echo $position; 
		
		$arr = $user->getUserId($usr);
		$row = $dbU->fetch_array($arr);
		$uId = $row['id'];
		if($status=="Administrator"){
		
		?>
        </br></br>
        </center>
        <div class="button-groups">
        	<a class="button big icon home" style="width:145px;" onClick="showMainPage();">หน้าหลัก</a></br>
            <a class="button big icon user" style="width:145px;" onClick="showManageUser();">จัดการผู้ใช้</a></br>
            <a class="button big icon add" style="width:145px;" onClick="showManageType();">จัดการประเภทครุภัณฑ์</a></br>
            <a class="button big icon add" style="width:145px;" onClick="showManageGroup();">จัดการหมวดครุภัณฑ์</a></br>
            <a class="button big icon add" style="width:145px;" onClick="showManageAsset();">จัดการครุภัณฑ์</a></br>
            <a class="button big icon approve" style="width:145px;" onClick="showCheckAsset();">ตรวจเช็คครุภัณฑ์</a></br>
            <a class="button big icon log" style="width:145px;" onClick="showPrintReport();">พิมพ์รายงาน</a></br>
            <a class="button big icon key" style="width:145px;" onClick="getEditPass(<?php echo $uId ?>);">เปลี่ยนรหัสผ่าน</a></br>
            <a href="logout.php" class="button big icon unlock danger" style="width:145px;">ลงชื่อออกจากระบบ</a>
        </div>
        <?php
		}
		else if($status=="Officer"){
		?>
        </br></br>
        </center>
        <div class="button-groups">
        	<a class="button big icon home" style="width:145px;" onClick="showMainPage();">หน้าหลัก</a></br>
            <a class="button big icon add" style="width:145px;" onClick="showManageAsset();">จัดการครุภัณฑ์</a></br>
            <a class="button big icon approve" style="width:145px;" onClick="showCheckAsset();">ตรวจเช็คครุภัณฑ์</a></br>
            <a class="button big icon log" style="width:145px;" onClick="showPrintReport();">พิมพ์รายงาน</a></br>
            <a class="button big icon key" style="width:145px;" onClick="getEditPass(<?php echo $uId ?>);">เปลี่ยนรหัสผ่าน</a></br>
            <a href="logout.php" class="button big icon unlock danger" style="width:145px;">ลงชื่อออกจากระบบ</a>
        </div>
        <?php
		}
		else{
			header("location:index.php");
		}
		?>
	</div>
</div>
<div id="main" class="containerContent"></div>
</body>
</html>
