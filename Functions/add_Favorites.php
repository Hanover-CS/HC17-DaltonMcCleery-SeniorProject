<?php
 
  require_once $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Database/dbconnect.php';
 
  include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/navbar.php';
 

 
  //the HTML form from the Favorite's button function in the functions.php file already has it's inputs populated with the correct info
  //about what file is being added and from what table. The info is "hidden" from the user but is accessable through the address bar.
  //So when a student clicks the Favorite! button of a file, it runs the HTML form and that throws the file and table info into the
  //address bar and loads this file. This file grabs that info and puts it into another function call that then adds the file into the database.
 
  $file = $_GET['file'];
  
  $table = $_GET['table'];
 
  $file_id = get_file_id($file, $table, $conn);
 

 
  //get student's ID to add the entry for the current student
 
  $ID = get_id($_SESSION['username'], $_SESSION['password'], $conn);
 
 
  $query = "INSERT INTO chops_favorites (student_id, file_id, file) VALUES ($ID, $file_id, '$file')";
 
  $result = mysqli_query($conn, $query);
 

 
  if (!$result)
  { echo "alert ('Cannot Add to Favorites at this time!')"; }
 

 
  //if successfull, this will take the user back to the homepage and display the newly added file in their Favorites section.
  header("Location: index.php");
 

 
  }
 

 
?> 
