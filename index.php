<?php
	//require_once 'login.php';
	include 'navbar.php';
	require_once 'dbconnect.php';
	//include 'something else stylish.html';

 	$user = $_SESSION['username'];
 	$pass = $_SESSION['password'];
 	$name = $_SESSION['fname'];
 
?>

<!DOCTYPE HTML>
<html>

	<head>
		<title>Chops/User/<?= $user ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

    	<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	</head>

	<body>

     <img src="C:\wamp64\www\Chops\Resources\Etudes\5+2=7" class="img-thumbnail" alt="Responsive image">

<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
     <img src="<?= 'SELECT file FROM chops_etudes WHERE name = "5+2=7"'; ?>" class="img-fluid" alt="Etude">
      <div class="caption">
        <h3>"5+2=7"</h3>
        <p>Easy, Beginning Etude</p>
        <p><a href="chops_etudes.php" class="btn btn-primary" role="button">Check it out!</a></p>
      </div>
    </div>
  </div>
</div>


	</body>



</html>