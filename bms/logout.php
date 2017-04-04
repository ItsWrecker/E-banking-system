<?php
  // If the user is logged in, delete the session vars to log them out
  session_start();
  if (isset($_SESSION)) {

    session_destroy();
	
	 header('Location: index.html');
  }
 
?>