<?php
	include 'navbar.php';
	require_once 'dbconnect.php';
	//include 'something else stylish.html';
	include 'functions.php';

	html_starter();
	$id = get_id($_SESSION['username'], $_SESSION['password'], $conn)
?>
<html>

	<body>

	    <!-- Greyed "Intro/Welcome" area below navbar -->
    <div class="jumbotron">
        <div class="container">
          <h1><font color="red">My Favorites</font></h1>
          <p>Learn more about this feature and more in the <a href="about.php" class="navbar-link"> About</a> section!</p>
        </div>
    </div>

    <?= get_Favorites($id, $conn) ?>




	</body>

</html>