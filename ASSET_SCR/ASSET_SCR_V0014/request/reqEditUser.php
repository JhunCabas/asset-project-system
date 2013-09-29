<?php

		include_once("../class/User.php");
		$updateUser = new User();
		
		//$updateUser->setValues(null,null,"xxx","xxx","xxx","Officer");
		//$updateUser->setValues(null,null,$firstName,$lastName,$position,$stat);
		//$updateUser->editUser(12);
		

		$userId = $_GET["userId"];
		$firstName = $_GET["upFname"];
		$lastName = $_GET["upLname"];
		$position = $_GET["upPosition"];
		$stat = $_GET["upStatus"];
		
		
		if($stat=="1"){
			$stat="Administrator";
			$updateUser->setValues(null,null,$firstName,$lastName,$position,$stat);
			$updateUser->editUser($userId);
		}
		else if($stat=="2"){
			$stat="Officer";
			$updateUser->setValues(null,null,$firstName,$lastName,$position,$stat);
			$updateUser->editUser($userId);
		}
		else{
			
		}
		
		
?>
