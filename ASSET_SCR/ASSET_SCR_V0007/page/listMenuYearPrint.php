
            <?php

			include_once("../class/Config.php");
			include_once("../class/CheckAsset.php");
			
			$showYear = new CheckAsset();
			$dbAsset= new config();

			$arr = $showYear->getShowAssetYear();
            
			
			?>
            
            <select id="assetYearPrint">
            <?php
			while($row=$dbAsset->fetch_array($arr)) {
			$selDate = $row['years'];
			$year = $selDate+543;

				echo "<option value='".$year."'>";
				echo $year."</option>";
			}
			 ?>
             </select>
           