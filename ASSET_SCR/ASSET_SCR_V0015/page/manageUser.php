<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : manageUser.php 
//** คำอธิบาย : ไฟล์นี้เป็น หน้าจัดการผู้ใช้งานระบบ
//** Version : 1.0
//** CoddingDate : 13/08/2556
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//
?>
	<div class="manage"><h1><img src="../image/assetBanner.png"></h1>
        <div id="test" class="manageType"><center>
            <font size="5px;">การจัดการผู้ใช้งานระบบ</font>
            </br></br>
            <a class="button big icon add" onclick="showAddUser();">เพิ่มผู้ใช้งานระบบ</a>
        	</center>
        </div>
        	</br>
            <div id="addUser" class="manageContent" style="display:none;"></div>
            <div id="showUser">
               <?php
				include_once("../page/tableUser.php");
				?>
            </div>
	</div>
    
    