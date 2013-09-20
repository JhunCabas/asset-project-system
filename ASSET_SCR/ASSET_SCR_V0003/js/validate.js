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
	
		$.get("../request/reqCheckUser.php",{'regUname':$('#regUname').val()},function(data)
							{
								if(data==1){
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
	else{
		
		//addUser();
		return false
	}
}
			
			
