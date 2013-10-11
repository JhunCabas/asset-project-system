<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : tableAsset.php 
//** คำอธิบาย : ไฟล์นี้  แสดงตาราง Asset
//** Version : 1.0
//** CoddingDate : 11/09/2556
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//

	session_start();
	include_once("../class/Config.php");
	include_once("../class/Asset.php");
	
	$asset = new Asset();
	$db= new Config();
	
	$page = $_GET['selectedPage'];
	$iPage = 20;
	
?>
    <table class="table table-bordered">
        <thead>
            <tr>
            	<th style="width: 1%; text-align:center">ลำดับ</th>
                <th style="width: 5%; text-align:center">ประจำปี</th>
                <th style="width: 10%; text-align:center">เลขครุภัณฑ์</th>
                <th style="width: 15%; text-align:center">ชื่อครุภัณฑ์</th>
                <th style="width: 5%; text-align:center">ราคา</th>
                <th style="width: 10%; text-align:center">วัน/เดือน/ปี</br>ที่ได้มา</th>
                <th style="width: 10%; text-align:center">หมายเหตุ</th>
                <th style="width: 2%; text-align:center">แก้ไข</th>
                <?php
					if($_SESSION["stat"]=="Administrator"){ ?>
					<th style="width: 2%; text-align:center">ลบ</th>
				<?php } ?>
            </tr>
        </thead>
            <tbody>
            
<?php
	
	
	$searchCode = $_GET["searchCode"];
	$yearFull = $_GET["assetYear"];
	$type = $_GET["assetTypeCode"];
	$group = $_GET["assetGroupCode"];

	$commandSearch = "AND CONCAT(SUBSTR(C.assetYear,3,4),'/',A.assetTypeCode,'-',A.assetTypeCode,B.assetGroupCode,'-',C.assetCode) LIKE '%".$searchCode."%'";
	$commandYear = "AND C.assetYear = '".$yearFull."'";
	$commandType = "AND A.assetTypeId = '".$type."'";
	$commandGroup = "AND B.assetGroupId = '".$group."'";
	$commandYT = "AND C.assetYear = '".$yearFull."' AND A.assetTypeId = '".$type."'";
	$commandYTG = "AND C.assetYear = '".$yearFull."' AND A.assetTypeId = '".$type."' AND B.assetGroupId = '".$group."'";
	$commandTG = "AND C.assetTypeId = '".$type."' AND B.assetGroupId = '".$group."'";
	$commandYG = "AND C.assetYear = '".$yearFull."' AND B.assetGroupId = '".$group."'";

	$arrAll = $asset->getAsset();
	$arrYear = $asset->getAssetBy($commandYear);
	$arrType = $asset->getAssetBy($commandType);
	$arrGroup = $asset->getAssetBy($commandGroup);
	$arrYT = $asset->getAssetBy($commandYT);
	$arrTG = $asset->getAssetBy($commandTG);
	$arrYTG = $asset->getAssetBy($commandYTG);
	$arrYG = $asset->getAssetBy($commandYG);
	$arrSearch = $asset->getAssetBy($commandSearch);
	
	
	if($searchCode!=null){
		$cmd=$arrSearch;
	}
	else if($yearFull==null&&$type==null&&$group==null){
		$cmd=$arrAll;
	}
	else if($yearFull!="0000"&&$type=="00"&&$group=="00"){
		$cmd=$arrYear;
	}
	else if($yearFull=="0000"&&$type!="00"&&$group=="00"){
		$cmd=$arrType;
	}
	else if($yearFull=="0000"&&$type=="00"&&$group!="00"){
		$cmd=$arrGroup;
	}
	else if($yearFull!="0000"&&$type!="00"&&$group=="00"){
		$cmd=$arrYT;
	}
	else if($yearFull=="0000"&&$type!="00"&&$group!="00"){
		$cmd=$arrTG;
	}
	else if($yearFull!="0000"&&$type!="00"&&$group!="00"){
		$cmd=$arrYTG;
	}
	else if($yearFull!="0000"&&$type=="00"&&$group!="00"){
		$cmd=$arrYG;
	}
	else{
		$cmd=$arrAll;
	}
	
	if($page>=0&&$yearFull=="0000"&&$type=="00"&&$group=="00"&&$searchCode==null){
		$startPage = $page*$iPage;
		$endPage = 20;
		$arrL = $asset->getAssetLimit($startPage,$endPage);
		$arrA = $asset->getAsset();
		$cmd = $arrL;
		$cmdA = $arrA;
		$num = $db->num_rows($cmdA);
		$numPage = round($num/20);
	}
	else if($page==null&&$yearFull=="0000"&&$type=="00"&&$group=="00"&&$searchCode==null){
		$startPage = 0;
		$endPage = 20;
		$arrL = $asset->getAssetLimit($startPage,$endPage);
		$arrA = $asset->getAsset();
		$cmd = $arrL;
		$cmdA = $arrA;
		$num = $db->num_rows($cmdA);
		$numPage = round($num/20);
	}
	
	
	echo "<center>จำนวนหน้าทั้งหมด : ";
	$i=0;
	$j=1;
	while($i<=$numPage){
		echo "<input type='button' value='".$j."' class='button' onclick='changePageAsset(".$i.");'>";
		$i++;
		$j++;
	}
	echo "</center>";
	$no1=$startPage;
	$no=$no1+1;
	
	while($res = $db->fetch_array($cmd))
{
		$selDate = $res['assetAddDate'];
		$numberAsString = number_format($res['assetPrice'], 2);
		
		$dateM = substr($selDate,4,6);
		$text = substr($selDate,0,4);
		$sYear = substr($res['assetYear'],2,4);
		$year = $text+543;
		$dateType = $year."".$dateM;
		
		$datetime = DateTime::createFromFormat('Y-m-d',$dateType);
		$dateT = $datetime->format('d/m/Y');
		
	echo "<tr>";
	echo "<td style='text-align:center'>".$no."</td>";
	echo "<td style='text-align:center'>".$res['assetYear']."</td>";
	echo "<td style='text-align:center'>".$sYear."/".$res['assetTypeCode']."-
	".$res['assetTypeCode']."".$res['assetGroupCode']."-".$res['assetCode']."</td>";
	echo "<td style='text-align:left'>".$res['assetName']."</td>";
	echo "<td style='text-align:right'>".$numberAsString."</td>";
	echo "<td style='text-align:center'>".$dateT."</td>";
	echo "<td style='text-align:left'>".$res['remark']."</td>";
	echo "<td style='text-align:center'>
	<a class='button icon edit' onClick='getEditAsset(".$res['assetId'].");'></a></td>";
	if($_SESSION["stat"]=="Administrator"){
	echo "<td style='text-align:center'>
	<a class='button icon remove danger' onClick='delAsset(".$res['assetId'].");'></a></td>";
	}
	echo "</tr>";
	
	$no++;
	
}
?>
        </tbody>
    </table>