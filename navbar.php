<?php

  session_start();

  include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Functions/functions.php';
  require $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Database/dbconnect.php';

  $person = $_SESSION['fname'];

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
        <a class="navbar-brand" href="/chops/hc07-chops/index.php">Chops</a>
      </div>

      <!-- navbar Links to go to the different libraries -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">

          <li><a href="/chops/hc07-chops/Library/library_builder.php?table=chops_etudes">Etudes</a></li>
           
          <li><a href="/chops/hc07-chops/Library/library_builder.php?table=chops_videos">Videos</a></li>

          <li><a href="/chops/hc07-chops/Library/library_builder.php?table=chops_audio">Audio</a></li>

          <li><a href="/chops/hc07-chops/Library/chops_rudiments.php">Rudiments</a></li>

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
		    <p class="navbar-text navbar-right"><a href="/chops/hc07-chops/Login/logout.php" class="navbar-link"> Sign out </a></p> 
		    <p class="navbar-text navbar-right">Signed in as <a href="/chops/hc07-chops/Login/update_user.php" class="navbar-link"> <?= $person ?></a></p>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>

</body>
</html>
