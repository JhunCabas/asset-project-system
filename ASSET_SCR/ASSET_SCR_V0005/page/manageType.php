
	<div class="manage">
        <h1><img src="../image/assetBanner.png"></h1>
        <div id="hdrType" class="manageType"><center>
        <center><font size="5px;">การจัดการประเภทครุภัณฑ์</font></center>
            </br>
            <a class="button big icon add" onClick="showAddType();">เพิ่มประเภทครุภัณฑ์</a>
        </center></div>
        <div id="addType" class="manageContent" style="display:none;"></div>
        	<div id="showType"></br>
               <?php
				include_once("../page/tableType.php");
				?>
            </div>
	</div>