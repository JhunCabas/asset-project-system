function showAddAsset()  
{  
				//getTableAsset();
				$('#addAsset').html('');
	getAddListAssetT();
	$('#addAsset').html($('#addAsset').html()+'<div id="genAssetCode"></div></br>');
	$('#addAsset').html($('#addAsset').html()+'<table><tr><td>*<input id="addAssetAddDate" type="text" maxlength="10" style="width: 135px;"></td><td><div id="addListAssetT"></div></td><td><div id="addListAssetG"></div></td><td><input id="addAssetCode" type="text" placeholder="รหัสครุภัณฑ์" style="width: 70px;" maxlength="3"></td><td><a class="button icon comment" onClick="GenAssetCode();">แสดงเลขครุภัณฑ์</a></td></tr></table>');
	$('#addAsset').html($('#addAsset').html()+'</br><input id="addAssetName" type="text" placeholder="ชื่อครุภัณฑ์" maxlength="50">');
	$('#addAsset').html($('#addAsset').html()+'</br></br><input id="addAssetPrice" type="text" placeholder="ราคา" style="width: 50px;" maxlength="7">&nbsp บาท&nbsp&nbsp&nbsp');
	$('#addAsset').html($('#addAsset').html()+'<input id="addRemark" type="text" placeholder="หมายเหตุ" maxlength="50">&nbsp');
	$('#addAsset').html($('#addAsset').html()+'<a class="button big icon approve" onClick="validateAddAsset();">เพิ่ม</a></center>');
	$('#addAsset').html($('#addAsset').html()+'<input id="btmClrGroup" type="button" class="button big danger" value="ล้างค่า" onClick="clearAddGroup();"/></center>');
	
		if($("#addAsset").is(":visible")){
			$("#addAsset").slideUp();
			$(element).css('display:none')}
		else {
			$("#addAsset").slideDown();}
			
			var MyDate = new Date();
				var MyDateString;
				
				MyDate.setDate(MyDate.getDate());
				
				MyDateString = ('0' + MyDate.getDate()).slice(-2) + '/'
							 + ('0' + (MyDate.getMonth()+1)).slice(-2) + '/'
							 + (MyDate.getFullYear()+543);
				
				$("#addAssetAddDate").val(MyDateString);
				$("#addAssetAddDate").datepicker({  
        dateFormat: 'dd/mm/yy',
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
}  
				
function showAddType()  
{  
				$('#addType').html('');
				$('#addType').html($('#addType').html()+'<input id="addTypeCode" type="text" placeholder="รหัสประเภทครุภัณฑ์" maxlength="2"/></br></br>');
				$('#addType').html($('#addType').html()+'<input id="addTypeName" type="text" placeholder="ชื่อประเภทครุภัณฑ์" maxlength="50">&nbsp&nbsp');
				$('#addType').html($('#addType').html()+'<input id="btmAddType" type="button" class="button big" value="เพิ่ม" onClick="validateAddType();"/>&nbsp&nbsp');
				$('#addType').html($('#addType').html()+'<input id="btmClrType" type="button" class="button big danger" value="ล้างค่า" onClick="clearAddType();"/></center>');;
				
				if($("#addType").is(":visible")){
					$("#addType").slideUp();
					$(element).css('display:none')}
				else {
					$("#addType").slideDown();}
				
				
}  

function showAddGroup()  
	{  
	$('#addGroup').html('');
	getAddListType();
	$('#addGroup').html($('#addGroup').html()+'<div id="addListTgroup"></div>');
	$('#addGroup').html($('#addGroup').html()+'</br><input id="addGroupCode" type="text" placeholder="รหัสหมวดครุภัณฑ์" maxlength="2">&nbsp');
	$('#addGroup').html($('#addGroup').html()+'<input id="addGroupName" type="text" placeholder="ชื่อหมวดครุภัณฑ์" maxlength="50">&nbsp');
	$('#addGroup').html($('#addGroup').html()+'<a class="button big icon approve" onClick="validateAddGroup();">เพิ่ม</a></center>');
	$('#addGroup').html($('#addGroup').html()+'<input id="btmClrGroup" type="button" class="button big danger" value="ล้างค่า" onClick="clearAddGroup();"/></center>');
	
		if($("#addGroup").is(":visible")){
			$("#addGroup").slideUp();
			$(element).css('display:none')}
		else {
			$("#addGroup").slideDown();}
	}  

function showAddUser()  
	{  
	$('#addUser').html('');
	$('#addUser').html($('#addUser').html()+'<input id="regUname" type="text" placeholder="ชื่อผู้ใช้" maxlength="16"></br></br>');
	$('#addUser').html($('#addUser').html()+'<input id="regPword" type="password" placeholder="รหัสผ่าน" maxlength="16">');
	$('#addUser').html($('#addUser').html()+'<input id="regRePword" type="password" placeholder="รหัสผ่านอีกครั้ง" maxlength="16"></br></br>');
	$('#addUser').html($('#addUser').html()+'<input id="regFname" type="text" placeholder="ชื่อ" width="100px" maxlength="20">&nbsp');
	$('#addUser').html($('#addUser').html()+'<input id="regLname" type="text" placeholder="นามสกุล" maxlength="20">');
	$('#addUser').html($('#addUser').html()+'</br></br><input id="regPosition" type="text" placeholder="ตำแหน่ง" maxlength="20">&nbsp');
	$('#addUser').html($('#addUser').html()+'<select id="regStatus"><option>สถานะ</option><option>ผู้ดูแลระบบ</option>'
	+'<option>เจ้าหน้าที่พัสดุ</option></select>&nbsp&nbsp');
	$('#addUser').html($('#addUser').html()+'<input id="btmAddUser" type="button" class="button big" value="เพิ่ม" onClick="validateAddUser();"/>&nbsp&nbsp');
	$('#addUser').html($('#addUser').html()+'<input id="btmClrUser" type="button" class="button big danger" value="ล้างค่า" onClick="clearAddUser();"/></center>');
	
	
		if($("#addUser").is(":visible")){
			$("#addUser").slideUp();
			$(element).css('display:none')}
		else {
			$("#addUser").slideDown();}
	}  
