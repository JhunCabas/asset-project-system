
            <?php

			include_once("../class/Config.php");
			include_once("../class/Asset.php");
			
			$showYear = new Asset();
			$dbAsset= new config();

			$arr = $showYear->getShowAssetYear();
            
			
			?>
            
            <select id="assetYear" onchange="changeYear();">
            <option value="0000">ประจำปี</option>
            <?php
			while($row=$dbAsset->fetch_array($arr)) {


			
			
				echo "<option value='".$row['assetYear']."'>";
				echo $row['assetYear']."</option>";
			}
			 ?>
             </select>
           