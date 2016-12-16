<?php
	require_once 'dbconnect.php';
	include 'navbar.php';
	include 'functions.php';


	$file = $_SESSION['file'];
	$table = $_SESSION['table'];
	$file_id = get_file_id($file, $table, $conn)

	//get the user's current location so clicking the Favorite button won't take them away to another page
	$library = "library.php?table=";
	$location = $library . $table;

	//get student's ID to add the entry for the current student
	$ID = get_id($_SESSION['username'], $_SESSION['password'], $conn);


if($_SERVER["REQUEST_METHOD"] == "POST") {

	//Function adds the file into the database with a forigen key to the chops_students table for the student who clicked the Favorite button
	add_Favorite($file, $ID, $file_id, $conn);

	//assemble the user's current location and take them back to where they were
	header("Location: $location");

}?>