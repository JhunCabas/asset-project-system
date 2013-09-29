$(function()
	{
		$('#uname').focus();
	});


function required()  
{  
	var uname = document.forms["Login-form"]["username"].value;  
	var pword = document.forms["Login-form"]["password"].value;
	if (uname == "")  
	{  
		alert('sdsd');
		$('#dialog').html('<center>กรุณาใส่ชื่อผู้ใช้</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#uname').focus();}}]});
		return false;  
	}  
	else if(pword == ""){  
	alert('sx');
		$('#dialog').html('<center>กรุณาใส่รหัสผ่าน</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#uname').focus();}}]});
		return false;  
	}  
		
else   
	{  
		return true;   
	}  
}  

function validateLogin() {
		
		var uname = document.forms["login"]["username"].value;  
		var pword = document.forms["login"]["password"].value;
		
		if(uname == ""){
			alert('กรุณาใส่ชื่อผู้ใช้')
			return false;
		}
		else if(pword == "")
		{
			alert( "กรุณาใส่รหัสผ่าน" );
			return false;
		}
		else{
		}
}


function validateAddUser() {
	if ($('#regUname').val() == ""
	||$('#regPword').val()== ""
	||$('#regRePword').val()== ""
	||$('#regFname').val()== ""
	||$('#regLname').val()== ""
	||$('#regPosition').val()== ""
	||$('#regStatus').val()== "")  
	{ 
		$('#dialog').html('<center>กรุณาใส่ข้อมูลให้ครบถ้วน</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#uname').focus();}}]});
		return false;  
	}  
	else if($('#regUname').val().length<4||$('#regPword').val().length<4){  
	
		$('#dialog').html('<center>กรุณาใส่ข้อมูล 4-16 ตัวอักษร</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#uname').focus();}}]});
		return false;  
	}  
	else if($('#regStatus').val()=="สถานะ"){  
	
		$('#dialog').html('<center>กรุณาเลือกสถานะของผู้ใช้งาน</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#uname').focus();}}]});
		return false;  
	}  
	else if($('#regRePword').val()!=$('#regPword').val()){  
	
		$('#dialog').html('<center>กรุณาใส่รหัสผ่านให้ตรงกัน</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#uname').focus();}}]});
		return false;  
	}
	else if($('#regUname').val()!=""){ 
		var regExp = /[^a-z0-9]/i; 
		if(regExp.test($('#regUname').val())){
			$('#dialog').html('<center>กรุณาใส่ชื่อผู้ใช้เป็นตัวอักษร a-z หรือ 0-9 เท่านั้น</center>');
			$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
			buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#uname').focus();}}]});
			return false;
		}
		else if(regExp.test($('#regPword').val())){
			$('#dialog').html('<center>กรุณาใส่รหัสผ่านเป็นตัวอักษร a-z หรือ 0-9 เท่านั้น</center>');
			$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
			buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#uname').focus();}}]});
			return false;
		}
		else{
			$.get("../request/reqCheckUser.php",{'regUname':$('#regUname').val()},function(data)
								{
									if(data>=1){
										$('#dialog').html('<center>ชื่อผู้ใช้นี้มีคนใช้แล้ว</center>');
										$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
										buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#uname').focus();}}]});
										return false;  
									}
									else if(data==0){
										addUser();  
									}
									
								});  
			}  
		}
	else{
		
		//addUser();
		return false
	}
}
			
			
function validateAddType() {
	if ($('#addTypeCode').val() == ""
	||$('#addTypeName').val()== ""
	||$('#addTypeAddDate').val()== "")  
	{ 
		$('#dialog').html('<center>กรุณาใส่ข้อมูลให้ครบถ้วน</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#uname').focus();}}]});
		return false;  
	}
	else if($('#addTypeCode').val().length>2||$('#addTypeCode').val().length<2){
		$('#dialog').html('<center>รหัสประเภทควรมี 2 หลักเท่านั้น</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );
		$('#addTypeCode').focus();}}]});
		return false;  
	}
	else if($('#addTypeCode').val()!=""){  
	
		$.get("../request/reqCheckType.php",{'addTypeCode':$('#addTypeCode').val()},function(data)
							{
								if(data>=1){
									$('#dialog').html('<center>รหัสประเภทซ้ำ</center>');
									$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
									buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );
									$('#addTypeCode').focus();}}]});
									return false;  
								}
								else if(data==0){
									addType();  
								}
								
							});  
	}  
	else{
		
		//addUser();
		return false
	}
}
			
			
function validateAddGroup() {
	var selectBoxAdd = document.getElementById("addAssetType");
    var selectedValueAdd = selectBoxAdd.options[selectBoxAdd.selectedIndex].value;
	
	if (selectedValueAdd == null
	||$('#addGroupCode').val()== ""
	||$('#addGroupName').val()== "")  
	{ 
		$('#dialog').html('<center>กรุณาใส่ข้อมูลให้ครบถ้วน</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#uname').focus();}}]});
		return false;  
	}
	else if($('#addGroupCode').val().length>2||$('#addGroupCode').val().length<2){
		$('#dialog').html('<center>รหัสประเภทควรมี 2 หลักเท่านั้น</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );
		$('#addGroupCode').focus();}}]});
		return false;  
	}
	else{  
		$.get("../request/reqCheckGroup.php",{'addGroupCode':$('#addGroupCode').val(),'addTypeId':selectedValueAdd},function(data)
							{	
								if(data>=1){
									$('#dialog').html('<center>รหัสหมวดซ้ำ</center>');
									$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
									buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );
									$('#addGroupCode').focus();}}]});
									return false;  
								}
								else if(data==0){
									addGroup();  
									
								}
								
							});  
	}  
}

function validateAddAsset() {
	addAsset();
	/*
	if (selectedValueType == "00"
	||selectedValueGroup == "00"
	||$('#addAssetAddDate').val()== ""
	||$('#addAssetName').val()== ""
	||$('#addAssetPrice').val()== "")  
	{ 
		$('#dialog').html('<center>กรุณาใส่ข้อมูลให้ครบถ้วน</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#uname').focus();}}]});
		return false;  
	}
	else if($('#addAssetCode').val()==""){
		GenAssetCode();
	}
	else{  
		$.get("../request/reqCheckAsset.php",{'addYear':$('#addAssetAddDate').val(),'addTypeCode':selectedValueType,
		'addGroupCode':selectedValueGroup,'addAssetCode':$('#addAssetCode').val()},function(data)
							{
								if(data>=1){
									$('#dialog').html('<center>รหัสครุภัณฑ์ซ้ำ</center>');
									$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
									buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );
									$('#addAssetCode').focus();}}]});
									return false;  
								}
								else if(data==0){
									addAsset();  
								}
								
							});  
	}  
	*/
}
			
