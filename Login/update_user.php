<?php

   include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Functions/functions.php';
   require $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Database/dbconnect.php';

   require_once 'update_screen.html';

//check if forum has already been submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

   //get and store user creds from the forum
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);
   $fname = mysqli_real_escape_string($conn, $_POST['fname']);

   //get ID field based on previous information BEFORE the update
   $user = $_SESSION['username'];
   $pass = $_SESSION['password'];
   $ID = get_id($user, $pass, $conn);

   //CHECK TO SEE IF 

   //MySQL Update Query
   $query = "UPDATE chops_students SET username='$username', password='$password', fname='$fname' WHERE id= '$ID'";
   $result = mysqli_query($conn, $query);

if($result) {

         //echo "Successfully Updated!";
         $_SESSION['username'] = $username;
         $_SESSION['password'] = $password;
         $_SESSION['fname'] = $fname;

   header("Location: /chops/hc07-chops/index.php");

   } else {
      die ("Unsuccessful Update, Please Try Again.");
      }

   // else if ($_SERVER["REQUEST_METHOD"] == "del") {

   // echo "Delete?";

}?>