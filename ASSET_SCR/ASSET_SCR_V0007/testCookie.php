<?php
$username = $_POST['uname'];  
$password = $_POST['passwd']; 
setcookie("yourusername",$username,time()+5 );
setcookie ("yourpassword",$password,time()+5);

echo $_COOKIE['yourusername'];
?>