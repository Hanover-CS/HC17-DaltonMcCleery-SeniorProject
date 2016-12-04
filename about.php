<?php
	include 'navbar.php';
?>

<!DOCTYPE HTML>
<html>

	<head>
		<title>Chops/User/<?= $_SESSION['username'] ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

    	<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	</head>

	<body>

	    <!-- Greyed "Intro/Welcome" area below navbar -->
    <div class="jumbotron">
        <div class="container">
          <h1>About</h1>
          <p>Helpful Hints and More!</p>
        </div>
    </div>


<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="http://localhost/chops/Fav_example.png" alt="Favorite Example">
    </a>
  </div>
  <div class="media-body">
    <h2 class="media-heading">Add a File to Favorites</h2>
    <p>- From one of the File Libraries (Etudes, Videos, Audio),</p>
    <p>- Locate and click on the <button type="button" class="btn btn-default btn-sm"> 
    							 <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> 
    							 Favorite! </button> button.</p>
    <p>- This file will now be displayed on your homepage everytime you login for quick access!</p>
    <p>- You can also click the same <button type="button" class="btn btn-default btn-sm"> 
    							 <span class="glyphicon glyphicon-star" aria-hidden="true"></span></button>
    	 button on that file on your homepage to remove it as well.</p>
  </div>
</div>






	</body>

</html>