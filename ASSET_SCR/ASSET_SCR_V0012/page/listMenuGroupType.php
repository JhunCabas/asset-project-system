
            <?php

			include_once("../class/Config.php");
			include_once("../class/AssetType.php");
			
			$showType = new AssetType();

			$dbType= new config();

			$arr = $showType->getAssetType();
            
			?>
            <select id="assetTypeG" onchange="changeGroupType();">
            <option value="00">ประเภทครุภัณฑ์</option>
            <?php
			while($rowT=$dbType->fetch_array($arr)) {
			?>
            <?php
				echo "<option value='".$rowT['assetTypeCode']."'>";
				echo $rowT['assetTypeCode']." ".$rowT['assetTypeName']."</option>";
				?>
      
                <?php
			}
			 ?>
             </select>