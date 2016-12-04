<?php
	session_start();

//connect to database
	require_once 'dbconnect.php';
	
	require_once 'log_screen.html';
	include 'functions.php';

	echo "		<meta name='viewport' content='width=device-width, initial-scale=1.0'>

    			<!-- Bootstrap -->
    			<link href='css/bootstrap.min.css' rel='stylesheet' media='screen'>";

//check if forum has already been submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

	//get and store user creds from the forum
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$query = "SELECT * FROM chops_students WHERE username= '$username' and password= '$password'";
	//echo $query;
	$result = mysqli_query($conn, $query);
 	$count = mysqli_num_rows($result);

	//check to see if query was successful
	if ($result) {

		$store_res = mysqli_fetch_array($result);
		//check to see it returned only 1 row
		if ($count == 1) {

			if ($username != $store_res['username'])
				{ echo "<div class='alert alert-warning' role='alert'> FAKE </div>"; }
			//set session variables
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['fname'] = $store_res['fname'];
			//$_SESSION['logged_in'] = 1;
			//$_SESSION['fname'] = get_fname($username, $conn);



			//if everything matches correctly, take them to the homepage
			header("Location: index.php");
						
			} else {
				//if they dont, throw an error
				die ("<div class='alert alert-warning' role='alert'> Cannot Find User! </div>");
				} 
		
		} else {
			//if they dont, throw an error
			die ("<div class='alert alert-warning' role='alert'> Cannot Find User! </div>");
		} 

}?>