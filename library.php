<?php
	require_once 'dbconnect.php';

  include 'functions.php';
  include 'navbar.php';

  //determines which database table to grab from
	$table = $_GET['table'];
  $ID = get_id($_SESSION['username'], $_SESSION['password'], $conn);

  html_starter();
?>

<html>
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
	    {	?>

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

      <?php  if ($counter % 3 == 0) {	?>

   		</div>
   	<div class="row">
        

   	<?php	}} ?>

    </div>
	  </div>
    </div>
  </body>
</html>