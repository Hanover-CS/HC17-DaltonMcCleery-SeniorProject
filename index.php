<?php
	include 'navbar.php';
	require_once 'dbconnect.php';
	//include 'something else stylish.html';


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
          <h1><font color="red">My Favorites</font></h1>
          <p>Learn more about this feature and more in the <a href="about.html" class="navbar-link"> About</a> section!</p>
        </div>
    </div>







	</body>

</html>