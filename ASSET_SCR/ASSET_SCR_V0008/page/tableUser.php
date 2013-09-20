<?php
	
	include_once("../class/Config.php");
	include_once("../class/User.php");


	$userss = new User();
	$dbss= new config();

?>
    <table class="table table-bordered">
        <thead>
            <tr>
            	<th style="width: 6%; text-align:center"">ลำดับ</th>
                <th style="width: 16%; text-align:center"">ชื่อผู้ใช้</th>
                <th style="width: 16%; text-align:center"">ชื่อ</th>
                <th style="width: 16%; text-align:center"">นามสกุล</th>
                <th style="width: 16%; text-align:center"">ตำแหน่ง</th>
                <th style="width: 16%; text-align:center"">สถานะ</th>
                <th style="width: 7%; text-align:center"">แก้ไข</th>
                <th style="width: 7%; text-align:center">ลบ</th>
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
		echo "<td id='Uid".$no."' style='text-align:center'>".$no."</td>";
		echo "<td id='Uuname".$no."'>".$res['username']."</td>";
		echo "<td id='Ufname".$no."'>".$res['firstName']."</td>";
		echo "<td id='Ulname".$no."'>".$res['lastName']."</td>";
		echo "<td id='Upos".$no."'>".$res['position']."</td>";
		echo "<td id='Ustat".$no."' style='text-align:center'>".$stat."</td>";
		echo "<td id='Uedit".$no."' style='text-align:center'><a class='button icon edit' onClick='getEditUser(".$res['id'].");'></a></td>";
		echo "<td id='Udel".$no."' style='text-align:center'><a class='button icon remove danger' onClick='delUser(".$res['id'].");'></a></td>";
		echo "</tr>";
		$no++;
	}
	else if($res['status']=="Officer"){
		$stat = "เจ้าหน้าที่พัสดุ";
		echo "<tr>";
		echo "<td id='Uid".$no."' style='text-align:center'>".$no."</td>";
		echo "<td id='Uuname".$no."'>".$res['username']."</td>";
		echo "<td id='Ufname".$no."'>".$res['firstName']."</td>";
		echo "<td id='Ulname".$no."'>".$res['lastName']."</td>";
		echo "<td id='Upos".$no."'>".$res['position']."</td>";
		echo "<td id='Ustat".$no."' style='text-align:center'>".$stat."</td>";
		echo "<td id='Uedit".$no."' style='text-align:center'><a class='button icon edit' onClick='getEditUser(".$res['id'].");'></a></td>";
		echo "<td id='Udel".$no."' style='text-align:center'><a class='button icon remove danger' onClick='delUser(".$res['id'].");'></a></td>";
		echo "</tr>";
		
		$no++;
	}
}
//,".$res["username"].",".$res["firstName"].",".$res["lastName"].",".$res["position"].",".$res["status"]."
?>
        </tbody>
    </table>

   
