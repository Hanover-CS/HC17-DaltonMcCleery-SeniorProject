<?php
	session_start();

	//connect to database
	require $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-Chops/Database/dbconnect.php';
	use \chops\hc07chops\Database\dbconnect;
	include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-Chops/Functions/student_class.php';
	
	require_once 'log_screen.html';

//check if forum has already been submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

	//get and store user creds from the forum
	$username = mysqli_real_escape_string(Database::connect()->conn, $_POST['username']);
	$password = mysqli_real_escape_string(Database::connect()->conn, $_POST['password']);
	
	$temp_student = new Student($username, $password);

	if ( $temp_student->checkLogin($username, $password) )
	{
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['fname'] = $temp_student->getName();

		//if everything matches correctly, take them to the homepage
		header("Location: /chops/hc07-chops/index.php");
	} else {

		//if they dont, throw an error
		die ("<div class='alert alert-warning' role='alert'> Incorrect Login! </div>");
		} 

}?>