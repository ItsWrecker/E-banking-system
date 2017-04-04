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
	
	print_r($id);
	echo "<br>";
	
	
	
}
$trans_id= rand(1111111111,9999999999);

if(isset($_POST['inter_bank'])){
	
	$account_number=$_POST['account_number'];
	$beneficiary=$_POST['beneficiary'];
	$amount=$_POST['amount'];
	$ifsc_code=['ifsc_code'];
	$sql = "SELECT * FROM users WHERE account_number='$account_number'";
	$sqls = "SELECT * FROM users WHERE id='$id'";
	
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	
	$row = $result->fetch_assoc();
	
	$ids=$row['id'];
	$blc=$row['avl_blc'];
	echo $ids;
	echo "<br>";
	echo $blc;  
	echo "<br>";
}

		
	$results = $conn->query($sqls);

	if ($results->num_rows > 0) {
	
	$row = $results->fetch_assoc();
	
	$avl_blc=$row['avl_blc'];
	
	print_r($avl_blc);
	echo "<br>";
	}
	
	$new_blc=$avl_blc - $amount;
	$new_blc2=$blc + $amount;
	
	echo $new_blc;
	echo "<br>";
	echo $new_blc2;
	
	$sql_1 = "UPDATE users SET avl_blc='$new_blc' WHERE id='$id'";
	$sql_2 = "UPDATE users SET avl_blc='$new_blc2' WHERE id='$ids'";
	$sql_3 = "INSERT INTO transaction (user_id,trans_id,rcv_id,amt,ifsc_code) VALUES('$id','$trans_id','$ids','$amount','$ifsc_code')";

	if ($conn->query($sql_1) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
	
	if ($conn->query($sql_2) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
	  if ($conn->query($sql_3) === TRUE) {
   
	header('Location: home.php');
	
}else
	echo "error";
	 
	header('Location: home.php');
	

}







?>