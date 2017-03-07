<?php

  include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Functions/functions.php';

?>


<!DOCTYPE HTML>
<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

      <!-- Extra files to make the Dropdown menu work correctly -->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
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

          <!-- Chops Etude Library Page -->
          <li><a href="/chops/hc07-chops/Library/library_builder.php?table=chops_etudes">Etudes</a></li>
          
          <!-- Chops Video Library Page -->
          <li><a href="/chops/hc07-chops/Library/library_builder.php?table=chops_videos">Videos</a></li>

          <!-- Chops Audio Library Page -->
          <li><a href="/chops/hc07-chops/Library/library_builder.php?table=chops_audio">Audio</a></li>

          <!-- Chops Rudiments Homepage -->
          <li><a href="/chops/hc07-chops/Library/chops_rudiments.php">Rudiments</a></li>

        </ul>

      <!-- Search through the available Etudes, Audio, and Video -->
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

      <!-- Dropdown Menu for Student's organizational links -->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown" class="navbar-text navbar-right">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $student->getName() ?><span class="caret"></span></a>

          <ul class="dropdown-menu">

            <!-- Link to go to the Update User page where a Student can
            change their username, password, or name -->
            <li><a href="/chops/hc07-chops/Login/update_user.php">Update Info</a></li>

            <!-- Link to go to the Helpful hint page to learn about some of the Features of Chops -->
            <li><a href="/chops/hc07-chops/help.php">Help</a></li>

            <!-- Work in Progress/TBA -->
            <li><a class="btn disabled" href="#">Chat/Forums</a></li>

            <!-- Link to Destroy the Session variables and Sign the Student out.
            Takes them back to the login page -->
            <li role="separator" class="divider"></li>
            <li><a href="/chops/hc07-chops/Login/logout.php">Sign Out</a></li>
          </ul>
        </li>
      </ul>

      <!-- This must come after the Dropdown menu above, due to spacing and layout
      with the "navbar-right" formatting -->
      <p class="navbar-text navbar-right">Signed in as</p>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>

</body>
</html>
