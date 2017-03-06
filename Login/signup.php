<?php
   
   require $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-Chops/Database/dbconnect.php';
   use \chops\hc07chops\Database\dbconnect;

   Database::setServer($server);

   include 'signup_screen.html';

   // If form submitted, insert values into the database.
   if (isset($_POST['username'])){

      $username = mysqli_real_escape_string(Database::connect()->conn, $_POST['username']);
      $password = mysqli_real_escape_string(Database::connect()->conn, $_POST['password']);
      $fname = mysqli_real_escape_string(Database::connect()->conn, $_POST['fname']);

      $values = [$username, $password, $fname];

   if (Database::connect()->insertStudent($values)) 
   {
      header("Location: /chops/hc07-chops/Login/login.php");

   } else {
      die ("Unsuccessful Update, Please Try Again.");
      }

}?>