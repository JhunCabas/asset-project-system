<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : manageMain.php 
//** คำอธิบาย : ไฟล์นี้เป็น หน้าหลักครุภัณฑ์
//** Version : 1.0
//** CoddingDate : 13/08/2556
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//
?>
	<div class="manage"><h1><img src="../image/assetBanner.png"></h1>
        <div id="test">
            <center><font size="5px;">การตรวจเช็คครุภัณฑ์มูลค่าต่ำกว่าเกณฑ์ประจำปี</font></center>
            <center></br></br>
            <a class="button big icon search" onClick="getTableMain(0);" style="width:150px">ยังไม่ได้ตรวจเช็ค</a>
            <a class="button big icon search" onClick="getTableMain(1);" style="width:150px">ใช้งานได้</a>
            <a class="button big icon search" onClick="getTableMain(2);" style="width:150px">ชำรุด</a>
            <a class="button big icon search" onClick="getTableMain(3);" style="width:150px">เสื่อมสภาพ</a>
            </center></div>
            <center></br></br>
                <div id="showMain"></div>
            </center>
        </div>
    </div>