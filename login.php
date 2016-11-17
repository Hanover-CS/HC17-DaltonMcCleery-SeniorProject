<?php
	session_start();

//connect to database
	require_once 'dbconnect.php';
	require_once 'log_screen.html';

//check if forum has already been submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

	//get and store user creds from the forum
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$query = "SELECT * FROM chops_students WHERE username= '$username' and password= '$password'";
	//echo $query;
	$result = mysqli_query($conn, $query);
 	$count = mysqli_num_rows($result);

	//check to see if query was successful
	if ($result) {

		//check to see it returned only 1 row
		if ($count == 1) {

			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['fname'] = $fname;

			//if everything matches correctly, take them to the homepage
			header("Location: index.php");
						
			} else {
				//if they dont, throw an error
				die ("Incorrect Row Count");
				} 
		
		} else {
			//if they dont, throw an error
			die ("Incorrect Login");
		} 

}?>