function showAddAsset()  
				{  
				$('#addAsset').html('เพิ่มข้อมูลครุภัณฑ์ </br></br>');
				$('#addAsset').html($('#addAsset').html()+'<select><option>รหัสประเภท</option><option>Oranges</option><option>Banannas</option></select>');
				$('#addAsset').html($('#addAsset').html()+'&nbsp<select><option>รหัสหมวด</option><option>Oranges</option><option>Banannas</option></select>');
				$('#addAsset').html($('#addAsset').html()+'</br></br><input id="assetCode" type="text" placeholder="รหัสครุภัณฑ์" width="100px">');
				$('#addAsset').html($('#addAsset').html()+'&nbsp<input id="assetName" type="text" placeholder="ชื่อครุภัณฑ์">');
				$('#addAsset').html($('#addAsset').html()+'</br></br><input id="assetPrice" type="text" placeholder="ราคาครุภัณฑ์">');
				$('#addAsset').html($('#addAsset').html()+'&nbsp<input id="assetYear" type="text" placeholder="ประจำปี">');
				$('#addAsset').html($('#addAsset').html()+'&nbsp<a href="manage.php" class="button icon approve" onClick="">เพิ่ม</a>');
					if($("#addAsset").is(":visible")){
						$("#addAsset").slideUp();
						$(element).css('display:none')}
					else {
						$("#addAsset").slideDown();}
				}  
function showAddType()  
{  
	if($("#addType").is(":visible")){
		$("#addType").slideUp();
		$(element).css('display:none')}
	else {
		$("#addType").slideDown();}
}  

function showAddGroup()  
	{  
	$('#addGroup').html('เพิ่มข้อมูลหมวดครุภัณฑ์ </br></br><select><option>Apples</option><option>Oranges</option><option>Banannas</option></select></br></br>');
	$('#addGroup').html($('#addGroup').html()+'<input type="text" placeholder="รหัสหมวดครุภัณฑ์" width="100px">&nbsp<input type="text" placeholder="ชื่อหมวดครุภัณฑ์">&nbsp<a href="manage.php" class="button icon approve" onClick="">เพิ่ม</a></center>');
	
		if($("#addGroup").is(":visible")){
			$("#addGroup").slideUp();
			$(element).css('display:none')}
		else {
			$("#addGroup").slideDown();}
	}  
function showAddType()  
	{  
	$('#addType').html('เพิ่มข้อมูลประเภทครุภัณฑ์ </br></br>');
	$('#addType').html($('#addType').html()+'<input type="text" placeholder="รหัสประเภทครุภัณฑ์" width="100px">&nbsp<input type="text" placeholder="ชื่อประเภทครุภัณฑ์">&nbsp<a href="manage.php" class="button icon approve" onClick="">เพิ่ม</a></center>');
	
		if($("#addType").is(":visible")){
			$("#addType").slideUp();
			$(element).css('display:none')}
		else {
			$("#addType").slideDown();}
	}  
function showAddUser()  
	{  
	$('#addUser').html('เพิ่มข้อมูลผู้ใช้งานระบบ </br></br>');
	$('#addUser').html($('#addUser').html()+'<input id="regUname" type="text" placeholder="ชื่อผู้ใช้" width="100px"></br></br>');
	$('#addUser').html($('#addUser').html()+'<input id="regPword" type="password" placeholder="รหัสผ่าน"></br></br>');
	$('#addUser').html($('#addUser').html()+'<input id="regRePword" type="password" placeholder="รหัสผ่านอีกครั้ง"></br></br></br></br>');
	$('#addUser').html($('#addUser').html()+'<input id="regFname" type="text" placeholder="ชื่อ" width="100px">&nbsp');
	$('#addUser').html($('#addUser').html()+'<input id="regLname" type="text" placeholder="นามสกุล">');
	$('#addUser').html($('#addUser').html()+'</br></br><input id="regPosition" type="text" placeholder="ตำแหน่ง">&nbsp');
	$('#addUser').html($('#addUser').html()+'<select id="regStatus"><option>สถานะ</option><option>ผู้ดูแลระบบ</option>'
	+'<option>เจ้าหน้าที่พัสดุ</option></select>&nbsp&nbsp');
	$('#addUser').html($('#addUser').html()+'<input id="btmAddUser" type="button" class="button big" value="เพิ่ม" onClick="validateAddUser();"/>&nbsp&nbsp');
	$('#addUser').html($('#addUser').html()+'<input id="btmClrUser" type="button" class="button big" value="ล้างค่า" onClick="clearAddUser();"/></center>');
	
	
		if($("#addUser").is(":visible")){
			$("#addUser").slideUp();
			$(element).css('display:none')}
		else {
			$("#addUser").slideDown();}
	}  
/*
function showU()  
	{  
	$('#mUser').html('');
	$("#showUser").html('');
				var url = "../require/reqTebleUser.php";
				
					$.getJSON(url,function(data)
					{
						$('#showUser').html('');
						$('#showUser').html($('#showUser').html()+'<div class="manage"><h1><img src="../image/assetBanner.png"></h1>');
						$('#showUser').html($('#showUser').html()+'<div id="test" class="manageType"><center>'
						+'<font size="5px;">การจัดการผู้ใช้งานระบบ</font>');
						$('#showUser').html($('#showUser').html()+'</br></br><a class="button icon add" onclick="showAddUser();">เพิ่มผู้ใช้งานระบบ</a></center></div>');
						$('#showUser').html($('#showUser').html()+'</br><div id="addUser" class="manageContent" style="display:none;"></div>');
						$('#showUser').html($('#showUser').html()+'<table class="table table-bordered">');
						$('#showUser').html($('#showUser').html()+'<thead><tr>');
						$('#showUser').html($('#showUser').html()+'<th style="width: 6%; text-align:center"">ลำดับ</th>');
						$('#showUser').html($('#showUser').html()+'<th style="width: 16%; text-align:center"">ชื่อผู้ใช้</th>');
						$('#showUser').html($('#showUser').html()+'<th style="width: 16%; text-align:center"">ชื่อ</th>');
						$('#showUser').html($('#showUser').html()+'<th style="width: 16%; text-align:center"">นามสกุล</th>');
						$('#showUser').html($('#showUser').html()+'<th style="width: 16%; text-align:center"">ตำแหน่ง</th>');
						$('#showUser').html($('#showUser').html()+'<th style="width: 16%; text-align:center"">สถานะ</th>');
						$('#showUser').html($('#showUser').html()+'<th style="width: 7%; text-align:center"">แก้ไข</th>');
						$('#showUser').html($('#showUser').html()+'<th style="width: 7%; text-align:center">ลบ</th>');
						$('#showUser').html($('#showUser').html()+'</tr></thead><tbody><tr>');
						$.each(data,function(key,val)
						{
							$('#showUser').html($('#showUser').html()+'<td id="Uid" style="text-align:right">1</td>');
							$('#showUser').html($('#showUser').html()+'<td id="Uuname">'+val['username']+'</td>');
							$('#showUser').html($('#showUser').html()+'<td id="Ufname">'+val['firstName']+'</td>');
							$('#showUser').html($('#showUser').html()+'<td id="Ulname">'+val['lastName']+'</td>');
							$('#showUser').html($('#showUser').html()+'<td id="Upos">'+val['position']+'</td>');
							$('#showUser').html($('#showUser').html()+'<td id="Ustat">'+val['status']+'</td>');
							$('#showUser').html($('#showUser').html()+'<td id="Uedit">'
							+'<a class="button icon edit" onClick="editUser();"></a></td>');
							$('#showUser').html($('#showUser').html()+'<td id="Udel">'
							+'<a class="button icon remove danger" onClick="delUser();"></a></td>');
							$('#showUser').html($('#showUser').html()+'</tr></tbody>');
							
			  
						});
						$('#showUser').html($('#showUser').html()+'</table><div id="showUser"></div></div>');
						
					});
					
	}*/