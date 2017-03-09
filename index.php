<?php

	include 'navbar.php';
	//include 'something else stylish.html'; Twig...

?>
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Chops/User/<?php echo $student->getUsername(); ?></title>
 
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <!-- Bootstrap -->
        <link href='../css/bootstrap.min.css' rel='stylesheet' media='screen'>

    </head>

	<body>

	    <!-- Greyed "Intro/Welcome" area below navbar -->
    <div class="jumbotron">
        <div class="container">
          <h1><font color="red">My Favorites</font></h1>
          <p>Learn more about this feature and more in the <a href="help.php" class="navbar-link"> Help</a> section!</p>
        </div>
    </div>

    <!-- FIX THIS so it can work with all tables at once -->
    <?php
      include 'display_favorites.php';
    ?>



	</body>

</html>