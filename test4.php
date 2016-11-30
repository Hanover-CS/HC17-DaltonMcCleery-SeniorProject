<?php
	require_once 'dbconnect.php';
	//include 'functions.php';

		$query = "SELECT file FROM chops_etudes WHERE id = 1";
		$result = mysqli_fetch_array( mysqli_query($conn, $query) );

	function get_file_address($ID, $table, $conn)
	{
		$query = "SELECT file FROM $table WHERE id = $ID";
		$result = mysqli_fetch_array( mysqli_query($conn, $query) );
		return $result[0];
		//return $query;
	}




?>

<html>
<head>
  		
  		<img src="<?= get_file_address(1, "chops_etudes", $conn); ?>" alt="Etude" style="width:242px; height:200px;">

</head>
</html>
