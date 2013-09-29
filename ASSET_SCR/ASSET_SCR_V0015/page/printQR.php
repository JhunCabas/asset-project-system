<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : printQR.php 
//** คำอธิบาย : ไฟล์นี้  แสดง QR CODE
//** Version : 1.0
//** CoddingDate : 17/09/2556
//** Credit : ณัฐชัย สุริยะ
//****************************************************************//
//****************************************************************//

		include_once("../class/Config.php");
		include_once("../class/Asset.php");
		
		$QRAsset = new Asset();
		$dbAsset= new config();
		
		$year = $_GET['QRyear'];
		$type = $_GET['QRtype'];
		$group = $_GET['QRgroup'];
		$assetS = $_GET['QRassS'];
		$assetE = $_GET['QRassE'];
	
		$arr = $QRAsset->getShowAssetBetween($year,$type,$group,$assetS,$assetE);

		$rows=$dbAsset->num_rows($arr);
		$x = ceil($rows/4);
		echo "<center><table border='2'>";
		for($r=1;$r<=$x;$r++){
			echo "<tr>";
				for($c=1;$c<=4;$c++){
					$i=0;
					$j=4;
					while($row=$dbAsset->fetch_array($arr)) {
						$shrtDate = $row['assetYear'];
						$yearS = substr($shrtDate,2,4);
						$width = $height = 130; 
						$encode = base64_encode(base64_encode(base64_encode($row['checkId'])));
						$url = urlencode("http://110.164.78.161/~b542150005/login.php?checkId=".$encode); 
						
						echo "<td>";
						echo "<img src=\"http://chart.googleapis.com/chart?chs={$width}x{$height}&cht=qr&chl=$url\" />"; 
						echo "</br><center>".$yearS."/".$row['assetTypeCode']."-".$row['assetTypeCode']."".$row['assetGroupCode'];
						echo "-".$row['assetCode']."</center></td>";
							$i++;
							if($i==$j){
								echo "</tr>";
								$j=$j+4;
							}
					}
				}
		}
		echo "</table></center>";
		echo "<script type=\"text/javascript\">";  
		echo "window.print();";  
		echo "</script>";
	?>
				
					
	