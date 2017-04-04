<?php
 session_start();
 
 if(isset($_SESSION))
 {
	 header('Location: home.php');
 }else
	 header('Location: index.php');


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
      <a class="navbar-brand" href="#"><img src="logo.png" height="30px" width="20%"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
<div class="row">
  <div class="col-sm-8">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
		<li data-target="#myCarousel" data-slide-to="4"></li>
		<li data-target="#myCarousel" data-slide-to="5"></li>
		<li data-target="#myCarousel" data-slide-to="6"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox" >
        <div class="item active">
          <img src="2.jpg" alt="Image">
          <div class="carousel-caption">
            <h3></h3>
            <p></p>
          </div>      
        </div>

        <div class="item">
          <img src="1.jpg" alt="Image">
          <div class="carousel-caption">
            <h3></h3>
            <p></p>
          </div>      
        </div>
		<div class="item">
          <img src="1.jpg" alt="Image">
          <div class="carousel-caption">
            <h3></h3>
            <p></p>
          </div>      
        </div>
		<div class="item">
          <img src="1.jpg" alt="Image">
          <div class="carousel-caption">
            <h3></h3>
            <p></p>
          </div>      
        </div>
		<div class="item">
          <img src="1.jpg" alt="Image">
          <div class="carousel-caption">
            <h3></h3>
            <p></p>
          </div>      
        </div>
		<div class="item">
          <img src="1.jpg" alt="Image">
          <div class="carousel-caption">
            <h3></h3>
            <p></p>
          </div>      
        </div>
		<div class="item">
          <img src="1.jpg" alt="Image">
          <div class="carousel-caption">
            <h3></h3>
            <p></p>
          </div>      
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <div class="col-sm-4" background-color="#95a5a6">
		
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#user_login" title="User Login">User Login</a></li>
  <li><a data-toggle="tab" href="#create_account" title="Create Account">Create Account</a></li>
  <li><a data-toggle="tab" href="#admin_login" title="admin login">Admin Login</a></li>
</ul>

<div class="tab-content">
  <div id="user_login" class="tab-pane fade in active">
  <hr>
   
   <form action="login.php" method="POST">
  <div class="form-group">
    <label for="email">User Name:</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password">
  </div>
  <p><button type="submit" class="btn btn-default" name="submit">login</button><p data-toggle="modal" data-target="#myModal"><a href="#"> Reset password</a></P></P>
</form>
   
   
  </div>
  <div id="create_account" class="tab-pane fade">
  <hr>
   
   <form action="register.php" method="POST">
	<div class="form-group">
  
    <input type="text" class="form-control" name="name" placeholder="Enter your Name:">
	</div>
	
	<div class="form-group">
    <input type="email" class="form-control" name="email" placeholder="Enter your Email:">
	</div>
	
	
	<div class="form-group">
    <input type="text" class="form-control" name="mobile" placeholder="Mobile Number:">
	</div>
	<div class="form-group">
    <input type="password" class="form-control" id="password" placeholder="password" name="password"><br>
	
	</div>
	<button type="submit" class="btn btn-default" name="submit">SignUp</button>
</form>
   
   
   
   
  </div>
  <div id="admin_login" class="tab-pane fade">
    <hr>
	
	
	<form>
  <div class="form-group">
    <label for="email">User Name:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <p><button type="submit" class="btn btn-default">Login as Admin</button><p data-toggle="modal" data-target="#myModal"><a href="#"> Reset password</a></P></P>
</form>
	
   
  </div>
</div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  </div>
  
</div>
<hr>
</div>





<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
