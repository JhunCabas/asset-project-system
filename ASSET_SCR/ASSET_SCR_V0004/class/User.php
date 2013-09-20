<?php

	//include 'Config.php';
	include_once "Config.php";

	class User{
		private $id;
		private $username;
		private $password;
		private $firstName;
		private $lastName;
		private $position;
		private $status;
		private $mysql;
		private $error;
			
		public function __construct(){
			$db= new Config();
		}


		function User($mysql)
		{
			$this->mysql = $mysql;
		}
		
		function getUser()
		{
			
			return mysql_query('SELECT id,username,password,firstName,lastName,position,status FROM user');
		}
		
		function checkUser($uname)
		{
			
			return mysql_query('SELECT id,username,password,firstName,lastName,position,status FROM user WHERE username="'.$uname.'"');
		}
		
		function getEditUser($id)
		{
			
			return mysql_query('SELECT id,username,password,firstName,lastName,position,status FROM user WHERE id = "'.$id.'" LIMIT 1');
		}
		
		function editUser($id)
		{
			
			return mysql_query('UPDATE user SET firstName="'.$this->getFirstName().'",lastName="'.$this->getLastName().'",position="'.$this->getPosition().'",status="'.$this->getStatus().'" WHERE id="'.$id.'"');
		}
		
		public function login($username,$password){			
				$p=md5($password);
				
				$run=mysql_query('SELECT username,password,firstName,lastName,position,status FROM user WHERE username="'.$username.'" AND password="'.$p.'"');
				mysql_query("SET NAMES UTF8");
				$user_data = mysql_fetch_array($run);
				$row=mysql_num_rows($run);
				if ($row == 1){
					$_SESSION['login'] = true;
					$_SESSION['uname'] = $user_data['username'];
					$_SESSION['pass'] = $user_data['password'];
					$_SESSION['fName'] = $user_data['firstName'];
					$_SESSION['lName'] = $user_data['lastName'];
					$_SESSION['position'] = $user_data['position'];
					$_SESSION['status'] = $user_data['status'];
					return TRUE;
				}else{
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
			 $this->setStatus($status);
		}
		
		function addUser()
		{
			$regP=md5($this->getPassword());
			 mysql_query('INSERT INTO user (username,password,firstName,lastName,position,status)
			  VALUES ("'.$this->getUsername().'",
			 "'.$regP.'",
			 "'.$this->getFirstName().'",
			 "'.$this->getLastName().'",
			 "'.$this->getPosition().'",
			 "'.$this->getStatus().'")');
			 
			 return true;
		}
		
		function delUser()
		{
			 mysql_query('DELETE FROM user WHERE id="'.$this->id.'"');
			 return true;
		}

		public function get_session()
		{
			return $_SESSION['login'];
		}

		public function logout(){
			$_SESSION['login'] = FALSE;
        	session_destroy();
		}
		
		function getId()
		{
			return $this->id;
		}
		
		function setId($id)
		{
			$this->id = $id;
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
		function getStatus()
		{
			return $this->status;
		}
		
		function setStatus($status)
		{
			$this->status = $status;
		}
	}

	
	
				
				
			
?>