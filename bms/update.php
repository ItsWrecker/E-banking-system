<?php
session_start();
$servername = "localhost";
$username = "root";
$pas = "";
$dbname = "banking";
$conn = new mysqli($servername, $username, $pas, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_SESSION)){
	
	$id=$_SESSION['id'];
	
}

if(isset($_POST['address'])){
	$address=$_POST['address'];
	
	
	$sql = "UPDATE users SET address='$address'  WHERE id='$id'";
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
	
}
if(isset($_POST['aadhar'])){
	
	$aadhar=$_POST['aadhar'];
	
	
	$sql_1 = "UPDATE users SET aadhar='$aadhar'  WHERE id='$id'";
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
}







?>