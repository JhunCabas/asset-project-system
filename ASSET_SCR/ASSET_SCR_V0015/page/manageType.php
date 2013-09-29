<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : manageType.php 
//** คำอธิบาย : ไฟล์นี้เป็น หน้าจัดการประเภทครุภัณฑ์
//** Version : 1.0
//** CoddingDate : 13/08/2556
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//
?>
	<div class="manage">
        <h1><img src="../image/assetBanner.png"></h1>
        <div id="hdrType" class="manageType"><center>
        <center><font size="5px;">การจัดการประเภทครุภัณฑ์</font></center>
        </br>
        <input id="searchType" type="text" placeholder="ชื่อประเภทครุภัณฑ์" value="" onKeyDown="searchType(event);"/>
        <a class="button big icon search" onClick="searchType(event);">ค้นหา</a>
         </br>
            </br>
            <a class="button big icon add" onClick="showAddType();">เพิ่มประเภทครุภัณฑ์</a>
        </center></div>
        <div id="addType" class="manageContent" style="display:none;"></div></br>
        	<div id="showType">
               <?php
					include_once("../page/tableType.php");
				?>
            </div>
	</div>