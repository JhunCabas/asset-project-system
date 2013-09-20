//var page = "<?=$page?>" ;

$(function()
	{
		showMainPage();
	}
);
	
function getdataLost()
	{
		$('#lostList').html('<center><img src=loading.png><br>Loading.</center>');
		$.getJSON('lostAsset.php',function(data)
		{
			
			$('#lostList').html('');
			
			$('#lostList').html($('#lostList').html()+'<tr class="yellow"><td width="20%">รหัสครุภัณฑ์</td><td width="20%">ชื่อครุภัณฑ์</td><td width="100px;">ประเภทครุภัณฑ์</td><td width="100px;">หมวดครุภัณฑ์</td><td width="80px;">สถานะ</td></tr>');
			$.each(data,function(key,val)
			{
		$('#lostList').html($('#lostList').html()+'<tr><td>'+val['assetId']+'</td><td>'+val['assetName']+'</td><td align="center">'+val['assetTypeId']+'</td><td>'+val['assetGroup']+'</td><td>'+val['assetStatus']+'</td></tr>');
				
  
			});
			
		});
		
	}
	
function addUser(){
	var url = "../request/reqAddUser.php";
	
			$.get(url,{'regUname':$('#regUname').val(),'regPass':$('#regPword').val(),
			'regFname':$('#regFname').val(),'regLname':$('#regLname').val(),
			'regPosition':$('#regPosition').val(),'regStatus':$('#regStatus').val()},function(data)
			{
				$('#dialog').html('<center>เพิ่มข้อมูลเรียบร้อย</center>');
				$('#dialog').dialog({'title':'เพิ่มข้อมูล',
				buttons:[{text: "Ok",click: function(){
					
					$( this ).dialog( "close" );
					showManageUser();}}]});
			});
			
}
function clearAddUser(){
	
	$('#regUname').val('');
	$('#regPword').val('');
	$('#regRePword').val('');
	$('#regFname').val('');
	$('#regLname').val('');
	$('#regPosition').val('');
	$('#regStatus').val('');
	
	$('#regUname').focus();
	
			
}
function delUser(id){
	
				$('#dialog').html("คุณต้องการลบข้อมูลนี้ใช่หรือไม่");
				$("#dialog").dialog({ 'title':'ลบข้อมูล',
					  buttons: {
						'ตกลง': function() {
							$.get("../request/reqDelUser.php",{'id':id},function(data)
								{
									showManageUser();
									
								});
							$(this).dialog('close');
							
						},
						'ยกเลิก': function() {
						   $(this).dialog('close');
						}
					  }
					});
}
function del(id){
	 $.get("../request/reqDelUser.php",{'id':id},function(data)
							{
								alert('ลบ');
								
							});
}

function getEditData(id)
	{
		$.getJSON("../request/reqSelUser.php",{'id':id},function(data)
		{
			
			$.each(data,function(key,val)
			{
				var edStat1,edStat2 = "";
				if(val['status']==1){
					edStat1 = "selected";
				}
				else if(val['status']==2){
					edStat2 = "selected";
				}
				else{
					edStat = "";
				}
				//$('#dialog').html("แก้ไข"+id+val['username']+val['firstName']+val['lastName']+val['position']+val['status']);
				
				$('#dialog').html("<table><tr><td>ชื่อ :</td>"+
				"<td><input id='editFname' type='text' value='"+val['firstName']+"' style='width: 150px;'></td></tr>"+
				"<tr><td>นามสกุล :</td>"+
				"<td><input id='editLname' type='text' value='"+val['lastName']+"' style='width: 150px;'></td></tr>"+
				"<tr><td>ตำแหน่ง :</td>"+
				"<td><input id='editPos' type='text' value='"+val['position']+"' style='width: 150px;'></td></tr>"+
				"<tr><td>สถานะ :</td>"+
				"<td><select id='editStat' style='width: 160px;'>"+
				"<option  value='0'>สถานะ</option><option value='1' "+edStat1+">ผู้ดูแลระบบ</option>"+
				"<option value='2' "+edStat2+">เจ้าหน้าที่พัสดุ</option></select></td></tr></table>");
				

				$("#dialog").dialog({ 'title':'แก้ไขข้อมูล',
					  buttons: {
						'ตกลง': function() {
							
							if ($('#editFname').val() == ""
							||$('#editLname').val()== ""
							||$('#editPos').val()== ""
							||$('#editStat').val()== "")  
							{ 
								$('#addUser').html('<center>กรุณาใส่ข้อมูลให้ครบถ้วน</center>'+$('#editStat').val());
								$('#addUser').dialog({'title':'เกิดข้อผิดพลาด',
								buttons:[{text: "Ok",click: function(){$('#addUser').dialog( "close" );$('#editFname').focus();}}]});
								return false;  
							}  
							else if($('#editStat').val()==0){  
							
								$('#addUser').html('<center>กรุณาเลือกสถานะของผู้ใช้งาน</center>');
								$('#addUser').dialog({'title':'เกิดข้อผิดพลาด',
								buttons:[{text: "Ok",click: function(){$('#addUser').dialog( "close" );$('#editStat').focus();}}]});
								return false;  
							}  
							else{
								
								$.get("../request/reqEditUser.php",{'id':id,'upFname':$('#editFname').val(),
									'upLname':$('#editLname').val(),
									'upPosition':$('#editPos').val(),
									'upStatus':$('#editStat').val()},function(data)
										{
											$('#dialog').dialog('close');
											showManageUser();
											
										});
								return true;
							}
							
							
							$(this).dialog('close');
							
						},
						'ยกเลิก': function() {
						   $(this).dialog('close');
						}
					  }
					});
					/*
				$('#chatbox').html($('#chatbox').html()+''+'<font size="1" color="red">['+val['messTime']+
				']</font> | <font color="blue">'+val['messBy']+
				'</font><font color="red"> :: </font>'+val['messText']+
				'<br/>');
				*/
				
			});
		});

	}