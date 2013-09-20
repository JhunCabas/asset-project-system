$(function()
	{
		getdata();
		$("#addType").hide();
		getdataLost()
	});


function showAddType()  
{  
	if($("#addType").is(":visible")){
		$("#addType").slideUp();
		$(element).css('display:none')}
	else {
		$("#addType").slideDown();}
}  
	function showAddGroup()  
	{  
	$('#addGroup').html('<center>เพิ่มข้อมูลหมวดครุภัณฑ์ </br></br><select><option>Apples</option><option>Oranges</option><option>Banannas</option></select><input type="text" placeholder="รหัสหมวดครุภัณฑ์" width="100px"><input type="text" placeholder="ชื่อหมวดครุภัณฑ์"><a href="manage.php" class="button icon approve" onClick="">เพิ่ม</a></center>');
	
		if($("#addGroup").is(":visible")){
			$("#addGroup").slideUp();
			$(element).css('display:none')}
		else {
			$("#addGroup").slideDown();}
	}  
	
	function addAssetType()  
	{  
		$.get('class/AssetType.php',{'assetTypeCode': $('#assetTypeCode').val(),'assetTypeName': $('#assetTypeName').val()},function(data)
			{
				alert("[บันทึกแล้ว]");
				getdeta();
		});
	}  

function getdata()
	{
		$('#typeList').html('<center><img src=loading.png><br>Loading.</center>');
		$.getJSON('json.php',function(data)
		{

			$('#typeList').html('');
			
			$('#typeList').html($('#typeList').html()+'<tr class="yellow"><td width="30%">รหัสประเภท</td><td width="180px;">ชื่อประเภท</td><td width="80px;">แก้ไข</td><td width="80px;">ลบ</td></tr>');
			$.each(data,function(key,val)
			{
		$('#typeList').html($('#typeList').html()+'<tr><td>'+val['typeId']+'</td><td>'+val['typeName']+'</td><td><a class="button icon edit" onClick="" style="width:50px;">แก้ไข</a></td><td><a class="button icon remove" onClick="" style="width:50px;">ลบ</a></td></tr>');
				
  
			});
			
		});
	}
	
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