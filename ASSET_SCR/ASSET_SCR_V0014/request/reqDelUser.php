<?php

		include_once("../class/User.php");
		$delUser = new User();
		
		$userId = $_GET["userId"];
		
			$delUser->setUserId($userId);
			$delUser->delUser();
		
		
		
?>
