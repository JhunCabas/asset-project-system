function showAddAsset()  
				{  
				$('#addAsset').html('<font size="3px;">เพิ่มข้อมูลครุภัณฑ์</font> </br></br>');
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
				$('#addType').html('');
				$('#addType').html($('#addType').html()+'<input id="addTypeCode" type="text" placeholder="รหัสประเภทครุภัณฑ์" maxlength="2"/></br></br>');
				$('#addType').html($('#addType').html()+'<input id="addTypeName" type="text" placeholder="ชื่อประเภทครุภัณฑ์" maxlength="50"></br></br>');
				$('#addType').html($('#addType').html()+'<input id="addTypeAddDate" type="text" placeholder="วัน/เดือน/ปี ที่ได้มา" maxlength="10">&nbsp&nbsp');
				$('#addType').html($('#addType').html()+'<input id="btmAddType" type="button" class="button big" value="เพิ่ม" onClick="validateAddType();"/>&nbsp&nbsp');
				$('#addType').html($('#addType').html()+'<input id="btmClrType" type="button" class="button big danger" value="ล้างค่า" onClick="clearAddType();"/></center>');;
				
				if($("#addType").is(":visible")){
					$("#addType").slideUp();
					$(element).css('display:none')}
				else {
					$("#addType").slideDown();}
				
				var MyDate = new Date();
				var MyDateString;
				
				MyDate.setDate(MyDate.getDate());
				
				MyDateString = ('0' + MyDate.getDate()).slice(-2) + '/'
							 + ('0' + (MyDate.getMonth()+1)).slice(-2) + '/'
							 + (MyDate.getFullYear()+543);
				
				$("#addTypeAddDate").val(MyDateString);
				$("#addTypeAddDate").datepicker({  
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
