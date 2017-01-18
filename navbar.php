<?php

  session_start();
  include 'functions.php';
  require 'dbconnect.php';

  $person = $_SESSION['fname'];
  //echo $person;

?>


<!DOCTYPE HTML>
<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>

  <body>

	<nav class="navbar navbar-default navbar-fixed-top">
  	<div class="container">

      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Chops</a>
      </div>

      <!-- navbar Links to go to the different libraries -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">

          <li><a href="library.php?table=chops_etudes">Etudes</a></li>
           
          <li><a href="library.php?table=chops_videos">Videos</a></li>

          <li><a href="library.php?table=chops_audio">Audio</a></li>

          <li><a href="chops_rudiments.php">Rudiments</a></li>

        </ul>

      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

      <ul class="nav navbar-nav">
      <li><a href="about.php">About</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
		    <p class="navbar-text navbar-right"><a href="logout.php" class="navbar-link"> Sign out </a></p> 
		    <p class="navbar-text navbar-right">Signed in as <a href="update_user.php" class="navbar-link"> <?= $person ?></a></p>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>

</body>
</html>
