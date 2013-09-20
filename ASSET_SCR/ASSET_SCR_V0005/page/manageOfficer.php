<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MANAGE</title>
<link href="../css/manage.css" rel="stylesheet" type="text/css" />
<link href="../css/buttonStyle.css" rel="stylesheet" type="text/css" />
<link href="../css/tableStyle.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="../js/jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script>
<script src="../js/jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script>
<script src="../js/manage.js" type="text/javascript"></script>
</head>
<body>
<div class="container">
	<div class="menu">
   		<h1>เมนู</h1>
        <center><font>ยินดีต้อนร้บ</font></br></br>
        คุณณัฐชัย สุริยะ</br>
        USER : ผู้ดูแลระบบ</br></br></center>
        <div class="button-groups">
        	<a href="../main.php" class="button big icon home" style="width:145px;">หน้าหลัก</a></br>
            <a href="../manageUser.php" class="button big icon user" style="width:145px;">จัดการผู้ใช้</a></br>
            <a href="../manageType.php" class="button big icon add" style="width:145px;">จัดการประเภทครุภัณฑ์</a></br>
            <a href="../manageGroup.php" class="button big icon add" style="width:145px;">จัดการหมวดครุภัณฑ์</a></br>
            <a href="../manageAsset.php" class="button big icon add" style="width:145px;">จัดการครุภัณฑ์</a></br>
            <a href="../checkAsset.php" class="button big icon approve" style="width:145px;">ตรวจเช็คครุภัณฑ์</a></br>
            <a href="../printReport.php" class="button big icon log" style="width:145px;">พิมพ์รายงาน</a></br>
            <a href="../logout.php" class="button big icon unlock danger" style="width:145px;">ลงชื่อออกจากระบบ</a>
        </div>
	</div>
</div>
<div class="containerContent">
	<div class="manage">
        <h1><img src="../image/assetBanner.png"></h1>
        หน้าหลัก
        <div id="test" class="mainContent">
            <center><font size="5px;">การตรวจเช็คครุภัณฑ์มูลค่าต่ำกว่าเกณฑ์ประจำปี</font></center>
        	<center></br>การตรวจเช็คประจำปี : 2556</br></br></center>
                <a  class="button icon search">ตรวจเช็คแล้ว</a>
                <a  class="button icon search">ยังไม่ได้ตรวจเช็ค</a>
                <a  class="button icon search">ใช้งานได้</a>
                <a  class="button icon search">ชำรุดเสียหาย</a>
                <a  class="button icon search" onClick="getdataLost();">สูญหาย</a>
        	</center>
         </div>
          <div id="List2" class="mainContent">
          	
        	<center>
            มีครุภัณฑ์สูญหายจำนวน : 2 ชิ้น </br></br>
            <div id="lostList"><table></table></div></center>
        	</div>
         
     </div>
</div>

</body>
</html>
