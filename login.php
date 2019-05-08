<?php 
include 'loginDB.php';
class login{
	public $Email;
	public $password;
	public $DataAccess;
	public function getinfo(){
		  
		$this->Email= $_POST['Email'];
       $this->password = $_POST['PassW']; 
    

	}
	public function getuser(){
		$this->DataAccess=new loginDB();
		$this->DataAccess->connect();
		$this->DataAccess->getuser($this->Email,$this->password);
	}
}
$log= new login();
$log->getinfo();
$log->getuser();
 ?>

