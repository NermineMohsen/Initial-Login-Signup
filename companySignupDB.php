<?php
class companySignupDB{
    private $conn;
    
    public function connect(){

        $server_name = 'localhost';
        $mysql_user = 'root';
        $mysql_password = '';
        $database_name = 'SWE';

        try {
          
            $this->conn = new PDO("mysql:host=$server_name;dbname=SWE", $mysql_user, $mysql_password);
    // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        }catch(PDOException $e)
    {
        echo "7aram";
    echo "Connection failed: " . $e->getMessage();
    }
    }
    public function add($name,$email,$password,$emp,$interest1,$interest2,$interest3,$interest4,$interest5){   
        echo $interest5;
             ///insert the user to db 
        if($this->check_dublicate_register($email)){
            return false;
        }
        if(isset($_POST['submit'])){ 
        $query;
       $interest1=$this->check_interest($interest1);
       $interest2=$this->check_interest($interest2);
       $interest3=$this->check_interest($interest3);
       $interest4=$this->check_interest($interest4);
       $interest5=$this->check_interest($interest5);
       if (!isset($interest1)){
                 $query = $this->conn->prepare("INSERT INTO company (Name, Password, Email, numOfEmp) VALUES ('$name', '$password', '$email', '$emp')"); 
       }
        else if (!isset($interest2)){
             $query = $this->conn->prepare("INSERT INTO company (Name, Password, Email, numOfEmp,interest1) VALUES ('$name', '$password', '$email', '$emp','$interest1')"); 
        }
        else if (!isset($interest3)){
             $query = $this->conn->prepare("INSERT INTO company (Name, Password, Email, numOfEmp,interest1,interest2) VALUES ('$name', '$password', '$email', '$emp','$interest1','$interest2')"); 
             echo "dkhl sah";
        }
        else if (!isset($interest4)){
             $query = $this->conn->prepare("INSERT INTO company (Name, Password, Email, numOfEmp,interest1,interest2,interest3) VALUES ('$name', '$password', '$email', '$emp','$interest1','$interest2','$interest3')"); 
        }
        else if (!isset($interest5)){
             $query = $this->conn->prepare("INSERT INTO company (Name, Password, Email, numOfEmp,interest1,interest2,interest3,interest4) VALUES ('$name', '$password', '$email', '$emp','$interest1','$interest2','$interest3','$interest4')"); 
        }
        else {
            echo "hna";
             $query = $this->conn->prepare("INSERT INTO company (Name, Password, Email, numOfEmp,interest1,interest2,interest3,interest4,interest5) VALUES ('$name', '$password', '$email', '$emp','$interest1','$interest2','$interest3','$interest4','$interest5')"); 
        }
        if ($query->execute()){
                 $id=$this->getID($email);
                session_start();
                $_SESSION['ID'] = $id;
                header('Location:Home.php?id='.$row['companyID']);
        
        return true;
        echo "dakhalloo";
       }
       }
      
       echo "ghlt";
    return false;
}

public function getID($email){
        //check if email has registered before 
  try {
    $query = $this->conn->prepare("select companyID from company where Email = '$email' limit 1");
    if ($query->execute()){
          if ($row = $query->fetch(PDO::FETCH_ASSOC)){
                 return $row['companyID'];
        }
    }
  }
catch(PDOException $e)
    {
        echo "7aram";
    echo "Connection failed: " . $e->getMessage();
    }
 }


public function check_dublicate_register($email){
        //check if email has registered before 
  try {
    $query = $this->conn->prepare("select * from company where Email = '$email' limit 1");
    if ($query->execute()){
          if ($row = $query->fetch(PDO::FETCH_ASSOC)){
                return true;
        }
    }
  }
catch(PDOException $e)
    {
        echo "7aram";
    echo "Connection failed: " . $e->getMessage();
    }
 }

public function check_interest($interest){
        //check if email has registered before 
 //   $back=NULL;
    if (isset($interest)){
  try {
    $query = $this->conn->prepare("select interestID from interests where interestname = '$interest' limit 1");
    if ($query->execute()){
          if ($row = $query->fetch(PDO::FETCH_ASSOC)){
                 return $row['interestID'];
                
        }
          else{
         $query = $this->conn->prepare("INSERT INTO interests (interestname) VALUES ('$interest')");         
        if ($query->execute()){
              $query = $this->conn->prepare("select interestID from interests where interestname = '$interest' limit 1");
          if ($query->execute()){
          if ($row = $query->fetch(PDO::FETCH_ASSOC)){
                 return $row['interestID'];
        }
    }
       }
    }
    }
  
  }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }}
    return NULL;
      //  return $back;

 }
}
 ?>