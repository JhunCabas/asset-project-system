//*****************************************************************************************//
//*****************************************************************************************//
//*** ชื่อไฟล์ : validate.js
//*** คำอธิบาย : เป็นไฟล์ javascript ใช้สำหรับการตรวจสอบข้อมูลใน input
//*** Version : 1.0
//*** Credit By : นายนัฐวุฒิ  เผือกทอง
//*****************************************************************************************//
//*****************************************************************************************//

//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ ตรวจสอบการ Login
//*****************************************************************************************//	
function validateLogin() {
	$("form").submit(function(e){
		if(!$('#username').val()){
			$('#dialog').html('<center>กรุณาใส่ชื่อผู้ใช้</center>');
			$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
			buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#username').focus();}}]});
			e.preventDefault();
		}
		else if(!$('#password').val()){
			$('#dialog').html('<center>กรุณาใส่รหัสผ่าน</center>');
			$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',
			buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#password').focus();}}]});
			e.preventDefault();
		}

	});
}

//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ ตรวจสอบการ เพิ่มข้อมูลผู้ใช้งานระบบ
//*****************************************************************************************//	
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
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#regUname').focus();}}]});
		return false;  
	}  
	else if($('#regUname').val().length<4||$('#regPword').val().length<4){  
	
		$('#dialog').html('<center>กรุณาใส่ข้อมูล 4-16 ตัวอักษร</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#regUname').focus();}}]});
		return false;  
	}  
	else if($('#regStatus').val()=="สถานะ"){  
	
		$('#dialog').html('<center>กรุณาเลือกสถานะของผู้ใช้งาน</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#regStatus').focus();}}]});
		return false;  
	}  
	else if($('#regRePword').val()!=$('#regPword').val()){  
	
		$('#dialog').html('<center>กรุณาใส่รหัสผ่านให้ตรงกัน</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#regRePword').focus();}}]});
		return false;  
	}
	else if($('#regUname').val()!=""){ 
		var regExp = /[^a-z0-9]/i; 
		var regNum = /^[A-Za-zก-๙]+$/;
		if(regExp.test($('#regUname').val())){
			$('#dialog').html('<center>กรุณาใส่ชื่อผู้ใช้เป็นตัวอักษร a-z หรือ 0-9 เท่านั้น</center>');
			$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
			buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#regUname').focus();}}]});
			return false;
		}
		else if(regExp.test($('#regPword').val())){
			$('#dialog').html('<center>กรุณาใส่รหัสผ่านเป็นตัวอักษร a-z หรือ 0-9 เท่านั้น</center>');
			$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
			buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#regPword').focus();}}]});
			return false;
		}
		else if(!regNum.test($('#regFname').val())){
			$('#dialog').html('<center>กรุณาใส่ชื่อเป็นตัวอักษร a-z,ก-ฮ และสระเท่านั้น</center>');
			$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
			buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#regFname').focus();}}]});
			return false;
		}
		else if(!regNum.test($('#regLname').val())){
			$('#dialog').html('<center>กรุณาใส่นามสกุลเป็นตัวอักษร a-z,ก-ฮ และสระเท่านั้น</center>');
			$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
			buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#regLname').focus();}}]});
			return false;
		}
		else{
			$.get("../request/reqCheckUser.php",{'regUname':$('#regUname').val()},function(data)
			{
				if(data>=1){
					$('#dialog').html('<center>ชื่อผู้ใช้นี้มีคนใช้แล้ว</center>');
					$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
					buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#regUname').focus();}}]});
					return false;  
				}
				else if(data==0){
					addUser();  
				}
				
			});  
			}  
		}
	else{
		return false
	}
}
			
//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ ตรวจสอบการ เพิ่มข้อมูลประเภท
//*****************************************************************************************//		
function validateAddType() {
	if ($('#addTypeCode').val() == ""
	||$('#addTypeName').val()== ""
	||$('#addTypeAddDate').val()== "")  
	{ 
		$('#dialog').html('<center>กรุณาใส่ข้อมูลให้ครบถ้วน</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#uname').focus();}}]});
		return false;  
	}
	else if($('#addTypeCode').val().length>2||$('#addTypeCode').val().length<2){
		$('#dialog').html('<center>รหัสประเภทควรมี 2 หลักเท่านั้น</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );
		$('#addTypeCode').focus();}}]});
		return false;  
	}
	else if($('#addTypeCode').val()!=""){ 
		var regExp = /^[0-9]+$/; 
		if(!regExp.test($('#addTypeCode').val())){
				$('#dialog').html('<center>กรุณาใส่รหัสประเภทเป็น 0-9 เท่านั้น</center>');
				$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
				buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#regUname').focus();}}]});
				return false;
			}
		else{
			$.get("../request/reqCheckType.php",{'addTypeCode':$('#addTypeCode').val()},function(data)
			{
				if(data>=1){
					$('#dialog').html('<center>รหัสประเภทซ้ำ</center>');
					$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
					buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );
					$('#addTypeCode').focus();}}]});
					return false;  
				}
				else if(data==0){
					addType();  
				}
				
			});  
		}
	}
	else{
		return false
	}
}
			
//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ ตรวจสอบการ เพิ่มข้อมูลหมวด
//*****************************************************************************************//	
function validateAddGroup() {
	var selectBoxAdd = document.getElementById("addAssetType");
    var selectedValueAdd = selectBoxAdd.options[selectBoxAdd.selectedIndex].value;
	
	if (selectedValueAdd == "00"
	||$('#addGroupCode').val()== ""
	||$('#addGroupName').val()== "")  
	{ 
		$('#dialog').html('<center>กรุณาใส่ข้อมูลให้ครบถ้วน</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#uname').focus();}}]});
		return false;  
	}
	else if($('#addGroupCode').val().length>2||$('#addGroupCode').val().length<2){
		$('#dialog').html('<center>รหัสประเภทควรมี 2 หลักเท่านั้น</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );
		$('#addGroupCode').focus();}}]});
		return false;  
	}
	else if($('#addGroupCode').val()!=""){ 
		var regExp = /^[0-9]+$/; 
		if(!regExp.test($('#addGroupCode').val())){
				$('#dialog').html('<center>กรุณาใส่รหัสหมวดเป็น 0-9 เท่านั้น</center>');
				$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
				buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#regUname').focus();}}]});
				return false;
			}
		else{  
		$.get("../request/reqCheckGroup.php",{'addGroupCode':$('#addGroupCode').val(),
		'addTypeId':selectedValueAdd},function(data)
				{	
					if(data>=1){
						$('#dialog').html('<center>รหัสหมวดซ้ำ</center>');
						$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
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
	
}

//*****************************************************************************************//
//*** เป็นชุด Function ที่ใช้ในการ ตรวจสอบการ เพิ่มข้อมูลครุภัณฑ์
//*****************************************************************************************//	
function validateAddAsset(){
	if ($('#addAssetType').val() == "00"
	||$('#addAssetGroup').val() == "00"
	||$('#addAssetAddDate').val()== ""
	||$('#addAssetName').val()== ""
	||$('#addAssetPrice').val()== "")  
	{ 
		$('#dialog').html('<center>กรุณาใส่ข้อมูลให้ครบถ้วน</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );}}]});
		return false;  
	}
	else if($('#addAssetCode').val()==""){
		GenAssetCode();
		$('#dialog').html('<center>ระบบทำการแสดงเลขครุภัณฑ์ให้ กรุณากดเพิ่มข้อมูลอีกรอบ</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );}}]});
	}
	else if(isNaN($('#addAssetPrice').val())){
		$('#dialog').html('<center>กรุณาใส่ราคาครุภัณฑ์เป็นตัวแลข</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );}}]});
	}
	else if($('#addAssetPrice').val()<0||$('#addAssetPrice').val()>5000){
		$('#dialog').html('<center>กรุณาใส่ราคาครุภัณฑ์ภายใน 5,000 บาทเท่านั้น</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#regUname').focus();}}]});
		return false;
	}
	else if(isNaN($('#addAssetNum').val())){
		$('#dialog').html('<center>กรุณาใส่จำนวนครุภัณฑ์เป็นตัวแลข</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );}}]});
	}
	else if($('#addAssetNum').val()<0||$('#addAssetNum').val()>50){
		$('#dialog').html('<center>กรุณาใส่จำนวนครุภัณฑ์ครั้งละ 50 ชิ้นเท่านั้น</center>');
		$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
		buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#regUname').focus();}}]});
		return false;
	}
	else if($('#addAssetCode').val()!=""){ 
		var regExp = /^[0-9]+$/; 
		var regDate = /^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/;
		if(!regExp.test($('#addAssetCode').val())){
				$('#dialog').html('<center>กรุณาใส่รหัสครุภัณฑ์เป็น 0-9 เท่านั้น</center>');
				$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
				buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#regUname').focus();}}]});
				return false;
			}
		else if(!regDate.test($('#addAssetAddDate').val())){
				$('#dialog').html('<center>กรุณาวันที่ตามรูปแบบ วว/ดด/ปปปป</center>');
				$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
				buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );$('#regUname').focus();}}]});
				return false;
			}
		else{ 
		
			$.get("../request/reqCheckAsset.php",{'assetTypeId':$('#addAssetType').val(),
			'assetGroupId':$('#addAssetGroup').val(),
			'assetAddDate':$('#addAssetAddDate').val(),
			'assetCode':$('#addAssetCode').val()},function(data)
					{
						if(data>0){
							$('#dialog').html('<center>รหัสครุภัณฑ์ซ้ำ</center>');
							$('#dialog').dialog({'title':'เกิดข้อผิดพลาด',position: [600,200],
							buttons:[{text: "Ok",click: function(){$( this ).dialog( "close" );
							$('#addAssetCode').val('');
							$('#addAssetCode').focus();}}]});
							return false;   
						}
						else {
							addAsset(); 
						}
						
					});  
			}
	}
}
			
