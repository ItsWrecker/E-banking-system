<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	
$sql = "SELECT id FROM users WHERE email='$email' AND password='$password'";	

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
	$row = $result->fetch_assoc();
	
	$_SESSION['id']=$row["id"];
	
	
    // output data of each row
    header('Location: home.php');
} else {
        header('Location: index.html');
}
$conn->close();
}

?>