<?php 

// $conn= new mysqli('localhost','root','','sems')or 
// die("Could not connect to mysql".mysqli_error($con));

?>

<?php
/* Database connection settings */
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'sems';
$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
	echo 'Connection Error to database'.mysqli_connect_error();
}
?>