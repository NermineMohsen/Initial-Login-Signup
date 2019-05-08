<?php  
include "companySignupDB.php";

class companySignup{
    public $name;
    public $email;
    public $password;
    public $emp;
    public $interests;
    public $interestarr=array(NULL,NULL,NULL,NULL,NULL);
  

    public $DA; //dataaccesslayer

   
   public function getvalues(){
    
     if(isset($_POST['submit'])){
       $this->name =$_POST['Name'];
       $this->email = $_POST['Email'];
       $this->password = $_POST['Password'];
       $this->emp = $_POST['emp#'];
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
        $this->DA = new companySignupDB();
        $this->DA->connect();
        $this->DA->add($this->name,$this->email,$this->password,$this->emp,$this->interestarr[0],$this->interestarr[1],$this->interestarr[2],$this->interestarr[3],$this->interestarr[4]);    
    }
}

//main 

    $R = new companySignup();
    $R->getvalues();
    $R->ad();

?>