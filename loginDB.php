<<?php 
class loginDB{
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
    public function getuser($Email,$password){
    	try {
    $query = $this->conn->prepare("select userID from user where Email = '$Email' and password='$password'");
    if ($query->execute()){echo "dkhlt";
          if ($row = $query->fetch(PDO::FETCH_ASSOC)){
         		echo "noooooooooooooooo";
         	 	 session_start();
                $_SESSION['ID'] = $row['userID'];
                header('Location:Home.php?id='.$row['userID']);
        
    			////redirect to home page            
        }
        else{ echo "mlksh account 3ndna ya habibi";}
    }

  }
catch(PDOException $e)
    {
        echo "7aram";
    echo "Connection failed: " . $e->getMessage();
    }
    }
}

 ?>