<?php
	session_start();

	//connect to database
 	require $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-Chops/Database/dbconnect.php';
  	include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-Chops/Functions/functions.php';
	
	require_once 'log_screen.html';

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
			//$_SESSION['ID'] = get_id();
			//$_SESSION['fname'] = get_fname($username, $conn);



			//if everything matches correctly, take them to the homepage
			header("Location: ./../index.php");
						
			} else {
				//if they dont, throw an error
				die ("<div class='alert alert-warning' role='alert'> Incorrect Login! </div>");
				} 
		
		} else {
			//if they dont, throw an error
			die ("<div class='alert alert-warning' role='alert'> Cannot Find User! </div>");
		} 

}?>