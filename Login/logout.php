<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: /chops/hc07-Chops/Login/login.php");
   }
?>