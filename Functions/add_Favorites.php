<?php
 
  require_once $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Functions/functions.php';

  //the HTML form from the Favorite's button from the Twig Template file 
  //already has it's inputs populated with the correct info about what file is being added and from what table. 
  //The info is "hidden" from the user but is accessable through the address bar.
  //So when a student clicks the Favorite! button of a file, it runs the HTML form
  //and that throws the file and table info into the URL and loads this file. 
  //This file grabs that info and puts it into another function call that then adds the file into the database.

  $table = $_GET['table'];
  $fileID = $_GET['fileID'];

  //use the GET variables pass to us by the URL to temporarly create a new Content Object
  $newfavorite = new Content($fileID, $table);

  //Call the addFavorite method of the Student Class,
  //using are new Content Object, to add it to the Student's Favorites.
  $student->addFavorite($newfavorite);

 
  //if successfull, this will take the user back to the Libray they were in
  //and updates the Favorite Button to display "Favorited!" with a gold star.
  header("Location: /chops/hc07-chops/Library/library_builder.php?table=" . $table);
?>