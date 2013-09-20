
	<div class="manage">
        <h1><img src="../image/assetBanner.png"></h1>
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
        	<div id="showType">
               <?php
				include_once("../page/tableUser.php");
				?>
            </div>
        </div>
        
	</div>