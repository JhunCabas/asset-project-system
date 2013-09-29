<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ User.php 
//** คำอธิบาย : ไฟล์นี้เป็น Class User เก็บ Attribute และ Method ของ User
//** Version : 1.0
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//

	include_once "Config.php";

	class User{
		//****************************************************************//
		//** Attribute ของ Class User 
		//****************************************************************//
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
		
		//****************************************************************//
		//** Method เรียกข้อมูล ผู้ใช้งานระบบ
		//****************************************************************//
		function getUser()
		{
			return mysql_query("SELECT userId,
			username,
			password,
			firstName,
			lastName,
			position,
			userStatus 
			FROM user");
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ผู้ใช้งานระบบ แบบแบ่งหน้า
		//****************************************************************//
		function getUserLimit($st,$end)
		{
			return mysql_query("SELECT userId,
			username,
			password,
			firstName,
			lastName,
			position,
			userStatus 
			FROM user LIMIT ".$st.",".$end."");
		}
		
		//****************************************************************//
		//** Method เช็คข้อมูลรหัสผ่าน ผู้ใช้งานระบบ
		//****************************************************************//
		function getOpass($userId,$oPass)
		{
			return mysql_query('SELECT password 
			FROM user 
			WHERE userId="'.$userId.'" 
			AND password="'.$oPass.'"');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ผู้ใช้งานระบบ ที่มีความสัมพันธ์กับข้อมูลอื่น
		//****************************************************************//
		function getUserRelation($userId)
		{
			
			return mysql_query('SELECT A.assetId 
			FROM asset AS A,
			checkasset AS B 
			WHERE B.assetId=A.assetId 
			AND A.userId = "'.$userId.'" 
			OR B.userId = "'.$userId.'"');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ผู้ใช้งานระบบ ด้วย username
		//****************************************************************//
		function checkUser($uname)
		{
			
			return mysql_query('SELECT userId,
			username,
			password,
			firstName,
			lastName,
			position,
			userStatus 
			FROM user 
			WHERE username="'.$uname.'"');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล ผู้ใช้งานระบบไปแก้ไข
		//****************************************************************//
		function getEditUser($userId)
		{
			
			return mysql_query('SELECT userId,
			username,
			password,
			firstName,
			lastName,
			position,
			userStatus 
			FROM user 
			WHERE userId = "'.$userId.'" LIMIT 1');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูลรหัสผ่าน ผู้ใช้งานระบบ
		//****************************************************************//
		function getEditPassword($userId,$pass)
		{
			$Opass = md5($pass);
			$newPass = md5($this->getPassword());
			return mysql_query('UPDATE user 
			SET password="'.$newPass.'" 
			WHERE userId="'.$userId.'" 
			AND password="'.$Opass.'"');
		}
		
		//****************************************************************//
		//** Method เรียกข้อมูล รหัสผู้ใช้งานระบบ
		//****************************************************************//
		function getUId($uname)
		{
			
			return mysql_query('SELECT userId,
			username,
			password,
			firstName,
			lastName,
			position,
			userStatus 
			FROM user 
			WHERE username = "'.$uname.'" LIMIT 1');
		}
		
		//****************************************************************//
		//** Method แก้ไขข้อมูล ผู้ใช้งานระบบ
		//****************************************************************//
		function editUser($userId)
		{
			
			return mysql_query('UPDATE user 
			SET firstName="'.$this->getFirstName().'",
			lastName="'.$this->getLastName().'",
			position="'.$this->getPosition().'",
			userStatus="'.$this->getUserStatus().'" 
			WHERE userId="'.$userId.'"');
		}
		
		//****************************************************************//
		//** Method ลงชื่อเข้าใช้ ด้วย Session
		//****************************************************************//
		public function login($username,$password){			
				$p=md5($password);
				
				$run=mysql_query('SELECT userId,
				username,
				password,
				firstName,
				lastName,
				position,
				userStatus 
				FROM user 
				WHERE username="'.$username.'" 
				AND password="'.$p.'"');
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
		
		//****************************************************************//
		//** Method ลงชื่อเข้าใช้ระบบ ด้วย Cookies
		//****************************************************************//
		public function loginCookies($username,$password){			
				$p=md5($password);
				$run=mysql_query('SELECT userId,
				username,
				password,
				firstName,
				lastName,
				position,
				userStatus 
				FROM user 
				WHERE username="'.$username.'" 
				AND password="'.$p.'"');
				mysql_query("SET NAMES UTF8");
				$user_data = mysql_fetch_array($run);
				$row=mysql_num_rows($run);
				if ($row == 1){
					$_SESSION['uId'] = $user_data['userId'];
					$uss=$user_data['username'];
					setcookie("cookname",$uss,time()+3600*24);
					return true;
				}else{
        			echo "<script type=\"text/javascript\">alert('ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด') </script>";  
					return FALSE;
				}
		}
		
		//****************************************************************//
		//** Method set ข้อมูลรวมของ class
		//****************************************************************//
		function setValues($username,$password,$firstName,$lastName,$position,$status)
		{
			
			 $this->setUsername($username);
			 $this->setPassword($password);
			 $this->setFirstName($firstName);
			 $this->setLastName($lastName);
			 $this->setPosition($position);
			 $this->setUserStatus($status);
		}
		
		//****************************************************************//
		//** Method เพิ่มข้อมูล ผู้ใช้งานระบบ
		//****************************************************************//
		function addUser()
		{
			$regP=md5($this->getPassword());
			 mysql_query('INSERT INTO user (username,
			 password,
			 firstName,
			 lastName,
			 position,
			 userStatus)
			 VALUES ("'.$this->getUsername().'",
			 "'.$regP.'",
			 "'.$this->getFirstName().'",
			 "'.$this->getLastName().'",
			 "'.$this->getPosition().'",
			 "'.$this->getUserStatus().'")');
			 
			 return true;
		}
		
		//****************************************************************//
		//** Method ลบข้อมูล ผู้ใช้งานระบบ
		//****************************************************************//
		function delUser()
		{
			 mysql_query('DELETE FROM user WHERE userId="'.$this->getUserId().'"');
			 return true;
		}

		//****************************************************************//
		//** Method Get,Set ของ Class User 
		//****************************************************************//
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