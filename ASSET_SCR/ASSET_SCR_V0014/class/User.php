<?php

	//include 'Config.php';
	include_once "Config.php";

	class User{
		private $userId;
		private $username;
		private $password;
		private $firstName;
		private $lastName;
		private $position;
		private $userStatus;
		private $mysql;
		private $error;
		
		public function __construct(){
			$db= new Config();
		}
		function getUser()
		{
			return mysql_query("SELECT userId,username,password,firstName,lastName,position,userStatus FROM user");
		}
		
		function getUserLimit($st,$end)
		{
			return mysql_query("SELECT userId,username,password,firstName,lastName,position,userStatus FROM user LIMIT ".$st.",".$end."");
		}
		
		function getOpass($userId,$oPass)
		{
			return mysql_query('SELECT password FROM user WHERE userId="'.$userId.'" AND password="'.$oPass.'"');
		}
		
		function getUserRelation($userId)
		{
			
			return mysql_query('SELECT A.assetId FROM asset AS A,checkasset AS B WHERE B.assetId=A.assetId AND A.userId = "'.$userId.'" OR B.userId = "'.$userId.'"');
		}
		
		function checkUser($uname)
		{
			
			return mysql_query('SELECT userId,username,password,firstName,lastName,position,userStatus FROM user WHERE username="'.$uname.'"');
		}
		
		function getEditUser($userId)
		{
			
			return mysql_query('SELECT userId,username,password,firstName,lastName,position,userStatus FROM user WHERE userId = "'.$userId.'" LIMIT 1');
		}
		function getEditPassword($userId,$pass)
		{
			$Opass = md5($pass);
			$newPass = md5($this->getPassword());
			return mysql_query('UPDATE user SET password="'.$newPass.'" WHERE userId="'.$userId.'" AND password="'.$Opass.'"');
		}
		
		function getUId($uname)
		{
			
			return mysql_query('SELECT userId,username,password,firstName,lastName,position,userStatus FROM user WHERE username = "'.$uname.'" LIMIT 1');
		}
		
		function editUser($userId)
		{
			
			return mysql_query('UPDATE user SET firstName="'.$this->getFirstName().'",lastName="'.$this->getLastName().'",position="'.$this->getPosition().'",userStatus="'.$this->getUserStatus().'" WHERE userId="'.$userId.'"');
		}
		
		public function login($username,$password){			
				$p=md5($password);
				
				$run=mysql_query('SELECT userId,username,password,firstName,lastName,position,userStatus FROM user WHERE username="'.$username.'" AND password="'.$p.'"');
				mysql_query("SET NAMES UTF8");
				$user_data = mysql_fetch_array($run);
				$row=mysql_num_rows($run);
				if ($row == 1){
					$_SESSION['login'] = true;
					$_SESSION['uId'] = $user_data['userId'];
					$_SESSION['uname'] = $user_data['username'];
					$_SESSION['pass'] = $user_data['password'];
					$_SESSION['fName'] = $user_data['firstName'];
					$_SESSION['lName'] = $user_data['lastName'];
					$_SESSION['position'] = $user_data['position'];
					$_SESSION['status'] = $user_data['userStatus'];
					return TRUE;
				}else{
					

        			echo "<script type=\"text/javascript\">alert('ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด') </script>";  


					return FALSE;
				}
		}
		
		public function loginCookies($username,$password){			
				$p=md5($password);
				
				$run=mysql_query('SELECT userId,username,password,firstName,lastName,position,userStatus FROM user WHERE username="'.$username.'" AND password="'.$p.'"');
				mysql_query("SET NAMES UTF8");
				$user_data = mysql_fetch_array($run);
				$row=mysql_num_rows($run);
				if ($row == 1){
					$_SESSION['uId'] = $user_data['userId'];
					$uss=$user_data['username'];
					setcookie("cookname",$uss,time()+10);
					//setcookie("cookname",$uss,time()+3600*24);
					//$_COOKIE[md5('yourusername')];
					return true;
				}else{
					

        			echo "<script type=\"text/javascript\">alert('ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด') </script>";  


					return FALSE;
				}
		}

		function setValues($username,$password,$firstName,$lastName,$position,$status)
		{
			
			 $this->setUsername($username);
			 $this->setPassword($password);
			 $this->setFirstName($firstName);
			 $this->setLastName($lastName);
			 $this->setPosition($position);
			 $this->setUserStatus($status);
		}
		
		function addUser()
		{
			$regP=md5($this->getPassword());
			 mysql_query('INSERT INTO user (username,password,firstName,lastName,position,userStatus)
			  VALUES ("'.$this->getUsername().'",
			 "'.$regP.'",
			 "'.$this->getFirstName().'",
			 "'.$this->getLastName().'",
			 "'.$this->getPosition().'",
			 "'.$this->getUserStatus().'")');
			 
			 return true;
		}
		
		function delUser()
		{
			 mysql_query('DELETE FROM user WHERE userId="'.$this->getUserId().'"');
			 return true;
		}

		public function getSession()
		{
			return $_SESSION['login'];
		}

		public function logout(){
			$_SESSION['login'] = FALSE;
        	session_destroy();
		}
		
		function getUserId()
		{
			return $this->userId;
		}
		
		function setUserId($userId)
		{
			$this->userId = $userId;
		}
		function getUsername()
		{
			return $this->username;
		}
		
		function setUsername($username)
		{
			$this->username = $username;
		}
		function getPassword()
		{
			return $this->password;
		}
		
		function setPassword($password)
		{
			$this->password = $password;
		}
		function getFirstName()
		{
			return $this->firstName;
		}
		
		function setFirstName($firstName)
		{
			$this->firstName = $firstName;
		}
		function getLastName()
		{
			return $this->lastName;
		}
		
		function setLastName($lastName)
		{
			$this->lastName = $lastName;
		}
		function getPosition()
		{
			return $this->position;
		}
		
		function setPosition($position)
		{
			$this->position = $position;
		}
		function getUserStatus()
		{
			return $this->userStatus;
		}
		
		function setUserStatus($userStatus)
		{
			$this->userStatus = $userStatus;
		}
	}

	
	
				
				
			
?>