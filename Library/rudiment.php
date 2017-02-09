<?php
 
    include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/navbar.php';
 

 
    //determines which rudiment to display
 
  $rudi = $_GET['id'];
 
    $ID = get_id($_SESSION['username'], $_SESSION['password'], $conn);
 

 
    html_starter();
 
?>