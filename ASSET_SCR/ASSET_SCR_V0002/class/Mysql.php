<?php
	
	if(preg_match("/Mysal.php/",$_SERVER['PHP_SELF'])){
		header("Location: ../index.php");	
	
	}

	#--> class นี้จะทำงานในส่วนของ data tier ที่ทำงานในส่วนของ ฐานข้อมูลเป็นหลัก
	/*	
		ประกอบด้วยฟังก์ชัน
			connectdb()
			clodedb()
			querydb()
			fetch()
			row()
			add()
			update()
			del()
			num()
			check()
			getNumbersOnly()			
	*/
	class DB{
	
		public $host = DB_HOST;
		public $conndb;
		public $db;
		public $result;
		public $sql;
		
		#--> Connection Database
		
		function connectdb($db_name="database",$user="username",$pass="password"){
		$this->username = $user;
		$this->password = $pass;
		$this->database = $db_name;
		$this->conndb = mysql_connect($this->host,$this->username,$this->password ) or die (mysql_error());
		$this->db = mysql_select_db($this->database,$this->conndb) or die (mysql_error());
		mysql_query("SET NAMES UTF8");

		}

		#--> Close Database
	
		function closedb(){
		
			mysql_close($this->conndb) or die (mysql_error());
				
		}
		
		#--> Method query คือการนำข้อมูลจากฐานข้อมูลมาแสดงทางจอภาพ Visibility = public
		function querydb($table,$where){
	
		if($where==""){
				
			$where="";	
			
		}else{
			
			$where=" WHERE ".$where;

		}
		
		$sql="SELECT * FROM ".$table.$where;
		
		if($result = mysql_query($sql)){
		
			return $result;
			
		}else{
		
			mysql_error();
			return false;
		
		}
		
	}
	
		#--> Method fatch คือการคืนค่า ค่าข้อมูลของ result ในแถวที่ชี้อยู่และเก็บไว้ที่ array และเลื้อนตัวชี้ไปชี้ที่ตำแหน่งถัดไป Visibility = public
		public function fetch($sql="sql"){
			
			$this->sql=$sql;
			if($result = mysql_fetch_array($this->sql)){
			
				return $result;
			
			}else{
			
				mysql_error();
				return false;	
			}
			
		}
		
		#--> Method row ใช้นับจำนวนแถวทั้งหมดของ result Visiblity = public
		function row($sql){
			
			return mysql_num_rows($sql);	
			
		}
		
		#--> Method add เพิ่มข้อมูลลงฐานข้อมูล Visibility = public
		public function add($table="table",$data="data"){
			
			$a_key=array_keys($data);
			$a_valus=array_values($data);
			$sum=count($a_key);
			for($i=0;$i<$sum;$i++){
				
				if(empty($add)){
					$add="(";
				}else{
					$add=$add.",";
				}
				
				if(empty($val)){
					$val="(";
				}else{
					$val=$val.",";
				}
					
					$add=$add.$a_key[$i];
					$val=$val."'".$a_valus[$i]."'";
			}
			
			$add=$add.")";
			$val=$val.")";
			$sql="INSERT INTO ".$table." ".$add." VALUES ".$val;
			if(mysql_query($sql)){
					
				return true;
						
			}else{
					
				mysql_error();
				return false;
						
			}	
		}
		
		#--> update แก้ไขข้อมูลในฐานข้อมูล Visibility public
		function update($table,$data,$where){
	
			$key=array_keys($data);
			$valus=array_values($data);
			$sum=count($key);
			$set="";
			for($i=0;$i<$sum;$i++){
				
				if(!empty($set)){
					
					$set=$set.",";	
					
				}
				$set=$set.$key[$i]."='".$valus[$i]."'";
				
			}
			$sql="UPDATE ".$table." SET ".$set." WHERE ".$where;
			if(mysql_query($sql)){
				
				return true;
				
			}else{
				
				mysql_error();
				return false;	
				
			}	
		}
		
		#--> delete ลบข้อมูลในฐานขอมูล Visibility = public
		function del($table,$where){
		
		$sql="DELETE FROM ".$table." WHERE ".$where;
			if(mysql_query($sql)){
			
				return true;	
			
			}else{
			
				mysql_error();
				return false;	
			
			}
		
		}
		
		#--> Num
		function num($field,$table,$where){
			if($where==""){
				
				$where="";	
				
			}else{
				
				$where=" WHERE ".$where;
	
			}
			
			$sql="SELECT $field FROM ".$table.$where;		
			if($result = mysql_query($sql)){
				
				return mysql_num_rows($result);	
				
			}else{
				
				mysql_error();
				return false;
				
			}
			
		}
		
		#--> เช็คค่า textfield ให้เป็นตัวเลข กรณี รหัสนักศึกษา และ เบอร์โทรศัพท์
		function check($number,$length)
		{
		  if(ctype_digit ($number) && strlen($number)==$length)
			return true;
		  else
			return false;
		}

	
		function getNumbersOnly($value){
			$numbers = '';
			for($i = 0; $i < strlen($value); $i++){
				$temp = ord(substr($value, $i, 1));
				if($temp > 47 && $temp < 58){
					$numbers .= chr($temp);
				}else{
					echo "ใส่รหัสนักศึกษาไม่ถูกต้อง";
				}
			}
			return $numbers;
		}
	}



?>