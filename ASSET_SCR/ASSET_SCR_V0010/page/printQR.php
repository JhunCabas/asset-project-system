
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
		
			$arr = $QRAsset->getShowAssetBetween($year,$type,$group,$assetS,$assetE);
			
					
					$rows=$dbAsset->num_rows($arr);
					$x = ceil($rows/4);
					
                    echo "<table>";
					
					for($r=1;$r<=$x;$r++){
						echo "<tr>";
						
							for($c=1;$c<=4;$c++){
								$i=0;
								while($row=$dbAsset->fetch_array($arr)) {
									$shrtDate = $row['assetYear'];
									$yearS = substr($shrtDate,2,4);
									$width = $height = 130; 
									$encode = base64_encode(base64_encode(base64_encode($row['id'])));
									//$encode = $row['id'];
									$url = urlencode("http://110.164.78.161/~b542150005/login.php?id=".$encode); 
									
									echo "<td>";
									echo "<img src=\"http://chart.googleapis.com/chart?chs={$width}x{$height}&cht=qr&chl=$url\" />"; 
									echo "</br><center>".$yearS."/".$row['assetTypeCode']."-".$row['assetTypeCode']."".$row['assetGroupCode'];
									echo "-".$row['assetCode']."</center></td>";
										$i++;
										if($i==4){
											echo "</tr>";
										}
								}
								
							}
						
						
					}
					echo "</table>";
					
					
					
					
					
					echo "<script type=\"text/javascript\">";  
					echo "window.print();";  
					echo "</script>";
					 
    				
    				

				?>
					
						
		