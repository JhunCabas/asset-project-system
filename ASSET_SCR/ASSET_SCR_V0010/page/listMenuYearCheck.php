
            <?php

			include_once("../class/Config.php");
			include_once("../class/CheckAsset.php");
			
			$showYear = new CheckAsset();
			$dbAsset= new config();

			$arr = $showYear->getShowAssetYear();
            
			
			?>
            
            <select id="assetYearCheck" onchange="changeYearCheck();">
            <option value="0000">ประจำปี</option>
            <?php
			while($row=$dbAsset->fetch_array($arr)) {
			$selDate = $row['assetYear'];

			
			
				echo "<option value='".$selDate."'>";
				echo $selDate."</option>";
			}
			 ?>
             </select>
           