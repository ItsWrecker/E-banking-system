<?php
$servername = "localhost";
$username = "root";
$pas = "";
$dbname = "banking";

// Create connection
$conn = new mysqli($servername, $username, $pas, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['submit'])){
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$password=$_POST['password'];
	
	
	$account_number= rand(1111111111,9999999999);
	
	$sql = "SELECT id FROM users WHERE email='$email' ";	

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    
} else {
	
	$sql= "INSERT INTO users (name, account_number,email,mobile,password,avl_blc,address,aadhar) VALUES('$name','$account_number','$email','$mobile','$password',0,'kiit','0')";
     if ($conn->query($sql) === TRUE) {
   
	header('Location: index.html');
	
} else {
  echo "error_get_last";
}   
}
	
}


