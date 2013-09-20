<?php

		include_once("../class/User.php");
		$updateUser = new User();
		
		//$updateUser->setValues(null,null,"xxx","xxx","xxx","Officer");
		//$updateUser->setValues(null,null,$firstName,$lastName,$position,$stat);
		//$updateUser->editUser(12);
		

		$id = $_GET["id"];
		$firstName = $_GET["upFname"];
		$lastName = $_GET["upLname"];
		$position = $_GET["upPosition"];
		$stat = $_GET["upStatus"];
		
		
		if($stat=="1"){
			$stat="Administrator";
			$updateUser->setValues(null,null,$firstName,$lastName,$position,$stat);
			$updateUser->editUser($id);
		}
		else if($stat=="2"){
			$stat="Officer";
			$updateUser->setValues(null,null,$firstName,$lastName,$position,$stat);
			$updateUser->editUser($id);
		}
		else{
			
		}
		
		
?>
