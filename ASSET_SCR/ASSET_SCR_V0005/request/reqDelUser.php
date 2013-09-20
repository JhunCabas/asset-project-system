<?php

		include_once("../class/User.php");
		$delUser = new User();
		
		$delId = $_GET["id"];
		
			$delUser->setId($delId);
			$delUser->delUser();
		
		
		
?>
