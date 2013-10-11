//*****************************************************************************************//
//*****************************************************************************************//
//*** ชื่อไฟล์ : manage.js
//*** คำอธิบาย : เป็นไฟล์ javascript ใช้สำหรับการประมวลผลหลัก และ เป็นตัวกลางที่ใช้เชื่อมข้อมูลกับส่วนอื่นๆ
//*** Version : 1.0
//*** Credit By : นายนัฐวุฒิ  เผือกทอง
//*****************************************************************************************//
//*****************************************************************************************//

$(function()
	{
		showMainPage();
	}
);
	
//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ เพิ่มข้อมูลผู้ใช้ ประเภท หมวด และครุภัณฑ์
//*****************************************************************************************//	
function addUser(){
	var url = "../request/reqAddUser.php";
	
			$.get(url,{'regUname':$('#regUname').val(),
			'regPass':$('#regPword').val(),
			'regFname':$('#regFname').val(),
			'regLname':$('#regLname').val(),
			'regPosition':$('#regPosition').val(),
			'regStatus':$('#regStatus').val()},function(data)
			{
				$('#dialog').html('<center>เพิ่มข้อมูลเรียบร้อย</center>');
				$('#dialog').dialog({'title':'เพิ่มข้อมูล',position: [600,200],
				buttons:[{text: "Ok",click: function(){
					$( this ).dialog( "close" );
					clearAddUser();
					getTableUser();}}]});
			});
			
}

function addType(){
	var url = "../request/reqAddType.php";
	
			$.get(url,{'addTypeCode':$('#addTypeCode').val(),
			'addTypeName':$('#addTypeName').val()},function(data)
			{
				$('#dialog').html('<center>เพิ่มข้อมูลเรียบร้อย</center>');
				$('#dialog').dialog({'title':'เพิ่มข้อมูล',position: [600,200],
				buttons:[{text: "Ok",click: function(){
					$( this ).dialog( "close" );
					clearAddType();
					getTableType();}}]});
			});
			
}
function addGroup(){
	var selectBoxAdd = document.getElementById("addAssetType");
    var selectedValueAdd = selectBoxAdd.options[selectBoxAdd.selectedIndex].value;

	var url = "../request/reqAddGroup.php";
	
			$.get(url,{'addGroupCode':$('#addGroupCode').val(),
			'addGroupName':$('#addGroupName').val(),
			'addTypeId':selectedValueAdd},function(data)
			{
				$('#dialog').html('<center>เพิ่มข้อมูลเรียบร้อย</center>');
				$('#dialog').dialog({'title':'เพิ่มข้อมูล',
				buttons:[{text: "Ok",click: function(){
					$( this ).dialog( "close" );
					clearAddGroup();
					getTableGroup();}}]});
			});
			
}

function addAsset(){
	var url = "../request/reqAddAsset.php";
	
			$.get(url,{'addAddDate':$('#addAssetAddDate').val(),
			'addType':$('#addAssetType').val(),
			'addGroup':$('#addAssetGroup').val(),
			'addAsset':$('#addAssetCode').val(),
			'addAssName':$('#addAssetName').val(),
			'addAssNum':$('#addAssetNum').val(),
			'addPrice':$('#addAssetPrice').val(),
			'addRemark':$('#addRemark').val()},function(data)
			{
				$('#dialog').html('<center>เพิ่มข้อมูลเรียบร้อย</center>');
				$('#dialog').dialog({'title':'เพิ่มข้อมูล',position: [600,200],
				buttons:[{text: "Ok",click: function(){
					$( this ).dialog( "close" );
					clearAddAsset();
					getTableAsset();}}]});
			});
}

//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ ล้างค่าข้อมูลผู้ใช้ ประเภท หมวด และครุภัณฑ์
//*****************************************************************************************//
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

function clearAddType(){
	$('#addTypeCode').val('');
	$('#addTypeName').val('');
	$('#addTypeCode').focus();			
}

function clearAddGroup(){
	$('#addGroupCode').val('');
	$('#addGroupName').val('');
	$('#addAssetType').val('');
	$('#addAssetType').focus();			
}

function clearAddAsset(){
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1;
	var yyyy = today.getFullYear()+543;
	if(dd<10){
		dd='0'+dd
	} 
	if(mm<10){
		mm='0'+mm
	} 
	
	today = dd+'/'+mm+'/'+yyyy;
	
	$('#addAssetAddDate').val(today);
	$('#addAssetType').val('');
	$('#addAssetGroup').val('');
	$('#addAssetCode').val('');
	$('#addAssetName').val('');
	$('#addAssetPrice').val('');
	$('#addRemark').val('');
	$('#regUname').focus();			
}
//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ ลบข้อมูลผู้ใช้ ประเภท หมวด และครุภัณฑ์
//*****************************************************************************************//
function delUser(userId){
	$.get("../request/reqCheckUserRela.php",{'userId':userId},function(data)
	{
		if(data>0){	
			$('#dialog').html("<center>ไม่สามารถลบข้อมูลได้ </br>เนื่องจาก ผู้ใช้นี้ทีความสัมพันธ์กับข้อมูลอื่น</center>");
			$("#dialog").dialog({ 'title':'ลบข้อมูล',position:[600,200],width:400,
			  buttons: {
				'ตกลง': function() {
					$(this).dialog('close');
				}
			  }
			});
		}
		else{
			$('#dialog').html("คุณต้องการลบข้อมูลนี้ใช่หรือไม่");
			$("#dialog").dialog({'title':'ลบข้อมูล',position: [600,200],
				  buttons: {
					'ตกลง': function() {
						$.get("../request/reqDelUser.php",{'userId':userId},function(data)
							{
								getTableUser();
							});
						$(this).dialog('close');
						
					},
					'ยกเลิก': function() {
					   $(this).dialog('close');
					}
				  }
				});
		}
	});		
}

function delType(assetTypeId){
	$('#dialog').html("คุณต้องการลบข้อมูลนี้ใช่หรือไม่");
	$("#dialog").dialog({ 'title':'ลบข้อมูล',position: [600,200],
		  buttons: {
			'ตกลง': function() {
				$.get("../request/reqDelType.php",{'assetTypeId':assetTypeId},function(data)
					{
						getTableType();
					});
				$(this).dialog('close');
			},
			'ยกเลิก': function() {
			   $(this).dialog('close');
			}
		  }
		});
}

function delGroup(assetGroupid){
	$('#dialog').html("คุณต้องการลบข้อมูลนี้ใช่หรือไม่");
	$("#dialog").dialog({'title':'ลบข้อมูล',position: [600,200],
		  buttons: {
			'ตกลง': function() {
				$.get("../request/reqDelGroup.php",{'assetGroupid':assetGroupid},function(data)
					{
						getTableGroup();
					});
				$(this).dialog('close');
			},
			'ยกเลิก': function() {
			   $(this).dialog('close');
			}
		  }
		});
}

function delAsset(assetId){
	$('#dialog').html("คุณต้องการลบข้อมูลนี้ใช่หรือไม่");
	$("#dialog").dialog({ 'title':'ลบข้อมูล',position: [600,200],
		  buttons: {
			'ตกลง': function() {
				$.get("../request/reqDelAsset.php",{'assetId':assetId},function(data)
					{
						getTableAsset();
					});
				$(this).dialog('close');
			},
			'ยกเลิก': function() {
			   $(this).dialog('close');
			}
		  }
		});
}

//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ แก้ไขข้อมูลผู้ใช้ ประเภท หมวด และครุภัณฑ์
//*****************************************************************************************//
function getEditPass(userId){
	
	
	$('#dialog').html("<table><tr><td>รหัสผ่านเดิม :</td>"+
				"<td><input id='confirmPass' type='password' value='' style='width: 150px;'></td></tr>"+
				"<tr><td>รหัสผ่านใหม่ :</td>"+
				"<td><input id='newPass' type='password' value='' style='width: 150px;'></td></tr>"+
				"<tr><td>รหัสผ่านใหม่อีกครั้ง :</td>"+
				"<td><input id='conNewPass' type='password' value='' style='width: 150px;'></td></tr>"+
				"</table>");
	
				$("#dialog").dialog({'title':'เปลี่ยนรหัสผ่าน',width:400,position: [600,200],
					  buttons: {
						'ตกลง': function() { 
							var regExp = /[^a-z0-9]/i; 
							
							if ($('#confirmPass').val() == "",
							$('#newPass').val() == "",
							$('#conNewPass').val() == "")  
							{ 
								$('#dialog2').html('<center>กรุณาใส่ข้อมูลให้ครบถ้วน</center>');
								$('#dialog2').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
								buttons:[{text: "Ok",click: function(){
									$('#dialog2').dialog( "close" );
										if($('#confirmPass').val() == ""){
											$('#confirmPass').css("border-color","red");
										}
										else if($('#newPass').val() == ""){
											$('#newPass').css("border-color","red");
										}
										else if($('#conNewPass').val() == ""){
											$('#conNewPass').css("border-color","red");
										}
									}}]});
								return false;  
							}  
							else if($('#conNewPass').val()!=$('#newPass').val())  
							{ 
								$('#dialog2').html('<center>ใส่รหัสผ่านใหม่ให้ตรงกัน</center>');
								$('#dialog2').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
								buttons:[{text: "Ok",click: function(){$('#dialog2').dialog( "close" );}}]});
								return false;  
							} 
							else if(regExp.test($('#newPass').val()))  
							{ 
								$('#dialog2').html('<center>กรุณาใส่รหัสผ่านเป็นตัวอักษร a-z หรือ 0-9 เท่านั้น</center>');
								$('#dialog2').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
								buttons:[{text: "Ok",click: function(){$('#dialog2').dialog( "close" );}}]});
								return false;  
							}  
							else{ 
								$.get("../request/reqCheckPass.php",{'userId':userId,'opass':$('#confirmPass').val()},function(data)
										{
											if(data==1){
												$.get("../request/reqEditPass.php",{'userId':userId,
												'oldPass':$('#confirmPass').val(),
												'newPass':$('#newPass').val()},function(data)
													{
														$('#dialog2').html('<center>เปลี่ยนรหัสผ่านเรียบร้อยแล้ว</center>');
														$('#dialog2').dialog({'title':'เปลี่ยนรหัสผ่าน',position: [600,200],
														buttons:[{text: "Ok",click: function(){
															$('#dialog').dialog('close');
															$('#dialog2').dialog( "close" );}}]});														
													});
											}else{
												$('#dialog2').html('<center>รหัสผ่านเดิมผิดพลาด</center>');
												$('#dialog2').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
												buttons:[{text: "Ok",click: function(){$('#dialog2').dialog( "close" );}}]});
												return false;
											}
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
}

function getEditUser(userId)
	{
		$.getJSON("../request/reqSelUser.php",{'userId':userId},function(data)
		{
			$.each(data,function(key,val)
			{
				var edStat1,edStat2 = "";
				if(val['userStatus']==1){
					edStat1 = "selected";
				}
				else if(val['userStatus']==2){
					edStat2 = "selected";
				}
				else{
					edStat = "";
				}
				$('#dialog').html("<table><tr><td>ชื่อ :</td>"+
				"<td><input id='editFname' type='text' value='"+val['firstName']+"' maxlength='20' style='width: 150px;'>"+
				"</td></tr>"+
				"<tr><td>นามสกุล :</td>"+
				"<td><input id='editLname' type='text' value='"+val['lastName']+"' maxlength='20' style='width: 150px;'>"+
				"</td></tr>"+
				"<tr><td>ตำแหน่ง :</td>"+
				"<td><input id='editPos' type='text' value='"+val['position']+"'  maxlength='20' style='width: 150px;'></td>"+
				"</tr>"+
				"<tr><td>สถานะ :</td>"+
				"<td><select id='editStat' style='width: 160px;'>"+
				"<option  value='0'>สถานะ</option><option value='1' "+edStat1+">ผู้ดูแลระบบ</option>"+
				"<option value='2' "+edStat2+">เจ้าหน้าที่พัสดุ</option></select></td></tr></table>");
				
				$("#dialog").dialog({ 'title':'แก้ไขข้อมูล',position: [600,200],
					  buttons: {
						'ตกลง': function() {
							var regNum = /^[A-Za-zก-๙]+$/;
							if ($('#editFname').val() == ""
							||$('#editLname').val()== ""
							||$('#editPos').val()== ""
							||$('#editStat').val()== "")  
							{ 
								$('#addUser').html('<center>กรุณาใส่ข้อมูลให้ครบถ้วน</center>');
								$('#addUser').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
								buttons:[{text: "Ok",click: function(){$('#addUser').dialog( "close" );
										if($('#editFname').val() == ""){
											$('#editFname').css("border-color","red");
										}
										else if($('#editLname').val() == ""){
											$('#editLname').css("border-color","red");
										}
										else if($('#editPos').val() == ""){
											$('#editPos').css("border-color","red");
										}
										
								$('#editFname').focus();}}]});
								return false;  
							}  
							else if($('#editStat').val()==0){  
							
								$('#addUser').html('<center>กรุณาเลือกสถานะของผู้ใช้งาน</center>');
								$('#addUser').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
								buttons:[{text: "Ok",click: function(){$('#addUser').dialog( "close" );
								$('#editStat').css("border-color","red");
								$('#editStat').focus();}}]});
								return false;  
							}
							else if(!regNum.test($('#editFname').val())){
								$('#addUser').html('<center>กรุณาใส่ชื่อเป็นตัวอักษร a-z,ก-ฮ และสระเท่านั้น</center>');
								$('#addUser').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
								buttons:[{text: "Ok",click: function(){$('#addUser').dialog( "close" );$('#regFname').focus();}}]});
								return false;
							}  
							else if(!regNum.test($('#editLname').val())){
								$('#addUser').html('<center>กรุณาใส่นามสกุลเป็นตัวอักษร a-z,ก-ฮ และสระเท่านั้น</center>');
								$('#addUser').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
								buttons:[{text: "Ok",click: function(){$('#addUser').dialog( "close" );$('#regFname').focus();}}]});
								return false;
							}  
							else{
								
								$.get("../request/reqEditUser.php",{'userId':userId,'upFname':$('#editFname').val(),
									'upLname':$('#editLname').val(),
									'upPosition':$('#editPos').val(),
									'upStatus':$('#editStat').val()},function(data)
										{
											$('#dialog').dialog('close');
											showManageUser();
											getTableUser();
											
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
				
			});
		});

	}
	
function getEditType(assetTypeId){
	$.getJSON("../request/reqSelType.php",{'assetTypeId':assetTypeId},function(data)
		{
			
			$.each(data,function(key,val)
			{				
				
				$('#dialog').html("<table><tr><td>รหัสประเภท :</td><td>"+val['assetTypeCode']+"</td></tr>"+
				"<tr><td>ชื่อประเภท :</td>"+
				"<td><input id='editTypeName' type='text' value='"+val['assetTypeName']+"' maxlength='30' style='width: 150px;'>"+
				"</td></tr>"+
				"</table>");
				
				$("#dialog").dialog({ 'title':'แก้ไขข้อมูล',position: [600,200],
					  buttons: {
						'ตกลง': function() {
							var regNum = /^[A-Za-zก-๙0-9]+$/;
							if ($('#editTypeName').val()== "")  
							{ 
								$('#addType').html('<center>กรุณาใส่ข้อมูลให้ครบถ้วน</center>');
								$('#addType').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
								buttons:[{text: "Ok",click: function(){$('#addType').dialog( "close" );
									if($('#editTypeName').val() == ""){
											$('#editTypeName').css("border-color","red");
										}
								$('#editTypeName').focus();}}]});
								return false;  
							} 
							else if(!regNum.test($('#editTypeName').val())){
								$('#addType').html('<center>กรุณาใส่ชื่อประเภทเป็นตัวอักษร a-z,ก-ฮ และสระเท่านั้น</center>');
								$('#addType').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
								buttons:[{text: "Ok",click: function(){$('#addType').dialog( "close" );$('#editTypeName').focus();}}]});
								return false;
							}  
							else{
								
								$.get("../request/reqEditType.php",{'assetTypeId':assetTypeId,
								'upTypeName':$('#editTypeName').val()},function(data)
										{
											$('#dialog').dialog('close');
											showManageType();
											 getTableType();
											
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
				
			});
		});

	}

function getEditGroup(assetGroupId)
	{
		
		$.getJSON("../request/reqSelGroup.php",{'assetGroupId':assetGroupId},function(data)
		{
			
			$.each(data,function(key,val)
			{
				
				$('#dialog').html("<table><tr><td>รหัสประเภทครุภัณฑ์  </td><td>: "+val['assetTypeCode']+"</tr>"+
				"<tr><td>รหัสหมวดครุภัณฑ์  </td><td>: "+val['assetGroupCode']+"</td></tr>"+
				"<tr><td>ชื่อหมวดครุภัณฑ์ </td><td>:"+
				"<input id='editGname' type='text' value='"+val['assetGroupName']+"' maxlength='30'"+
				" style='width: 200px;' maxlength='20'></td></tr>"+
				"</table>");
				

				$("#dialog").dialog({ 'title':'แก้ไขข้อมูล',width:400,position: [600,200],
					  buttons: {
						'ตกลง': function() {
							var regNum = /^[A-Za-zก-๙0-9]+$/;
							if ($('#editGname').val() == "")  
							{ 
								$('#addGroup').html('<center>กรุณาใส่ข้อมูลให้ครบถ้วน</center>');
								$('#addGroup').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
								buttons:[{text: "Ok",click: function(){$('#addGroup').dialog( "close" );
								$('#editGname').css("border-color","red");
								$('#editGname').focus();}}]});
								return false;  
							}  
							else if(!regNum.test($('#editGname').val())){
								$('#addGroup').html('<center>กรุณาใส่ชื่อประเภทเป็นตัวอักษร a-z,ก-ฮ และสระเท่านั้น</center>');
								$('#addGroup').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
								buttons:[{text: "Ok",click: function(){$('#addGroup').dialog( "close" );
								$('#editGname').focus();}}]});
								return false;
							}  
							else{
								
								$.get("../request/reqEditGroup.php",{'assetGroupId':assetGroupId,
								'editGname':$('#editGname').val()},function(data)
										{
											$('#dialog').dialog('close');
											getTableGroup();
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
			});
		});
	}

function getEditAsset(assetId){
	$.getJSON("../request/reqSelAsset.php",{'assetId':assetId},function(data)
		{

			$.each(data,function(key,val)
			{				
			
				var MyDate = new Date();
				var MyDateString;
				
				MyDate.setDate(MyDate.getDate());
				
				MyDateString = ('0' + MyDate.getDate()).slice(-2) + '/'
							 + ('0' + (MyDate.getMonth()+1)).slice(-2) + '/'
							 + (MyDate.getFullYear()+543);
				
				var year2 = val['assetAddDate'].substring(8,10);
				var assetCode = year2+"/"+val['assetTypeCode']+"-"+val['assetTypeCode']+val['assetGroupCode']+
				"-"+val['assetCode'];
				$('#dialog').html("<table><tr><td>ประจำปี </td><td>: "+val['assetYear']+"</td><tr>"+
				"<tr><td>เลขครุภัณฑ์ </td><td>: "+assetCode+"</td><tr>"+
				"<tr><td>ชื่อครุภัณฑ์ </td>"+
				"<td>:&nbsp<input id='editAssetName' type='text' value='"+val['assetName']+"' maxlength='30' "+
				"style='width: 150px;'></td></tr>"+
				"<tr><td>ราคาครุภัณฑ์ </td>"+
				"<td>:&nbsp<input id='editAssetPrice' type='text' value='"+val['assetPrice']+"' maxlength='30' "+
				"style='width: 70px;'>"+
				"&nbspบาท</td></tr>"+
				"<tr><td>หมายเหตุ </td>"+
				"<td>:&nbsp<input id='editRemark' type='text' value='"+val['remark']+"' maxlength='10' "+
				" style='width: 150px;'></td></tr>"+
				"<tr><td>วัน/เดือน/ปี ที่ได้มา </td>"+
				"<td>:&nbsp<input id='editAddDate' type='text' value='' maxlength='10' style='width: 150px;'></td></tr>"+
				"<tr><td>ผู้เพิ่มข้อมูล </td>"+
				"<td>:&nbsp"+val['firstName']+"  "+val['lastName']+"</td></tr>"+
				"</table>");
				
				
				$("#editAddDate").val(val['assetAddDate']);
				$("#editAddDate").datepicker({  
					dateFormat: 'dd/mm/yy',
					monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม',
					'กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
					changeMonth: true,
					changeYear: true ,
					onChangeMonthYear: function(){  
						setTimeout(function(){  
							$.each($(".ui-datepicker-year option"),function(j,k){  
								var textYear=parseInt($(".ui-datepicker-year option").eq(j).val());  
								$(".ui-datepicker-year option").eq(j).text(textYear);  
							});               
						},50);        
					},  
					onClose:function(){  
						if($(this).val()!="" && $(this).val()==dateBefore){           
							var arrayDate=dateBefore.split("/");  
							arrayDate[2]=parseInt(arrayDate[2]);  
							$(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);      
						}         
					},  
					onSelect: function(dateText, inst){   
						dateBefore=$(this).val();  
						var arrayDate=dateText.split("/");  
						arrayDate[2]=parseInt(arrayDate[2]);  
						$(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);  
					}  
					
				});
				
				$("#dialog").dialog({ 'title':'แก้ไขข้อมูล',width:400,position: [600,200],
					  buttons: {
						'ตกลง': function() {
							var regDate = /^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/;
							if ($('#editAssetName').val()== ""
							||$('#editAssetPrice').val()== ""
							||$('#editRemark').val()== ""
							||$('#editAddDate').val()== "")  
							{ 
									$('#addAsset').html('<center>กรุณาใส่ข้อมูลให้ครบถ้วน</center>');
									$('#addAsset').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
									buttons:[{text: "Ok",click: function(){$('#addAsset').dialog( "close" );
										if($('#editAssetName').val() == ""){
											$('#editAssetName').css("border-color","red");
										}
										else if($('#editAssetPrice').val() == ""){
											$('#editAssetPrice').css("border-color","red");
										}
										else if($('#editRemark').val() == ""){
											$('#editRemark').css("border-color","red");
										}
										else if($('#editAddDate').val() == ""){
											$('#editAddDate').css("border-color","red");
										}
									$('#editAssetName').focus();}}]});
									return false;  
							}
							else if(isNaN($('#editAssetPrice').val())){
									$('#addAsset').html('<center>กรุณาใส่ราคาครุภัณฑ์เป็นตัวแลข</center>');
									$('#addAsset').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
									buttons:[{text: "Ok",click: function(){$('#addAsset').dialog( "close" );
									$('#editAssetPrice').focus();}}]});
									return false;  
							}
							else if($('#editAssetPrice').val()<0||$('#editAssetPrice').val()>5000){
									$('#addAsset').html('<center>กรุณาใส่ราคาครุภัณฑ์ภายใน 5,000 บาทเท่านั้น</center>');
									$('#addAsset').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
									buttons:[{text: "Ok",click: function(){$('#addAsset').dialog( "close" );
									$('#editAssetPrice').focus();}}]});
									return false;
							}
							else if(!regDate.test($('#editAddDate').val())){
									$('#addAsset').html('<center>กรุณาวันที่ตามรูปแบบ วว/ดด/ปปปป</center>');
									$('#addAsset').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
									buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );
									$('#editAddDate').focus();}}]});
									return false;
							}
							else{
								$.get("../request/reqEditAsset.php",{'assetId':assetId,'upAssName':$('#editAssetName').val(),
									'upAssPrice':$('#editAssetPrice').val(),'upRemark':$('#editRemark').val(),
									'upAddDate':$('#editAddDate').val()},function(data)
										{
											$('#dialog').dialog('close');
											 getTableAsset();
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
			});
		});
	}
	
//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ ตรวจเช็คข้อมูลครุภัณฑ์
//*****************************************************************************************//
function getCheck(checkId)
	{
		$.getJSON("../request/reqSelCheck.php",{'checkId':checkId},function(data)
		{
			$.each(data,function(key,val)
			{
				$('#dialog').html("<table><tr><td>ประจำปี  </td><td>: "+val['assetYear']+"</td></tr>"+
				"<tr><td>วัน/เดือน/ปี ที่ได้มา </td><td>: "+val['assetAddDate']+"</td></tr>"+
				"<tr><td>เลขครุภัณฑ์  </td><td>: "+val['yearShort']+"/"+val['assetTypeCode']+"-"
				+val['assetTypeCode']+""+val['assetGroupCode']+
				"-"+val['assetCode']+"</td></tr>"+
				"<tr><td>ชื่อครุภัณฑ์  </td><td>: "+val['assetName']+"</td></tr>"+
				"<tr><td>วันที่เช็คล่าสุด  </td><td>: "+val['checkDate']+"</td></tr>"+
				"<tr><td>สถานะ  </td><td id='tdStat'>: <font size='4' color='red'>"+val['checkStatus']+"</font></td></tr>"+
				"<tr><td>ผู้เช็คล่าสุด  </td><td id='tdName'>: "+val['firstName']+"  "+val['lastName']+"</td></tr>"+
				"</table></br></br><center>"+
				"<table><td style='text-align:center;'><a class='button big icon approve' onClick='onCheckY("+checkId+");' "+
				"style='width:80px;'>ใช้งานได้</a>"+
				"<td style='text-align:center;'><a class='button big icon remove danger' onClick='onCheckN("+checkId+");' "+
				"style='width:80px;'>ชำรุด</a>"+
				"<td style='text-align:center;'><a class='button big icon trash danger' onClick='onCheckD("+checkId+");' "+
				"style='width:80px;'>เสื่อมสภาพ</a></center></table>");
				
				
				$("#dialog").dialog({ 'title':'ตรวจเช็คครุภัณฑ์',width:400,position: [600,200],
					  buttons: {
						'ยกเลิก': function() {
						   $(this).dialog('close');
						}
					  }
					});
				
			});
		});

	}

//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ ตรวจเช็คข้อมูลครุภัณฑ์ แต่ละสถานะ Y N D
//*****************************************************************************************//
function onCheckY(checkId,userId){
	if(userId==0){
		alert(userId);
	}
	$.get("../request/reqUpdateCheck.php",{'checkId':checkId,'status':"ใช้งานได้",'userId':userId},function(data)
					{
						$('#dialog').dialog('close');
						getTableCheck();
						
					});
}
function onCheckN(checkId){
	$.get("../request/reqUpdateCheck.php",{'checkId':checkId,'status':"ชำรุด"},function(data)
	{
		$('#dialog').dialog('close');
		getTableCheck();
		
	});
}
function onCheckD(checkId){
	
	$.get("../request/reqUpdateCheck.php",{'checkId':checkId,'status':"เสื่อมสภาพ"},function(data)
	{
		$('#dialog').dialog('close');
		getTableCheck();
		
	});
}

//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ ตรวจเช็คข้อมูลครุภัณฑ์ แต่ละสถานะ Y N D ผ่าน QR CODE
//*****************************************************************************************//
function onCheckQrY(checkId,userId){
	$.get("request/reqUpdateCheck.php",{'checkId':checkId,'status':"ใช้งานได้",'userId':userId},function(data)
	{
		$('#checkQRMo').load();
		var win = window.open('', '_self');
		win.close();
		
	});
}
function onCheckQrN(checkId,userId){
	$.get("request/reqUpdateCheck.php",{'checkId':checkId,'status':"ชำรุด",'userId':userId},function(data)
	{
		$('#checkQRMo').load();
		var win = window.open('', '_self');
		win.close();
		
	});
}
function onCheckQrD(checkId,userId){
	
	$.get("request/reqUpdateCheck.php",{'checkId':checkId,'status':"เสื่อมสภาพ",'userId':userId},function(data)
	{
		$('#checkQRMo').load();
		var win = window.open('', '_self');
		win.close();
		
	});
}

//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ กดเลือก List Menu ต่างๆ
//*****************************************************************************************//
function changeTypeCode(){
	var selectBox = document.getElementById("assetType");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
	getTableGroup(selectedValue);
}
function changeYear(){
	
	var selectBox = document.getElementById("assetYear");
    var selectedYear = selectBox.options[selectBox.selectedIndex].value;
	$.get("../page/tableAsset.php",{'searchCode':$('#searchAsset').val(),'assetYear':selectedYear,
	'assetTypeCode':'00',
	'assetGroupCode':'00'},function(data)
	{
		$('#showAsset').html(data);
		
	});
}
function changeYearCheck(){
	
	var selectBox = document.getElementById("assetYearCheck");
    var selectedYear = selectBox.options[selectBox.selectedIndex].value;
	$.get("../page/tableCheck.php",{'assetYear':selectedYear},function(data)
	{
		$('#showCheck').html(data);
	});
}
function changeGroupType(){
	var selectBox = document.getElementById("assetYear");
    var selectedYear = selectBox.options[selectBox.selectedIndex].value;
	
	var selectBox = document.getElementById("assetTypeG");
    var selectedType = selectBox.options[selectBox.selectedIndex].value;
	$.get("../page/listMenuGroup.php",{'assetTypeCode':selectedType},function(data)
	{
		$('#hdrAssetG').html(data);
	});
	$.get("../page/tableAsset.php",{'searchCode':$('#searchAsset').val(),'assetYear':selectedYear,
	'assetTypeCode':selectedType,
	'assetGroupCode':"00"},function(data)
	{
		$('#showAsset').html(data);
	});
}
function changeGroupCode(){
	
	var selectBox = document.getElementById("assetTypeG");
    var selectedType = selectBox.options[selectBox.selectedIndex].value;
	
	var selectBox = document.getElementById("assetGroup");
    var selectedGroup = selectBox.options[selectBox.selectedIndex].value;
	
	var selectBox = document.getElementById("assetYear");
    var selectedYear = selectBox.options[selectBox.selectedIndex].value;
	

	$.get("../page/tableAsset.php",{'searchCode':$('#searchAsset').val(),'assetYear':selectedYear,
	'assetTypeCode':selectedType,
	'assetGroupCode':selectedGroup},function(data)
	{
		$('#showAsset').html(data);
		
	});	
}

function changeType(){

	var selectBox = document.getElementById("addAssetType");
    var selectedType = selectBox.options[selectBox.selectedIndex].value;
	
	$.get("../page/addListMenuGroup.php",{'assetTypeCode':selectedType},function(data)
	{
		$('#addListAssetG').html(data);		
	});	
}

function changeYearQR(){

	var selectBox = document.getElementById("assetYearQR");
    var selectedYear = selectBox.options[selectBox.selectedIndex].value;
	
	$.get("../page/listMenuTypeQR.php",{'assetYear':selectedYear},function(data)
	{		
		$('#hdrTypeQR').html(data);		
	});	
}

function changeTypeQR(){

	var selectBox = document.getElementById("assetYearQR");
    var selectedYear = selectBox.options[selectBox.selectedIndex].value;
	
	var selectBox = document.getElementById("assetTypeQR");
    var selectedType = selectBox.options[selectBox.selectedIndex].value;
	
	$.get("../page/listMenuGroupQR.php",{'assetYear':selectedYear,'assetType':selectedType},function(data)
	{
		$('#hdrGroupQR').html(data);		
	});	
}

function changeGroupQR(){

	var selectBox = document.getElementById("assetYearQR");
    var selectedYear = selectBox.options[selectBox.selectedIndex].value;
	
	var selectBox = document.getElementById("assetTypeQR");
    var selectedType = selectBox.options[selectBox.selectedIndex].value;
	
	var selectBox = document.getElementById("assetGroupQR");
    var selectedGroup = selectBox.options[selectBox.selectedIndex].value;
	
	$.get("../page/listMenuAssetQR.php",{'assetYear':selectedYear,'assetType':selectedType,
	'assetGroup':selectedGroup},function(data)
	{
		$('#hdrAssetQR').html(data);		
	});	
}

function changePageUser(id){
	$.get("../page/tableUser.php",{'selectedPage':id},function(data)
	{		
		$('#showUser').html(data);		
	});	
}

function changePageAsset(id){
	$.get("../page/tableAsset.php",{'selectedPage':id,'searchCode':"",
	'assetYear':"0000",
	'assetTypeCode':"00",
	'assetGroupCode':"00"},function(data)
	{		
		$('#showAsset').html(data);		
	});	
}

function changePageCheck(id){
	$.get("../page/tableCheck.php",{'selectedPage':id,
	'assetYear':"0000"},function(data)
	{		
		$('#showCheck').html(data);		
	});	
}

function changePageMain(id,pageId){
	$.get("../page/tableMain.php",{'selectedPage':pageId,
	'id':id},function(data)
	{		
		$('#showMain').html(data);		
	});	
}


//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ แสดงตารางข้อมูล หน้าหลัก ประเภท หมวด ครุภัณฑ์ และตรวจเช็ค
//*****************************************************************************************//
function getTableMain(id){
	if(id==null){
		id="0";
	}
	$.get("../page/tableMain.php",{'id':id},function(data)
	{
		$('#showMain').html(data);		
	});
}

function getTableCheck(){	
	$.get("../page/tableCheck.php",function(data)
	{
		$('#showCheck').html(data);		
	});	
}

function getTableAsset(){
	$('#showAsset').html('');
	$.get("../page/tableAsset.php",{'searchCode':"",
	'assetYear':"0000",
	'assetTypeCode':"00",
	'assetGroupCode':"00"},function(data)
	{
		$('#showAsset').html(data);		
	});	
}

function getTableGroup(assetTypeId){
	if(assetTypeId==null){
		assetTypeId="0";
	}
	$.get("../page/tableGroup.php",{'assetTypeId':assetTypeId},function(data)
	{
		$('#showGroup').html(data);		
	});
}

function getTableType(){
	$.post("../page/tableType.php",function(data)
	{
		$('#showType').html(data);		
	});
}

function getTableUser(){
	$.get("../page/tableUser.php",function(data)
	{
		$('#showUser').html(data);		
	});
}
function getListType(){
	$.get("../page/listMenuType.php",function(data)
	{
		$('#hdrGroup').html(data);		
	});
}

//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ แสดง List Menu ต่างๆที่นำไปแสดง
//*****************************************************************************************//
function getListYear(){
	$.get("../page/listMenuYear.php",function(data)
	{
		$('#hdrAssetY').html(data);		
	});
}

function getListYearCheck(){
	$.get("../page/listMenuYearCheck.php",function(data)
	{
		$('#hdrCheck').html(data);		
	});
}

function getListTypeG(){
	$.get("../page/listMenuGroupType.php",function(data)
	{
		$('#hdrAssetT').html(data);		
	});
}

function getAddListType(){
	$.get("../page/addListMenuType.php",function(data)
	{
		$('#addListTgroup').html(data);		
	});
}

function getAddListAssetT(){
	$.get("../page/addListMenuType.php",function(data)
	{
		$('#addListAssetT').html(data);		
	});
}

function getListyearPrint(){
	$.get("../page/listMenuYearPrint.php",function(data)
	{
		$('#hdrPrintReport').html(data);		
	});
}

function getListMenuQR(){
	$.get("../page/listMenuYearQR.php",function(data)
	{
		$('#hdrYearQR').html(data);		
	});
}

//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ ส่งค่าออกรายงาน Excel
//*****************************************************************************************//
function printReport(){

	var selectBox = document.getElementById("assetYearPrint");
    var selectedPrint = selectBox.options[selectBox.selectedIndex].value;
	
	if(selectedPrint=="0000"){
		$("#dialog").html('กรุณาเลือกปี');
		$("#dialog").dialog({ 'title':'เกิดข้อผิดพลาด',position: [600,200],
					  buttons: {
						'ตกลง': function() {
						
						   $('#assetYearPrint').css("border-color","red");
									
						   $(this).dialog('close');
						}
					  }
					});
	}
	else{
		$.get("../page/printReportExcel.php",{'assetYear':selectedPrint},function(data)
		{			
			window.open("printReportExcel.php?assetYear="+selectedPrint);		
		});
	}
}

//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ สั่งพิมพ์ QR CODE
//*****************************************************************************************//
function printQR(){
		
	if($('#assetYearQR').val()=="0000"){
		$("#dialog").html('กรุณาเลือกปี');
		$("#dialog").dialog({ 'title':'เกิดข้อผิดพลาด',position: [600,200],
					  buttons: {
						'ตกลง': function() {
						$('#assetYearQR').css("border-color","red");
						   $(this).dialog('close');
						}
					  }
					});
	}
	else if($('#assetTypeQR').val()=="00"){
		$("#dialog").html('กรุณาเลือกประเภทครุภัณฑ์');
		$("#dialog").dialog({ 'title':'เกิดข้อผิดพลาด',position: [600,200],
					  buttons: {
						'ตกลง': function() {
						$('#assetTypeQR').css("border-color","red");
						   $(this).dialog('close');
						}
					  }
					});
	}
	else if($('#assetGroupQR').val()=="00"){
		$("#dialog").html('กรุณาเลือกหมวดครุภัณฑ์');
		$("#dialog").dialog({ 'title':'เกิดข้อผิดพลาด',position: [600,200],
					  buttons: {
						'ตกลง': function() {
						$('#assetGroupQR').css("border-color","red");
						   $(this).dialog('close');
						}
					  }
					});
	}
		
	else if($('#assetQRStart').val()>$('#assetQREnd').val()){
		
		$("#dialog").html('กรุณาใส่รหัสครุภัณฑ์ใหม่');
		$("#dialog").dialog({ 'title':'เกิดข้อผิดพลาด',position: [600,200],
					  buttons: {
						'ตกลง': function() {
						$('#assetQREnd').css("border-color","red");
						   $(this).dialog('close');
						}
					  }
					});
	}

	else{
		$.get("../page/printQR.php",{'QRyear':$('#assetYearQR').val(),'QRtype':$('#assetTypeQR').val(),
			'QRgroup':$('#assetGroupQR').val(),
			'QRassS':$('#assetQRStart').val(),
			'QRassE':$('#assetQREnd').val()},function(data)
			{				
				if (window.print) {
					var w = window.open('','_new');
					w.document.write(data);				
				}
			});
	}
}

//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ ค้นหาข้อมูล
//*****************************************************************************************//
function searchType(event){
	if(event.keyCode==13){
	$.get("../page/tableType.php",{'searchName':$('#searchType').val()},function(data)
		{
			$('#showType').html(data);			
		});
	}
	$.get("../page/tableType.php",{'searchName':$('#searchType').val()},function(data)
		{
			$('#showType').html(data);		
		});
	}


function searchAsset(event){
	if(event.keyCode==13){
	$.get("../page/tableAsset.php",{'searchCode':$('#searchAsset').val(),
	'assetYear':null,
	'assetTypeCode':null,
	'assetGroupCode':null},function(data)
		{
			$('#showAsset').html(data);		
		});
	}
	$.get("../page/tableAsset.php",{'searchCode':$('#searchAsset').val(),
	'assetYear':null,
	'assetTypeCode':null,
	'assetGroupCode':null},function(data)
	{
		$('#showAsset').html(data);		
	});
}

//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ Generate เลขครุภัณฑ์
//*****************************************************************************************//
function GenAssetCode(){
	var selectBox = document.getElementById("addAssetType");
    var selectedType = selectBox.options[selectBox.selectedIndex].value;
	var selectBox = document.getElementById("addAssetGroup");
    var selectedGroup = selectBox.options[selectBox.selectedIndex].value;
	
	var month = $('#addAssetAddDate').val().substring(3,5);
	var yearFull = $('#addAssetAddDate').val();
	var yearS = yearFull.substring(6,10);
	var yearPlus = yearS;
	
	if(month>=10&&month<=12){
		yearPlus = parseInt(yearS)+1;
		YearStr = yearPlus.toString();
		year = YearStr.substring(2,4);
	}else{
		yearPlus = parseInt(yearS);
		YearStr = yearPlus.toString();
		year = YearStr.substring(2,4);
	}
	
	
	var group = selectedType+selectedGroup;
	
	if($('#addAssetCode').val()==""){
		$.get("../request/reqGenAsset.php",{'addYear':YearStr,
		'addType':selectedType,'addGroup':selectedGroup},function(data)
			{
				if(data==null){
					$("#dialog").html('ไม่มีข้อมูล');
					$("#dialog").dialog({ 'title':'เกิดข้อผิดพลาด',position: [600,200],
								  buttons: {
									'ตกลง': function() {
									   $(this).dialog('close');
									}
								  }
								});
				}
				else if(data){
				}
				var genAssetCode = year+'/'+data;
				$('#genAssetCode').html(' เลขครุภัณฑ์ : '+genAssetCode);
				assetCode = data.substring(8,11);
				$('#addAssetCode').val(assetCode);
				
			});  
		}
	else{
		$.get("../request/reqGenAsset.php",{'addYear':YearStr,
		'addType':selectedType,'addGroup':selectedGroup},function(data)
			{
				if(data==null){
					$("#dialog").html('ไม่มีข้อมูล');
					$("#dialog").dialog({ 'title':'เกิดข้อผิดพลาด',position: [600,200],
								  buttons: {
									'ตกลง': function() {
									   $(this).dialog('close');
									}
								  }
								});
				}
				assetTypeCode = data.substring(0,2);
				assetGroupCode = data.substring(5,7);
				var genAssetCode = year+'/'+assetTypeCode+"-"+assetTypeCode+assetGroupCode+"-"+$('#addAssetCode').val();;
				$('#genAssetCode').html(' เลขครุภัณฑ์ : '+genAssetCode);
			});  		
	}
}