<?php
 
  require_once 'dbconnect.php';
 
  include 'navbar.php';
 

 
  //the HTML form from the Favorite's button function in the functions.php file already has it's inputs populated with the correct info
 
  //about what file is being added and from what table. The info is "hidden" from the user but is accessable through the address bar.
 
  //So when a student clicks the Favorite! button of a file, it runs the HTML form and that throws the file and table info into the
 
  //address bar and loads this file. This file grabs that info and puts it into another function call that then adds the file into the database.
 
  $file = $_GET['file'];
 
  $table = $_GET['table'];
 
  $file_id = get_file_id($file, $table, $conn);
 

 
  //get student's ID to add the entry for the current student
 
  $ID = get_id($_SESSION['username'], $_SESSION['password'], $conn);
 

 
  //Function adds the file into the database with a forigen key to the chops_students table for the student who clicked the Favorite button
 
  //this fucntion also returns the user to their homepage, with the newly added file is Favorited.
 
  add_Favorite($file, $ID, $file_id, $conn);
 

 
?>
 \ No newline at end of file 
