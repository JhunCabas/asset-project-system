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