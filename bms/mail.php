<?php
 $from = "oooo@hotmail.com"; // sender
   $subject = " My cron is working";
   $message = "My first Cron  :)";

   // message lines should not exceed 70 characters (PHP rule), so wrap it

   $message = wordwrap($message, 70);

   // send mail

   ini_set("SMTP","localhost");
   ini_set("smtp_port","25");
   ini_set("sendmail_from","00000@gmail.com");
   ini_set("sendmail_path", "C:\wamp\bin\sendmail.exe -t");

   mail("jXXXXXX@gmail.com",$subject,$message,"From: $from\n");

   echo "Thank you for sending us feedback";

?>