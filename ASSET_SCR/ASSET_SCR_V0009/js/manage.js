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
function addGroup(){
	var selectBoxAdd = document.getElementById("addAssetType");
    var selectedValueAdd = selectBoxAdd.options[selectBoxAdd.selectedIndex].value;
	
	

	var url = "../request/reqAddGroup.php";
	
			$.get(url,{'addGroupCode':$('#addGroupCode').val(),'addGroupName':$('#addGroupName').val(),
			'addTypeCode':selectedValueAdd},function(data)
			{
				$('#dialog').html('<center>เพิ่มข้อมูลเรียบร้อย</center>');
				$('#dialog').dialog({'title':'เพิ่มข้อมูล',
				buttons:[{text: "Ok",click: function(){
					
					$( this ).dialog( "close" );
					showManageGroup();
					getTableGroup();}}]});
			});
			
}
function addAsset(){
	
	var url = "../request/reqAddAsset.php";
	
			$.get(url,{'addAddDate':$('#addAssetAddDate').val(),'addType':$('#addAssetType').val(),
			'addGroup':$('#addAssetGroup').val(),'addAsset':$('#addAssetCode').val(),'addAssName':$('#addAssetName').val(),
			'addPrice':$('#addAssetPrice').val(),'addRemark':$('#addRemark').val()},function(data)
			{
				$('#dialog').html('<center>เพิ่มข้อมูลเรียบร้อย</center>');
				$('#dialog').dialog({'title':'เพิ่มข้อมูล',
				buttons:[{text: "Ok",click: function(){
					
					$( this ).dialog( "close" );
					showManageAsset();
					getTableAsset();}}]});
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

function delAsset(id){
	
				$('#dialog').html("คุณต้องการลบข้อมูลนี้ใช่หรือไม่");
				$("#dialog").dialog({ 'title':'ลบข้อมูล',
					  buttons: {
						'ตกลง': function() {
							$.get("../request/reqDelAsset.php",{'id':id},function(data)
								{
									showManageAsset();
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

function getEditGroup(id)
	{
		
		$.getJSON("../request/reqSelGroup.php",{'id':id},function(data)
		{
			
			$.each(data,function(key,val)
			{
				
				$('#dialog').html("<table><tr><td>รหัสประเภทครุภัณฑ์  </td><td>: "+val['assetTypeCode']+"</tr>"+
				"<tr><td>รหัสหมวดครุภัณฑ์  </td><td>: "+val['assetGroupCode']+"</td></tr>"+
				"<tr><td>ชื่อหมวดครุภัณฑ์ </td><td>:"+
				"<input id='editGname' type='text' value='"+val['assetGroupName']+"' style='width: 200px;' maxlength='20'></td></tr>"+
				"</table>");
				

				$("#dialog").dialog({ 'title':'แก้ไขข้อมูล',width:400,
					  buttons: {
						'ตกลง': function() {
							
							if ($('#assetGroupName').val() == "")  
							{ 
								$('#addGroup').html('<center>กรุณาใส่ข้อมูลให้ครบถ้วน</center>'+$('#editStat').val());
								$('#addGroup').dialog({'title':'เกิดข้อผิดพลาด',
								buttons:[{text: "Ok",click: function(){$('#addGroup').dialog( "close" );$('#editFname').focus();}}]});
								return false;  
							}  
							
							else{
								
								$.get("../request/reqEditGroup.php",{'id':id,'editGname':$('#editGname').val()},function(data)
										{
											$('#dialog').dialog('close');
											showManageGroup();
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


function getEditAsset(id){

	$.getJSON("../request/reqSelAsset.php",{'id':id},function(data)
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
				//alert(val['assetAddDate']);
				$('#dialog').html("<table><tr><td>ประจำปี </td><td>: "+val['assetYear']+"</td><tr>"+
				"<tr><td>เลขครุภัณฑ์ </td><td>: "+assetCode+"</td><tr>"+
				"<tr><td>ชื่อครุภัณฑ์ </td>"+
				"<td>:&nbsp<input id='editAssetName' type='text' value='"+val['assetName']+"' style='width: 150px;'></td></tr>"+
				"<tr><td>ราคาครุภัณฑ์ </td>"+
				"<td>:&nbsp<input id='editAssetPrice' type='text' value='"+val['assetPrice']+"' style='width: 70px;'>"+
				"&nbspบาท</td></tr>"+
				"<tr><td>หมายเหตุ </td>"+
				"<td>:&nbsp<input id='editRemark' type='text' value='"+val['remark']+"' style='width: 150px;'></td></tr>"+
				"<tr><td>วัน/เดือน/ปี ที่ได้มา </td>"+
				"<td>:&nbsp<input id='editAddDate' type='text' value='' style='width: 150px;'></td></tr>"+
				"</table>");
				
				
				$("#editAddDate").val(val['assetAddDate']);
				$("#editAddDate").datepicker({  
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
				
				$("#dialog").dialog({ 'title':'แก้ไขข้อมูล',width:400,
					  buttons: {
						'ตกลง': function() {
							
							if ($('#editAssetName').val()== ""
							||$('#editAssetPrice').val()== ""
							||$('#editRemark').val()== ""
							||$('#editAddDate').val()== "")  
							{ 
								$('#addAsset').html('<center>กรุณาใส่ข้อมูลให้ครบถ้วน</center>');
								$('#addAsset').dialog({'title':'เกิดข้อผิดพลาด',
								buttons:[{text: "Ok",click: function(){$('#addAsset').dialog( "close" );$('#editAssetName').focus();}}]});
								return false;  
							}  
							else{
								
								
								$.get("../request/reqEditAsset.php",{'id':id,'upAssName':$('#editAssetName').val(),
									'upAssPrice':$('#editAssetPrice').val(),'upRemark':$('#editRemark').val(),
									'upAddDate':$('#editAddDate').val()},function(data)
										{
											
											$('#dialog').dialog('close');
											//showManageAsset();
											getListYear();
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


function getCheck(id)
	{
		
		$.getJSON("../request/reqSelCheck.php",{'id':id},function(data)
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
				"<tr><td>สถานะ  </td><td id='tdStat'>: <font size='4' color='red'>"+val['status']+"</font></td></tr>"+
				"</table></br></br><center>"+
				"<td style='text-align:center;'><a class='button big icon approve' onClick='onCheckY("+id+");' "+
				"style='width:80px;'>ใช้งานได้</a>"+
				"<td style='text-align:center;'><a class='button big icon remove danger' onClick='onCheckN("+id+");' "+
				"style='width:80px;'>ชำรุด</a>"+
				"<td style='text-align:center;'><a class='button big icon trash danger' onClick='onCheckD("+id+");' "+
				"style='width:80px;'>เสื่อมสภาพ</a></center>");
				
				
				$("#dialog").dialog({ 'title':'ตรวจเช็คครุภัณฑ์',width:400,
					  buttons: {
						'ยกเลิก': function() {
						   $(this).dialog('close');
						}
					  }
					});
				
			});
		});

	}

function onCheckY(id){
	$.get("../request/reqUpdateCheck.php",{'id':id,'status':"ใช้งานได้"},function(data)
					{
						$('#dialog').dialog('close');
						getTableCheck();
						
					});
}
function onCheckN(id){
	$.get("../request/reqUpdateCheck.php",{'id':id,'status':"ชำรุด"},function(data)
	{
		$('#dialog').dialog('close');
		getTableCheck();
		
	});
}
function onCheckD(id){
	
	$.get("../request/reqUpdateCheck.php",{'id':id,'status':"เสื่อมสภาพ"},function(data)
	{
		$('#dialog').dialog('close');
		getTableCheck();
		
	});
}
function onCheckQrY(id){
	$.get("request/reqUpdateCheck.php",{'id':id,'status':"ใช้งานได้"},function(data)
					{
						var win = window.open('', '_self');
						win.close();
						
					});
}
function onCheckQrN(id){
	$.get("request/reqUpdateCheck.php",{'id':id,'status':"ชำรุด"},function(data)
	{
		var win = window.open('', '_self');
		win.close();
		
	});
}
function onCheckQrD(id){
	
	$.get("request/reqUpdateCheck.php",{'id':id,'status':"เสื่อมสภาพ"},function(data)
	{
		var win = window.open('', '_self');
		win.close();
		
	});
}
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
	
	$.get("../page/listMenuAssetQR.php",{'assetYear':selectedYear,'assetType':selectedType,'assetGroup':selectedGroup},function(data)
	{

		$('#hdrAssetQR').html(data);
		
	});
	
}



function printReport(){

	var selectBox = document.getElementById("assetYearPrint");
    var selectedPrint = selectBox.options[selectBox.selectedIndex].value;
	
	//alert(selectedPrint);
	
	$.get("../page/printReportExcel.php",{'assetYear':selectedPrint},function(data)
	{
		
		window.open("printReportExcel.php?assetYear="+selectedPrint);
	
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
	$.get("../page/tableAsset.php",{'searchCode':"",'assetYear':"0000",
	'assetTypeCode':"00",
	'assetGroupCode':"00"},function(data)
	{
		$('#showAsset').html(data);
		
	});
	
	
}

function getTableGroup(id){
	if(id==null){
		id="00";
	}
	$.get("../page/tableGroup.php",{'id':id},function(data)
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

function printQR(){
	
	var selectBox = document.getElementById("assetYearQR");
    var selectedYear = selectBox.options[selectBox.selectedIndex].value;
	
	var selectBox = document.getElementById("assetTypeQR");
    var selectedType = selectBox.options[selectBox.selectedIndex].value;
	
	var selectBox = document.getElementById("assetGroupQR");
    var selectedGroup = selectBox.options[selectBox.selectedIndex].value;
	
	var selectBox = document.getElementById("assetQRStart");
    var selectedStart = selectBox.options[selectBox.selectedIndex].value;
	
	var selectBox = document.getElementById("assetQREnd");
    var selectedEnd = selectBox.options[selectBox.selectedIndex].value;
	
	if(selectedStart>selectedEnd){
		
		$("#dialog").html('กรุณาใส่รหัสครุภัณฑ์ใหม่');
		$("#dialog").dialog({ 'title':'เกิดข้อผิดพลาด',
					  buttons: {
						'ตกลง': function() {
						   $(this).dialog('close');
						}
					  }
					});
	}
	else{
		$.get("../page/printQR.php",{'QRyear':selectedYear,'QRtype':selectedType,
			'QRgroup':selectedGroup,
			'QRassS':selectedStart,
			'QRassE':selectedEnd},function(data)
			{
				
				if (window.print) {
					var w = window.open('','_new');
					w.document.write(data);
				
				}
			});
	}
}


function searchAsset(event){
	//alert(event);
	if(event.keyCode==13){
				$.get("../page/tableAsset.php",{'searchCode':$('#searchAsset').val(),'assetYear':null,
	'assetTypeCode':null,
	'assetGroupCode':null},function(data)
	{
		$('#showAsset').html(data);
		
	});
	}
	$.get("../page/tableAsset.php",{'searchCode':$('#searchAsset').val(),'assetYear':null,
	'assetTypeCode':null,
	'assetGroupCode':null},function(data)
	{
		$('#showAsset').html(data);
		
	});
}
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
					alert("null");
				}
				var genAssetCode = year+'/'+selectedType+'-'+group+'-'+data;
				$('#genAssetCode').html(' เลขครุภัณฑ์ : '+genAssetCode);
				$('#addAssetCode').val(data);
				
			});  
		}
	else{
			var genAssetCode = year+'/'+selectedType+'-'+group+'-'+$('#addAssetCode').val();
			$('#genAssetCode').html(' เลขครุภัณฑ์ : '+genAssetCode);
	}
}
