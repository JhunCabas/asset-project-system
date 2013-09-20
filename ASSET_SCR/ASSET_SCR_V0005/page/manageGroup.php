
	<div class="manage">
        <h1><img src="../image/assetBanner.png"></h1>
        <div id="hdrGroup" class="manageType"><center>
            </br></br>
            ค้นหาตามประเภทครุภัณฑ์ : 
            <?php

			include_once("../class/Config.php");
			include_once("../class/AssetType.php");
			
			$showType = new AssetType();
			$dbType= new config();

			$arr = $showType->getAssetType();
            
			?>
            <select name="assetType">
            <option value="">ประเภทครุภัณฑ์</option>
            <?php
			while($row=$dbType->fetch_array($arr)) {
			?>
            <?php
				echo "<option value='".$row['id']."'>";
				echo $row['assetTypeCode']." ".$row['assetTypeName']."</option>";
				?>
      
                <?php
			}
			 ?>
             </select>
             <?php
            	echo "<a class='button big icon search'>ค้นหา</a>";
			?>
            <a class="button big icon add" onClick="showAddGroup();">เพิ่มหมวดครุภัณฑ์</a>
        </center></div></br>
        <div id="addGroup" class="manageContent" style="display:none;"></div>
            <div id="showGroup"></br>sds
               <?php
				include_once("../page/tableGroup.php");
				?>
            </div>
    </div>
