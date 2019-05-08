<?php  
include "SignupDB.php";

class Signup{
    public $name;
    public $email;
    public $password;
    public $dob;
    public $gender;
    public $interests;
    public $interestarr=array(NULL,NULL,NULL,NULL,NULL);
  

    public $DA; //dataaccesslayer

   
   public function getvalues(){
    
     if(isset($_POST['submit'])){
       $this->name =$_POST['Name'];
       $this->email = $_POST['Email'];
       $this->password = $_POST['Password'];
       $this->dob =  $_POST['dob'];
       $this->gender = $_POST['Gender'];
       $this->interests = $_POST['input_field'];
       $indx=0;
       foreach ($this->interests as $val){ 
          $this->interestarr[$indx]=$val;
          $indx++;
      } 
   }
   if (isset($_POST['loginview'])){
   	$this->name =$_POST['name'];
   	 $this->password = $_POST['password'];
   }
   }
    public function add(){
        $this->DA = new SignupDB();
        $this->DA->connect();
        $this->DA->add($this->name,$this->email,$this->password,$this->dob,$this->gender,$this->interestarr[0],$this->interestarr[1],$this->interestarr[2],$this->interestarr[3],$this->interestarr[4]);    
    }
}

//main 

    $R = new Signup();
    $R->getvalues();
    $R->add();

?>