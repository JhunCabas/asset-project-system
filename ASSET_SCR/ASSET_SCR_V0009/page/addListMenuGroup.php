
            <?php

			include_once("../class/Config.php");
			include_once("../class/AssetGroup.php");

			$showGroup = new AssetGroup();
			$dbGroup= new config();

			$searchType = $_GET["assetTypeCode"];
			$arr = $showGroup->getAssetGroupByType($searchType);
            
			?>*
            <select id="addAssetGroup">
            <option value="00">หมวดครุภัณฑ์</option>
            <?php
			while($rowG=$dbGroup->fetch_array($arr)) {
			?>
            <?php
				echo "<option value='".$rowG['assetGroupCode']."'>";
				echo $rowG['assetTypeCode']."".$rowG['assetGroupCode']." ".$rowG['assetGroupName']."</option>";
				?>
      
                <?php
			}
			 ?>
             </select>
           