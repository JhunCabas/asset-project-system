<?php
class User
{
	var $id = 0;
	var $username = '';
	var $password ='';
	var $firstName ='';
	var $lastName ='';
	var $position ='';
	var $status ='';
	var $mysql;
	var $error;

	function Student($mysql)
	{
		$this->mysql = $mysql;
	}
	function getUser()
	{
		return $this->mysql->query('SELECT student_name FROM student');
	}
	function doRegister()
	{
		$this->error = 'ไม่ได้กรอกชื่อ';
		return false;
		
		 $this->mysql->query('INSERT INTO student (student_name,student_lastname,student_username,student_password,student_birth)
		  VALUES ("'.$this->getName().'",
		 "'.$this->getLastName().'",
		 "'.$this->getUsername().'",
		 "'.$this->getPassword().'",
		 "'.$this->getBirth().'")');
		 return true;
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