<?php
 
    include 'navbar.php';
 

 
    //determines which rudiment to display
 
  $rudi = $_GET['id'];
 
    $ID = get_id($_SESSION['username'], $_SESSION['password'], $conn);
 

 
    html_starter();
 
?>