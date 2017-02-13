<?php

  //include the navbar, which in turn haas access to the functions file and connection to the database
  include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/navbar.php';

 
  //determines which database table to grab from
  $table = $_GET['table'];
  $ID = get_id($_SESSION['username'], $_SESSION['password'], $conn);
 
 
?>
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Chops/User <?php echo $student->get_username(); ?></title>
 
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <!-- Bootstrap -->
        <link href='../css/bootstrap.min.css' rel='stylesheet' media='screen'>
 
    </head>
 
  <body>
 
  <div class="jumbotron">
 
    <div class="container">
 
      <div class="row">
 

 
      <?php
 
      //used to make sure not to generate more visual blocks than needed
 
      if ($table == "chops_etudes")
 
      { $length = 53; 
 
      } else if ($table == "chops_audio")
 
      { $length = 22; 
 
      } else {
 
        $length = 10; }
 
 
      for ($counter = 1; $counter <= $length; $counter++) 
 
      {  ?>
 

 
        <div class="col-sm-6 col-md-4">
 
          <div class="thumbnail">
 
            <?php favorite_button( (get_file_address($counter, $table, $conn)), $table, $ID, $conn);  
 
            if ($table == "chops_etudes")
 
            {
              display_Etudes($counter, $table, $conn);
            } 
 
            else if ($table == "chops_audio")
 
            {
              display_Audio($counter, $table, $conn);
            } 
 
            else {
              display_Videos($counter, $table, $conn);
            } ?>

 
            </div>
 
          </div>
 
        </div>
 

 
      <!-- This is used to determine if/when a row should end. A row should only be 3 items, enough to fit nicely on a page.
 
      When the 3 item limit is reached, it closes that row's div tag and opens another row. -->
 
      <?php  if ($counter % 3 == 0) {  ?>
 
       </div>
 
     <div class="row">
 
     <?php  }} ?>

 
    </div>
 
    </div>
 
    </div>
 
  </body>
 
</html>