<?php
 
  include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/navbar.php';
 

 
  //save this for Favorite Implementation of a rudiment
 
   //$ID = get_id($_SESSION['username'], $_SESSION['password'], $conn);
 
 
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
 

 

 
            for ($counter = 1; $counter <= 40; $counter++) 
 
          {  ?>
 

 
              <div class="col-sm-6 col-md-4">
 
                  <div class="thumbnail">
 

 
                    <?php display_Rudi($counter, "chops_rudiment", $conn);
 

              echo "</div>
 
            </div>
 
            </div>";
            } ?>
 

 

 
            <?php  if ($counter % 3 == 0) {  ?>
 

 
             </div>
 
        <div class="row">
 
        
 

 
           <?php  } ?>
 

 
        </div>
 
      </div>
 
    </body>
 
</html>