
            <?php

			include_once("../class/Config.php");
			include_once("../class/Asset.php");
			include_once("../class/AssetType.php");
			include_once("../class/AssetGroup.php");
			
			$showAsset = new Asset();
			$showType = new AssetType();
			$showGroup = new AssetGroup();
			$dbAsset= new config();
			
			$year = "2556";
			$Type = "01";
			$Group = "01";
			$asset = "001";
			/*
			$year = $_GET['assetYear'];
			$Type = $_GET['assetType'];
			$Group = $_GET['assetGroup'];
			$asset = $_GET['assetCode'];
			*/
			$yearS = $year-543; 

			$command = "WHERE assetAddDate LIKE '%".$year."%' AND assetTypeCode = '".$type."' AND assetGroupCode = '".$group."'";
			
			$arrYear = $showAsset->getShowAssetYear();
			$arrType = $showType->getAssetType();
			//$showGroup->setAssetTypeCode($arrType);
			$arrGroup = $showGroup->getAssetGroupByType("01");
			$arrAsset = $showAsset->getAssetBy($command);
            
			
			?>
            
            <select id="assetYearQR" onchange="changePrintQR();">
            <option value="0000">ประจำปี</option>
            <?php
			while($row=$dbAsset->fetch_array($arrYear)) {
			$selDate = $row['years'];
			$year = $selDate+543;

			
			
				echo "<option value='".$year."'>";
				echo $year."</option>";
			}
			 ?>
             </select>
             
              <select id="assetTypeQR" onchange="changePrintQR();">
            <option value="00">ประเภทครุภัณฑ์</option>
            <?php
			while($rows=$dbAsset->fetch_array($arrType)) {
			?>
            <?php
				echo "<option value='".$rows['assetTypeCode']."'>";
				echo $rows['assetTypeCode']." ".$rows['assetTypeName']."</option>";
				?>
      
                <?php
				
			}
			
			 ?>
             </select>
             
             <select id="assetGroupQR" onchange="changePrintQR();">
            <option value="00">หมวดครุภัณฑ์</option>
            <?php
			while($rowG=$dbAsset->fetch_array($arrGroup)) {
			?>
            <?php
				echo "<option value='".$rowG['assetGroupCode']."'>";
				echo $rowG['assetTypeCode']."".$rowG['assetGroupCode']." ".$rowG['assetGroupName']."</option>";

			}
			 ?>
             </select>
             
                <select id="assetQR" onchange="changePrintQR();">
            <option value="00">เริ่มต้น</option>
            <?php
			while($rowA=$dbAsset->fetch_array($arrAsset)) {
			?>
            <?php
				echo "<option value='".$rowA['assetTypeCode']."'>";
				echo $rowA['assetTypeCode']."</option>";
			}
			 ?>
             </select>
           