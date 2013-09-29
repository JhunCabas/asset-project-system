<?php

		include_once("../class/User.php");
		$updateUser = new User();
		
		//$updateUser->setValues(null,null,"xxx","xxx","xxx","Officer");
		//$updateUser->setValues(null,null,$firstName,$lastName,$position,$stat);
		//$updateUser->editUser(12);
		

		$userId = $_GET["userId"];
		$oldPass = $_GET["oldPass"];
		$newPass = $_GET["newPass"];
		
		

			$updateUser->setPassword($newPass);
			$updateUser->getEditPassword($userId,$oldPass);
	
		
?>
