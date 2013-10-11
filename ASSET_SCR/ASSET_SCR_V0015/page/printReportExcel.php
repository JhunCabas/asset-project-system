<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : printReportExcel.php 
//** คำอธิบาย : ไฟล์นี้ ใช้พิมพ์ excel
//** Version : 1.0
//** CoddingDate : 15/09/2556
//** Credit : ณัฐชัย สุริยะ
//****************************************************************//
//****************************************************************//

	include_once("../class/Config.php");
	include_once("../class/CheckAsset.php");
	
	$assetChk = new CheckAsset();
	$db= new Config();
	$year = $_GET['assetYear'];
	$arrYear = $assetChk->getCheckYear($year);
	$arrCheck =  $assetChk->getCheckAssetByYear($year);
	
	header("Content-Type: application/vnd.ms-excel");
	header('Content-Disposition: attachment; filename="AssetY.xls"');#ชื่อไฟล์
	
?>


<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">
<html>
<head>

<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
<link href="../css/ReportStyle.css" rel="stylesheet" type="text/css" />
</head>
<body >

<style>
@import “css/ReportStyle.css”;
</style>


<div id="Asset_Excel"  class ="test" align=center x:publishsource="Excel"  >
        <table x:str border=0 cellpadding=0 cellspacing=0 width=100%>
        <tr>
            <th colspan=6 height=42 class="xl201">ทะเบียนครุภัณฑ์ต่ำกว่าเกณฑ์ ณ วันที่ 30
            <span>&nbsp; </span>กันยายน
            <span>&nbsp; </span>
            <?php 
				$ress = $db->fetch_array($arrYear);
				echo $ress['assetYear'];
			?></th>  
        </tr>
      	<tr>
			<th width="90" class="xl202">วัน/เดือน/ปี <br>ที่ได้มา</th>
            <th width="100" class="xl202">รหัสครุภัณฑ์</th>
            <th width="300" class="xl202">รายการ</th>
            <th width="100" class="xl202">ราคา / หน่วย</th>
            <th width="170" class="xl202">ใช้ประจำหน่วยงาน</th>
            <th width="213" class="xl202">สถานะการตรวจสอบ</th>     
        </tr>
       	 <?php while($res = $db->fetch_array($arrCheck)){
					$code = $res['assetTypeCode']."-".$res['assetGroupCode']."-".$res['assetCode'];
					$selDate = $res['assetAddDate'];
					$numberAsString = number_format($res['assetPrice'], 2);
					
					$dateM = substr($selDate,4,6);
					$text = substr($selDate,0,4);
					$year = $text+543;
					$dateType = $year."".$dateM;
					
					$datetime = DateTime::createFromFormat('Y-m-d',$dateType);
					$dateT = $datetime->format('d/m/Y');
					
					if($res['checkStatus']=="Y"){
						$stat = "ใช้งานได้";
					}
					else if($res['checkStatus']=="N"){
						$stat = "ชำรุด";
					}
					else if($res['checkStatus']=="D"){
						$stat = "เสื่อมสภาพ";
					}
					else{
						$stat = "-";
					}
					?>
        <tr>
        	<td class="xl203"><?php echo $dateT; ?> </td><br>
            <td class="xl201"><?php echo $code;?> </td><br>
            <td class="xl201"><?php echo $res['assetName'];?></td><br>
            <td class="xl201"><?php echo $res['assetPrice'];?></td><br>
			<td class="xl201"><?php echo $res['assetLocation'];?></td><br>
			<td class="xl201"><?php echo $stat;?></td><br>
        </tr>
        <?php }  ?>
    <td class="xl401" colspan=6  align="center">ลงชื่อ..........................................ประธานกรรมการ<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>ลงชื่อ....................................................กรรมการ<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>ลงชื่อ..............................................กรรมการ</td>
        </table>
</div>

</body>
</html>
