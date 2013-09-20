<?php
	
	include_once("../class/Config.php");
	include_once("../class/User.php");


	$userss = new User();
	$dbss= new config();

?>
    <table class="table table-bordered">
        <thead>
            <tr>
            	<th style="width: 10%; text-align:center"">ลำดับ</th>
                <th style="width: 30%; text-align:center"">รหัสประเภทครุภัณฑ์</th>
                <th style="width: 30%; text-align:center"">ชื่อประเภทครุภัณฑ์</th>
                <th style="width: 30%; text-align:center"">วัน/เดือน/ปี ที่ได้มา</th>
            </tr>
        </thead>
            <tbody>
            
<?php
	$arr = $userss->getUser();
	$no=1;
	while($res = $dbss->fetch_array($arr))
{
	if($res['status']=="Administrator"){
		$stat = "ผู้ดูแลระบบ";
		echo "<tr>";
		echo "<td id='Uid".$no."' style='text-align:right'>".$no."</td>";
		echo "<td id='Uuname".$no."'>".$res['username']."</td>";
		echo "<td id='Ufname".$no."'>".$res['firstName']."</td>";
		echo "<td id='Ulname".$no."'>".$res['lastName']."</td>";
		echo "<td id='Upos".$no."'>".$res['position']."</td>";
		echo "<td id='Ustat".$no."'>".$stat."</td>";
		echo "<td id='Uedit".$no."' style='text-align:center'><a class='button icon edit' onClick='getEditData(".$res['id'].");'></a></td>";
		echo "<td id='Udel".$no."' style='text-align:center'><a class='button icon remove danger' onClick='delUser(".$res['id'].");'></a></td>";
		echo "</tr>";
		$no++;
	}
	else if($res['status']=="Officer"){
		$stat = "เจ้าหน้าที่พัสดุ";
		echo "<tr>";
		echo "<td id='Uid".$no."' style='text-align:right'>".$no."</td>";
		echo "<td id='Uuname".$no."'>".$res['username']."</td>";
		echo "<td id='Ufname".$no."'>".$res['firstName']."</td>";
		echo "<td id='Ulname".$no."'>".$res['lastName']."</td>";
		echo "<td id='Upos".$no."'>".$res['position']."</td>";
		echo "<td id='Ustat".$no."'>".$stat."</td>";
		echo "<td id='Uedit".$no."' style='text-align:center'><a class='button icon edit' onClick='getEditData(".$res['id'].");'></a></td>";
		echo "<td id='Udel".$no."' style='text-align:center'><a class='button icon remove danger' onClick='delUser(".$res['id'].");'></a></td>";
		echo "</tr>";
		
		$no++;
	}
}
//,".$res["username"].",".$res["firstName"].",".$res["lastName"].",".$res["position"].",".$res["status"]."
?>
        </tbody>
    </table>

   
