
function showMainPage()  
{
	$('#main').load('manageMain.php');
}
function showManageUser()  
{
	
	$('#main').load('manageUser.php');
} 
function showManageType()  
{
	$('#main').load('manageType.php');
	
} 
function showManageGroup()  
{
	$('#main').load('manageGroup.php');
	
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
