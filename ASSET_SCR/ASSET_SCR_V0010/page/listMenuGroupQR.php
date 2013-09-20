
            <?php

			include_once("../class/Config.php");
			include_once("../class/Asset.php");
			
			$showAsset = new Asset();
			$dbAsset= new config();
			
			$year = $_GET['assetYear'];
			$type = $_GET['assetType'];
			/*
			$year = $_GET['assetYear'];
			$Type = $_GET['assetType'];
			$Group = $_GET['assetGroup'];
			$asset = $_GET['assetCode'];
			*/
			//$yearS = $year-543; 

			
			$arrGroup = $showAsset->getShowAssetGroupByType($year,$type);
            
			
			?>
            
            <select id="assetGroupQR" onchange="changeGroupQR();">
            <option value="0000">หมวดครุภัณฑ์</option>
            <?php
			while($row=$dbAsset->fetch_array($arrGroup)) {

			
			
				echo "<option value='".$row['assetGroupCode']."'>";
				echo  $row['assetTypeCode']."".$row['assetGroupCode']." ".$row['assetGroupName']."</option>";
			}
			 ?>
             </select>
        