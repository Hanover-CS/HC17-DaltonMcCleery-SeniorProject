<?php
   
   require $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-Chops/Database/dbconnect.php';
   require $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-Chops/Functions/student_class.php';
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
      //create temporary Student object to get ahold of the student's ID
      $temp_student = new Student($username, $password);
      $ID = $temp_student->getUserID();

      //using the student's ID, set newly made Student's progress table up
      //Used for the Rudiment Banner.
      //Set 'status' field of the DB table to 0, meaning that Rudiment isn't marked "Complete"
      //if 'status' field = 1, then that Rudiment is complete
      Database::connect()->setStudentProgress($ID);

      header("Location: /chops/hc07-chops/Login/login.php");

   } else {
      die ("Unsuccessful Creation, Please Try Again.");
      }

}?>