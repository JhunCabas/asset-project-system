
            <?php

			include_once("../class/Config.php");
			include_once("../class/Asset.php");
			
			$showAsset = new Asset();
			$dbAsset= new config();
		
			/*
			$year = $_GET['assetYear'];
			$Type = $_GET['assetType'];
			$Group = $_GET['assetGroup'];
			$asset = $_GET['assetCode'];
			*/
			//$yearS = $year-543; 

			
			$arrYear = $showAsset->getShowAssetYear();
            
			
			?>
            
            <select id="assetYearQR" onchange="changeYearQR();">
            <option value="0000">ประจำปี</option>
            <?php
			while($row=$dbAsset->fetch_array($arrYear)) {
			$selDate = $row['years'];
			//$year = $selDate+543;

			
			
				echo "<option value='".$row['assetYear']."'>";
				echo  $row['assetYear']."</option>";
			}
			 ?>
             </select>
        