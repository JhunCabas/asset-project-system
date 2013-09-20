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
					showManageUser();
					getTableUser();}}]});
			});
			
}
function addType(){
	

	var url = "../request/reqAddType.php";
	
			$.get(url,{'addTypeCode':$('#addTypeCode').val(),'addTypeName':$('#addTypeName').val(),
			'addTypeAddDate':$('#addTypeAddDate').val()},function(data)
			{
				$('#dialog').html('<center>เพิ่มข้อมูลเรียบร้อย</center>');
				$('#dialog').dialog({'title':'เพิ่มข้อมูล',
				buttons:[{text: "Ok",click: function(){
					
					$( this ).dialog( "close" );
					showManageType();
					getTableType();}}]});
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
function delType(id){
	
				$('#dialog').html("คุณต้องการลบข้อมูลนี้ใช่หรือไม่");
				$("#dialog").dialog({ 'title':'ลบข้อมูล',
					  buttons: {
						'ตกลง': function() {
							$.get("../request/reqDelType.php",{'id':id},function(data)
								{
									showManageType();
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

function delGroup(id){
	
				$('#dialog').html("คุณต้องการลบข้อมูลนี้ใช่หรือไม่");
				$("#dialog").dialog({ 'title':'ลบข้อมูล',
					  buttons: {
						'ตกลง': function() {
							$.get("../request/reqDelGroup.php",{'id':id},function(data)
								{
									showManageGroup();
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

function getEditUser(id)
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
	
function getEditType(id){
	$.getJSON("../request/reqSelType.php",{'id':id},function(data)
		{
			
			$.each(data,function(key,val)
			{				
				
				$('#dialog').html("<table><tr><td>ชื่อประเภท :</td>"+
				"<td><input id='editTypeName' type='text' value='"+val['assetTypeName']+"' style='width: 150px;'></td></tr>"+
				"</table>");
				/*
				var MyDate = new Date();
				var MyDateString;
				
				MyDate.setDate(MyDate.getDate());
				
				MyDateString = ('0' + MyDate.getDate()).slice(-2) + '/'
							 + ('0' + (MyDate.getMonth()+1)).slice(-2) + '/'
							 + (MyDate.getFullYear()+543);
				
				$("#editTypeDate").val(val['assetTypeAddDate']);
				$("#editTypeDate").datepicker({  
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
				*/
				$("#dialog").dialog({ 'title':'แก้ไขข้อมูล',
					  buttons: {
						'ตกลง': function() {
							
							if ($('#editTypeName').val()== ""
							||$('#editTypeDate').val()== "")  
							{ 
								$('#addType').html('<center>กรุณาใส่ข้อมูลให้ครบถ้วน</center>');
								$('#addType').dialog({'title':'เกิดข้อผิดพลาด',
								buttons:[{text: "Ok",click: function(){$('#addType').dialog( "close" );$('#editTypeName').focus();}}]});
								return false;  
							}  
							else{
								
								$.get("../request/reqEditType.php",{'id':id,'upTypeName':$('#editTypeName').val(),
									'upTypeDate':$('#editTypeDate').val()},function(data)
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
	
function changeTypeCode(){
	var selectBox = document.getElementById("assetType");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    alert(selectedValue);
	getTableGroup(selectedValue);
}

function getTableGroup(id){
	if(id==null){
		id="00";
	}
	$.post("../page/tableGroup.php",{'id':id},function(data)
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
	$.post("../page/tableUser.php",function(data)
	{
		$('#showUser').html(data);
		
	});
}
function getListType(){
	$.post("../page/listMenuType.php",function(data)
	{
		$('#hdrGroup').html(data);
		
	});
}
function getAddListType(){
	$.post("../page/addListMenuType.php",function(data)
	{
		$('#addListTgroup').html(data);
		
	});
}
