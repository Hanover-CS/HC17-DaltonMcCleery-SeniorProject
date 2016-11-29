<?php

//include the setup file with all the connection variables

	//require_once 'dummy_server.php';
	require_once 'parameters.php'; //<-- for local WAMP server

//connect to database
	$conn = mysqli_connect($serverhost, $username, $password, $servername);

// Error should be NULL or "false" is connection was successful. 
// Otherwise, the error is not NULL and the statment is "true," thus killing the script
	if (mysqli_connect_error())
		{ die ("Error connecting to Database."); }

?>