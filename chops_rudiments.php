<?php
	include "navbar.php";

	//save this for Favorite Implementation of a rudiment
 	//$ID = get_id($_SESSION['username'], $_SESSION['password'], $conn);

  	html_starter();
?>

<html>
  	<body>
 		<div class="jumbotron">
    		<div class="container">
      			<div class="row">

      			<?php


      			for ($counter = 1; $counter <= 40; $counter++) 
	    		{	?>

        			<div class="col-sm-6 col-md-4">
      	  				<div class="thumbnail">

            				<?php display_Rudi($counter, "chops_rudiment", $conn);

        		} ?>


      	  				</div>
    				</div>
        		</div>


      			<?php  if ($counter % 3 == 0) {	?>

   					</div>
				<div class="row">
        

   				<?php	} ?>

    		</div>
	  	</div>
  	</body>
</html>