<?php
	require_once 'dbconnect.php';

	//get the file address from the library tables
	function get_file_address($id, $table, $conn)
	{
		$query = "SELECT file FROM $table WHERE id = '$id'";
		$result = mysqli_fetch_array( mysqli_query($conn, $query) );
		return $result[0];
	}


	//get the user's ID by using their username and password
	function get_id($user, $pass, $conn)
	{
   		$get_id = "SELECT id FROM chops_students WHERE username= '$user' and password= '$pass'";

   		//execute then convert the get query into an array
   		$result = mysqli_fetch_array(mysqli_query($conn, $get_id));
   
   		//then access the 'id' field of that array from the query
   		return $result[0];
	}


	//get person's name
	function get_fname($user, $conn)
	{
		$get_name = "SELECT name FROM chops_students WHERE username= '$user'";

		 //execute then convert the get query into an array
   		$result = mysqli_fetch_array(mysqli_query($conn, $get_name));
   
   		//then access the 'name' field of that array from the query
   		return $result[0];

	}


	//get the file name from the library tables
	function get_file_name($id, $table, $conn)
	{
		$query = "SELECT name FROM $table WHERE id = '$id'";
		$result = mysqli_fetch_array( mysqli_query($conn, $query) );
		return $result[0];
	}


	//get the etude composer from the library tables
	function get_file_composer($id, $conn)
	{
		$query = "SELECT composer FROM chops_etudes WHERE id = '$id'";
		$result = mysqli_fetch_array( mysqli_query($conn, $query) );
		return $result[0];
	}


	//library_builder helper function -- Adds the starting html
	function html_starter()
	{
		echo 	"<!DOCTYPE HTML>
			  	<html>

			  	<head>
				<title>Chops/User/";

		echo $_SESSION['username'];

		echo 	"</title>
				<meta name='viewport' content='width=device-width, initial-scale=1.0'>

    			<!-- Bootstrap -->
    			<link href='css/bootstrap.min.css' rel='stylesheet' media='screen'>
				</head>";
	}


	//get Favorites section
	function get_Favorites($id, $conn)
	{
		// --- FIX THIS ---
		$query = "SELECT * FROM chops_favorites JOIN chops_students as s ON s.id = student_id JOIN chops_etudes as e ON e.id = file_id";
		$result = mysqli_fetch_array( mysqli_query($conn, $query) );

		if ($result)
		{
			return $result[0];
		} else {
			echo "<center><h5>You don't have anything Favorited yet! Check out the content Libraries above!</h5></center>";
		}
	}

	//more functions go here...

?>