<?php

	//Database class (dbconnect) and the necessary connection variables
    include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Database/dbconnect.php';
    $server = ["localhost", "root", "", "Chops"];

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
  			fail($fail_message);
  		}
  	}


  	//Check to see I'm not duplicating the method to add a Student
  	$created = true;

    // --- TESTS -- //
    echo "<div class='container'>";

    //CREATE a Student
    echo "<center><div class='alert alert-info' role='alert'> Student Creation Methods </div></center>";
    if ($created == false)
    {
	    $values = ["username", "password", "fname"];

	    test( Database::connect()->insertStudent($values), "Student Creation");

	}
	// else {
	// 	success("Student Creation");
	// }

	//Student Class Methods
	echo "<center><div class='alert alert-info' role='alert'> Student Class Methods </div></center>";

		//Create a New Student Object
	  	test($student = new Student("username", "password"), "Student Object Constructor");

		//get Student's name method
	  	test( ($student->getName() == 'fname') , "getName Method call");

		//set Student's name method
	  	$student->setName('NAME');
	  	test( ($student->getName() == 'NAME') , "setName Method call");

		//get Student's username method
	  	test( ($student->getUsername() == 'username') , "getUsername Method call");

	  	//set Student's username method
		$student->setUsername('TEST_USER');
	  	test( ($student->getUsername() == 'TEST_USER') , "setUsername Method call");

	  	//Student's password methods?

		//check a Student's Favorites
	  	$content_1 = new Content('1', 'chops_etudes');
	  	test( $student->checkFavorite( $content_1->getFileAddress() ) == false, "Check an Unfavorited Etude");

		//add the etude to the Student's favorites
	  	$student->addFavorite($content_1);
	  	test( $student->checkFavorite( $content_1->getFileAddress() ) == true, "Check a Favorited Etude");

		//remove the newly added Etude
		$student->removeFavorite($content_1);
		test( $student->checkFavorite( $content_1->getFileAddress() ) == false, "Removed a Favorited Etude");


	//Content Class Methods
	echo "<center><div class='alert alert-info' role='alert'> Content Class Methods </div></center>";

	  	//Create a New Content Object
	  	test( $content = new Content("4", "chops_etudes"), "Content Object Constructor");

	  	//No Page Number
	  	$content_etude2 = new Content("1", "chops_etudes");

	  	//No Composer/Rudiment ID
	  	$content_etude3 = new Content("12", "chops_etudes");


	  	//get Content's Address
	  	unseenTest( $content_etude2->getFileAddress() == "http://localhost/chops/Resources/Etudes/5+2=7.jpg",
	  		"getFileAddress method call");
	  	unseenTest( $content_etude3->getFileAddress() == "http://localhost/chops/Resources/Etudes/Exercise%201+2",
	  		"getFileAddress method call");
	  	test( $content->getFileAddress() == "http://localhost/chops/Resources/Etudes/Crazy%20Eights%20-1.jpg",
	  		"getFileAddress method call");

	  	//get Content's file name
	  	unseenTest( $content_etude2->getFileName() == "5+2=7", "getFileName method call");
	  	unseenTest( $content_etude3->getFileName() == "Exercise 1 and 2", "getFileName method call");
	  	test( $content->getFileName() == "Crazy Eights", "getFileName method call");

	  	//get Content's ID
	  	unseenTest( $content_etude2->getFileID() == "1", "getFileID method call");
	  	unseenTest( $content_etude3->getFileID() == "12", "getFileID method call");
	  	test( $content->getFileID() == "4", "getFileID method call");

	  	//get Content's Table
	  	unseenTest( $content_etude2->getFileTable() == "chops_etudes", "getFileTable method call");
	  	unseenTest( $content_etude3->getFileTable() == "chops_etudes", "getFileTable method call");
	  	test( $content->getFileTable() == "chops_etudes", "getFileTable method call");

	  	//get Content's Rudiment ID
	  	unseenTest( $content_etude2->getRudimentID() == "10", "getRudimentID method call");
	  	unseenTest( $content_etude3->getRudimentID() == Null, "getRudimentID method call on Etude with NO Rudiment ID");
	  	test( $content->getRudimentID() == "21", "getRudimentID method call");

	  	//get Etude Content's Composer
	  	unseenTest( $content_etude2->getComposer() == "Edward Freytag", "getComposer (Etude Only) method call");
	  	unseenTest( $content_etude3->getComposer() == "N/A", "getComposer method call on Etude with NO Composer");
	  	test( $content->getComposer() == "Edward Freytag", "getComposer (Etude Only) method call");

	  	//get Etude Content's Page Number
	  	unseenTest( $content_etude2->getPageNum() == Null, "getComposer method call on Etude with NO Page Number");
	  	unseenTest( $content_etude3->getPageNum() == Null, "getComposer method call on Etude with NO Page Number");
	  	test( $content->getPageNum() == "1", "getComposer (Etude Only) method call");

	  	//get Audio Content's BPM
	  	$content_audio1 = new Content("16", "chops_audio");
	  	$content_audio2 = new Content("1", "chops_audio");
	  	$content_audio3 = new Content("8", "chops_audio");

	  	unseenTest( $content_audio2->getBPM() == "60", "getBPM (Audio Only) method call");
	  	unseenTest( $content_audio3->getBPM() == "140", "getBPM (Audio Only) method call");
	  	test( $content_audio1->getBPM() == "100", "getBPM (Audio Only) method call");



	echo "</div>";