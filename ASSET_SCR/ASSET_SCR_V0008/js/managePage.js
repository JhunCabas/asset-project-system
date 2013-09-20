
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
	$('#searchAsset').autocomplete({source: "../request/reqSelSearch.php",minLength: 2});
	getTableAsset();
	getListYear();
	getListTypeG();
	
} 
function showCheckAsset()  
{
	$('#main').load('checkAsset.php');
	getListYearCheck();
	getTableCheck();
	
}  
function showPrintReport()  
{
	$('#main').load('printReport.php');
	getListyearPrint();
	
}
function logOut()  
{
	$('#main').html('<?php $user->logout(); ?>');
	
}
