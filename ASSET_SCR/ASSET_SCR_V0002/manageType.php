<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MANAGE</title>
<link href="css/manage.css" rel="stylesheet" type="text/css" />
<link href="css/buttonStyle.css" rel="stylesheet" type="text/css" />
<link href="css/tableStyle.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script>
<script src="js/manage.js" type="text/javascript"></script>
</head>
<body>
<div id="dialog"></div>
<div class="container">
	<div class="menu">
   		<h1>เมนู</h1>
        <center><font>ยินดีต้อนร้บ</font></br></br>
        คุณณัฐชัย สุริยะ</br>
        USER : ผู้ดูแลระบบ</br></br></center>
        <div class="button-groups">
        	<a href="main.php" class="button big icon home" style="width:145px;">หน้าหลัก</a></br>
            <a href="manageType.php" class="button big icon add" style="width:145px;">จัดการประเภทครุภัณฑ์</a></br>
            <a href="manageGroup.php" class="button big icon add" style="width:145px;">จัดการหมวดครุภัณฑ์</a></br>
            <a href="manageAsset.php" class="button big icon add" style="width:145px;">จัดการครุภัณฑ์</a></br>
            <a href="manageUser.php" class="button big icon user" style="width:145px;">จัดการผู้ใช้</a></br>
            <a href="checkAsset.php" class="button big icon approve" style="width:145px;">ตรวจเช็คครุภัณฑ์</a></br>
            <a href="printReport.php" class="button big icon log" style="width:145px;">พิมพ์รายงาน</a></br>
            <a href="index.php" class="button big icon unlock danger" style="width:145px;">ลงชื่อออกจากระบบ</a>
        </div>
	</div>
</div>
<div class="containerContent">
	<div class="manage">
        <h1><img src="image/assetBanner.png"></h1>
        การจัดการประเภทครุภัณฑ์
        <div class="manageType"><center>
        <center><font size="5px;">การจัดการประเภทครุภัณฑ์</font></center>
            </br>
            ค้นหาประเภทครุภัณฑ์ : 
            <input type="text" placeholder="ค้นหา">
            <a href="manage.php" class="button icon search">ค้นหา</a>
            <a class="button icon add" onClick="showAddType();">เพิ่มประเภทครุภัณฑ์</a>
        </center></div>
        <div id="addType" class="manageContent" style="display:none;">
            <center>
            เพิ่มข้อมูลประเภทครุภัณฑ์ </br></br>
            <input id="assetTypeCode" type="text" placeholder="รหัสประเภท" width="100px">
            <input id="assetTypeName" type="text" placeholder="ชื่อประเภท">
            <a class="button icon approve" onClick="addAssetType();">เพิ่ม</a>
            </center>
        </div>
        
        <div id="List1" class="manageContent">
        	<center><div id="typeList"><table></table></div></center>
        </div>
        
	</div>
    
</div>
</body>
</html>