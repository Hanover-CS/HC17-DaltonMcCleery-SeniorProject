<?php

  session_start();
  //include 'login.php';

  $person = $_SESSION['fname']

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
          <li><a href="chops_etudes.php">Etudes</a></li>
          <li><a href="chops_videos.php">Videos</a></li>
          <li><a href="chops_audio.php">Audio</a></li>
          <li><a href="chops_rudiments.php">Rudiments</a></li>

        </ul>

      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

      <ul class="nav navbar-nav navbar-right">
		    <p class="navbar-text navbar-right"><a href="logout.php" class="navbar-link"> Sign out </a></p> 
		    <p class="navbar-text navbar-right">Signed in as <a href="update_user.php" class="navbar-link"> <?= $person ?></a></p>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>

    <!-- Greyed "Intro/Welcome" area below navbar -->
    <div class="jumbotron">
        <div class="container">
          <h1>Welcome to Chops!</h1>
          <p>Learn. Practice. Repeat.</p>
        </div>
    </div>

  </body>
</html>
