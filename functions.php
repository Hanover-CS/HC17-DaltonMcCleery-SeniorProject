<?php
	include_once 'dbconnect.php';

	//get the file address from the library tables
	function get_file_address($id, $table)
	{
		$query = "SELECT file FROM '$table' WHERE id = '$id'";
		$result = mysqli_fetch_array( mysqli_query($conn, $query) );
		return $result['file'];
		//return $query;
	}

	//get the user's ID by using their username and password
	function get_id($user, $pass)
	{
   		$get_id = "SELECT id FROM chops_students WHERE username= '$user' and password= '$pass'";

   		//execute then convert the get_id query into an array
   		$res = mysqli_fetch_array(mysqli_query($conn, $get_id));
   
   		//then access the 'id' field of that array from the query
   		return $res['id'];
	}

?>