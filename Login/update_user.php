<?php

   use \chops\hc07chops\Database\dbconnect;
   include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-Chops/Functions/functions.php';

   require_once 'update_screen.html';

//check if forum has already been submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

   //get and store user creds from the forum
   $username = mysqli_real_escape_string(Database::connect()->conn, $_POST['username']);
   $password = mysqli_real_escape_string(Database::connect()->conn, $_POST['password']);
   $fname = mysqli_real_escape_string(Database::connect()->conn, $_POST['fname']);

   $values = [$username, $password, $fname, $student->getUserID()];

   if(Database::connect()->updateStudentQuery($values)) 
   {
      echo "Successfully Updated! <br>";
      $student->setName($fname);
      $student->setUsername($username);
      $student->setPassword($password);

      header("Location: /chops/hc07-chops/index.php");

   } else {
      die ("Unsuccessful Update, Please Try Again.");
      }

}?>