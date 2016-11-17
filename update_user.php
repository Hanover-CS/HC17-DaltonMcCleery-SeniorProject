<?php
   session_start();
   require_once 'dbconnect.php';
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
   $get_id = "SELECT id FROM chops_students WHERE username= '$user' and password= '$pass'";

   //execute then convert the get_id query into an array
   $res = mysqli_fetch_array(mysqli_query($conn, $get_id));
   //then access the 'id' field of that array from the query
   $ID = $res['id'];

   //testing
   //echo " --- get_id query = '$ID' --- ";
   //echo "OLD - '$user' -";
   //echo " OLD - '$pass' -- -- -- ";
   //echo " NEW - '$username' -";
   //echo " NEW - '$password' -";
   //echo " NEW - '$fname' --";

   //MySQL Update Query
   $query = "UPDATE chops_students SET username='$username', password='$password', fname='$fname' WHERE id= '$ID'";

   //more testing
   //echo " --- --- UPDATE QUERY = '$query' --- --- STATUTS = ";

   $result = mysqli_query($conn, $query);

if($result) {

   //echo "Successfully Updated!";
         $_SESSION['username'] = $username;
         $_SESSION['password'] = $password;
         $_SESSION['fname'] = $fname;
   header("Location: index.php");

   } else {
      die ("Unsuccessful Update, Please Try Again.");
      }

} else if ($_SERVER["REQUEST_METHOD"] == "del") {

   echo "Delete?";



}?>