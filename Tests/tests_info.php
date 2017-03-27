<?php

	//Database class (dbconnect) and the necessary connection variables
    include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Database/dbconnect.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Database/dummy_server.php';

    //set Server info for Database connection. 
    //The Dummy_server (Parameters) file gives us an Array of DB variables used to
    //connection to the Database.
    //Array should be formatted as: [$dbhost, $dbuser, $password, $dbname]
    Database::setServer($server);

    //Classes
    include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Functions/student_class.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Functions/content_class.php';


    //Bootstrap Styling for Success/Error Messages
    echo '
    <html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

      <!-- Extra files to make the Dropdown menu work correctly -->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  	</head>
  	</html>';

  	function test($test, $output_message)
  	{
  		if ($test)
  		{
  			echo "<div class='alert alert-success' role='alert'> Successful " . $output_message . "</div>";
  		} else {
  			echo "<div class='alert alert-danger' role='alert'> Unsuccessful " . $output_message . "</div>";
  		}
  	}

  	function unseenTest($test, $fail_message)
  	{
  		if (!$test)
  		{
  			echo "<div class='alert alert-danger' role='alert'> Unsuccessful " . $fail_message . "</div>";
  		}
  	}
?>