
            <?php

			include_once("../class/Config.php");
			include_once("../class/Asset.php");
			
			$showAsset = new Asset();
			$dbAsset= new config();
			

			$year = $_GET['assetYear'];
			/*
			$year = $_GET['assetYear'];
			$Type = $_GET['assetType'];
			$Group = $_GET['assetGroup'];
			$asset = $_GET['assetCode'];
			*/
			//$yearS = $year-543; 

			
			$arrType = $showAsset->getShowAssetTypeByYear($year);
            
			
			?>
            
            <select id="assetTypeQR" onchange="changeTypeQR();">
            <option value="00">ประเภทครุภัณฑ์</option>
            <?php
			while($row=$dbAsset->fetch_array($arrType)) {

			
			
				echo "<option value='".$row['assetTypeCode']."'>";
				echo  $row['assetTypeCode']." ".$row['assetTypeName']."</option>";
			}
			 ?>
             </select>
        