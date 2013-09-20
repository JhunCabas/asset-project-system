<style type="text/css">
body{
	font-size:12px;	
}
.textAlignVer{
	display:block;
	writing-mode: tb-rl;
	filter: flipv fliph;
	-webkit-transform: rotate(-90deg); 
	-moz-transform: rotate(-90deg);	
	transform: rotate(-90deg); 
	position:relative;
	width:20px;
	white-space:nowrap;
	font-size:12px;
	margin-bottom:10px;
}
</style>
            <?php
			include_once("../class/Config.php");
			include_once("../class/Asset.php");
			
			$QRAsset = new Asset();
			$dbAsset= new config();
			
			$year = $_GET['QRyear'];
			$type = $_GET['QRtype'];
			$group = $_GET['QRgroup'];
			$assetS = $_GET['QRassS'];
			$assetE = $_GET['QRassE'];
			
			$arr = $QRAsset->getShowAssetBetween($year,$type,$group,$assetS,$assetE)
			?>
            <?php
					while($row=$dbAsset->fetch_array($arr)) {
						$shrtDate = $row['assetYear'];
						$yearS = substr($shrtDate,2,4);
						$width = $height = 130; 
						$encode = base64_encode(base64_encode(base64_encode($row['id'])));
						//$encode = $row['id'];
						$url = urlencode("http://110.164.78.161/~b542150005/login.php?id=".$encode); 
						?>
						
						<?php
						
						echo "".$yearS."/".$row['assetTypeCode']."-".$row['assetTypeCode']."".$row['assetGroupCode'];
						echo "-".$row['assetCode']."";
						echo "<img src=\"http://chart.googleapis.com/chart?chs={$width}x{$height}&cht=qr&chl=$url\" />"; 
					}
					echo "<script type=\"text/javascript\">";  
					echo "window.print();";  
					echo "</script>";
					 
    				
    				

				?>
					
						
		