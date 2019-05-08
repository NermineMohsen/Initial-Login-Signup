<?php
/*	include "_inc/db.open.php";

	$q=$_GET['q'];
	$my_data=$q;
	$conn=mysql_connect('localhost','root','') or die("Database Error");
	mysql_select_db('SWE',$conn);
	$sql="SELECT * FROM interests WHERE interestname LIKE '%$my_data%' ORDER BY id LIMIT 10";
	$result = mysql_query($sql) or die(mysql_error());
	
	if($result)
	{
		while($row=mysql_fetch_array($result))
		{
			echo $row['interestname']."\n";
		}
	}*/
?>

<?php
$server_name = 'localhost';
$mysql_user = 'root';
$mysql_password = '';
$database_name = 'SWE';

try {
	$q=$_GET['q'];
	$my_data=$q;
    $conn = new PDO("mysql:host=$server_name;dbname=SWE", $mysql_user, $mysql_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
	$query = $conn->prepare("SELECT * FROM interests WHERE interestname LIKE '%$my_data%'");
	if ($query->execute()){

		  while ($row = $query->fetch(PDO::FETCH_ASSOC)){
				echo $row['interestname']."\n";
		}
	}
	else
		echo 'Could not fetch results.';
	  }
catch(PDOException $e)
    {
		echo "7aram";
    echo "Connection failed: " . $e->getMessage();
    }
?>	