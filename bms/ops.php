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

if( !isset($_SESSION))
{
	header('Location: index.html');
	
}
if(isset($_GET['user'])){
	
	$id=$_GET['user'];
	
	//print_r($id);
	$sql = "SELECT * FROM users WHERE id='$id'";	

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	
	$row = $result->fetch_assoc();
	$account=$row['account_number'];
	$name=$row['name'];
	$email=$row['email'];
	$mobile=$row['mobile'];
	$avl_blc=$row['avl_blc'];
	$address=$row['address'];
	$aadhar=$row['aadhar'];
	//print_r($avl_blc);
	
    // output data of each row
    
} else {
	echo "error";
        header('Location: index.html');
}
$conn->close();
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Banking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

    .carousel-inner img {
      width: 100%; /* Set width to 100% */
      max-height: 400px;
    }

    /* Hide the carousel text when the screen is less than 600 pixels wide */
    @media (max-width: 600px) {
      .carousel-caption {
        display: none; 
      }
    }
  </style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img src="logo.png" height="30px" width="30%"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
<div class="row">
  <div class="col-sm-8">
	<form method="post" action="">
		<div class="form-group">
		<label for="account">Account Number:</label>
		<input type="text" class="form-control" name="account"value="<?php echo $account; ?>">
		</div>
		<div class="form-group">
		<label for="account">Avl blc:</label>
		<input type="text" class="form-control" name="amt" value="<?php echo $avl_blc; ?>">
		</div>
		<div class="form-group">
		<label for="name">Name:</label>
		<input type="text" class="form-control" name="account" value="<?php echo $name; ?>">
		</div>
		<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>">
		</div>
		<div class="form-group">
		<label for="aadhar">Aadhar Number:</label>
		<input type="text" class="form-control"  name="aadhar"value="<?php echo $aadhar;?>">
		</div>
		<div class="form-group">
		<label for="address">Address:</label>
		<input type="text" class="form-control"  name="address" value="<?php echo $address;?>">
		</div>
		<button type="submit" class="btn btn-primary" name="update">Update</button>
	</form>
  
  </div>
</div>
</div>
</body>
</html>


