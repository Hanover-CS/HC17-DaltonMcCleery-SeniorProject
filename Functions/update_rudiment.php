<?php
 
  require_once $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Functions/functions.php';

  //Get the Rudiment ID from the submitted form
  $rudi_ID = $_GET['rudi_ID'];

  //Get the current Student's ID
  $ID = $student->getUserID();

  //Using both IDs, set the 'status' field of the corrosponding
  //Database row where the Rudiment ID and the Student ID's match
  //The above ID's
  Database::connect()->updateStudentProgress($ID, $rudi_ID);

 
  //if successfull, this will take the user back to the Rudiment page they were in
  //and updates the Completed button to display "Completed!" with a green checked box.
  header("Location: /chops/hc07-chops/Library/Rudiment/rudiment.php?id=" . $rudi_ID);
?>