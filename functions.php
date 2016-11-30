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
   
   		//then access the 'id' field of that array from the query
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

	//more functions go here...

?>