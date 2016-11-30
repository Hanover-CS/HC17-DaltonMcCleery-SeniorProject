<?php
	require_once 'dbconnect.php';

  include 'functions.php';
  include 'navbar.php';

	//$table = $_SESSION['library'];
  $table = 'chops_etudes';
?>


<!DOCTYPE html>
<html>

<head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>

<body>

    <div class="container">
    <div class="row">

<?php

for ($counter = 1; $counter <= 25; $counter++) 
	{	?>
      <div class="col-sm-6 col-md-4">
    	<div class="thumbnail">
			<button type="button" class="btn btn-default btn-lg">

				<!-- Favorite Option -->
  				<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> Favorite! </button>    


  				<img src=<?= get_file_address($counter, $table, $conn); ?> alt="Etude" style="width:242px; height:200px;">
          
     			<div class="caption">

              <!-- fix this -->
        			<h3>"<?= get_file_name($counter, $table, $conn); ?>"</h3>

              <!-- fix this -->
        			<p>Composer: <?= get_file_composer($counter, $conn); ?></p>

        			<p><a href="<?= get_file_address($counter, $table, $conn); ?>" class="btn btn-primary" role="button">Check it out!</a></p>

      			</div>
    	</div>
      </div>

<?php  if ($counter % 3 == 0) {	?>

   			</div>
   			<div class="row">
        

   	<?php	}} ?>

      </div>
		</div>
	</body>
</html>