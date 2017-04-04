<?php
session_start();


if(isset($_POST['admin'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	
	if($emall ="admin" && $password = "admin")
	{
		$_SESSION['id']='1';
		header('Location: admin.php');
	}else
		header('Location: index.html');
	
	
}




?>