<?php /*
$server_name = 'localhost';
$mysql_user = 'root';
$mysql_password = '';
$database_name = 'bookverse';

$dbc = mysql_connect($server_name, $mysql_user, $mysql_password);
if (!$dbc) {
	die('Could not connect to database: ' . mysql_error());
}
mysql_select_db($database_name);
*/
?>


<?php
$server_name = 'localhost';
$mysql_user = 'root';
$mysql_password = '';
$database_name = 'bookverse';

try {
    $conn = new PDO("mysql:host=$server_name;dbname=bookverse", $mysql_user, $mysql_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>