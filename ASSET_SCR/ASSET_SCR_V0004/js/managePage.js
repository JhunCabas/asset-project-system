
function showMainPage()  
{
	$('#main').load('manageMain.php');
}
function showManageUser()  
{
	
	$('#main').load('manageUser.php');
	getTableUser();
} 
function showManageType()  
{
	$('#main').load('manageType.php');
	getTableType();
	
} 
function showManageGroup()  
{
	$('#main').load('manageGroup.php');
	getListType();
	getTableGroup();
	
} 
function showManageAsset()  
{
	$('#main').load('manageAsset.php');
	
} 
function showCheckAsset()  
{
	$('#main').load('checkAsset.php');
	
}  
function showPrintReport()  
{
	$('#main').load('printReport.php');
	
}
function logOut()  
{
	$('#main').html('<?php $user->logout(); ?>');
	
}
