<?php

	require $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Tests/tests_info.php';

    // --- TESTS -- //
    echo "<div class='container'>";

    //CREATE a Student
    echo "<center><div class='alert alert-info' role='alert'> Student Creation Methods </div></center>";

	    $values = ["username", "password", "fname"];

	    test( Database::connect()->insertStudent($values), "Student Creation");


	//Database Class Methods
	echo "<center><div class='alert alert-info' role='alert'> Database Class Methods </div></center>";

		$db = Database::connect();

		//findOne item in a row
		unseenTest( ($db->findOne(1, 'chops_audio', 'name')) == "Metronome Marking", "findOne method");
		unseenTest( ($db->findOne(1, 'chops_audio', 'rudiment_id')) == NULL, "findOne method");
		test( ($db->findOne(1, 'chops_audio', 'BPM')) == 60, "findOne method");

		//findOne item WITHOUT the use of an ID field
      	unseenTest( ($db->findOneWithoutID('rudiment_id', 24, 'name', 'First', 'chops_etudes', 'composer')) == "Stacey Duggan", "findOneWithoutID method");
      	test( ($db->findOneWithoutID('composer', 'Stacey Duggan', 'page', 2, 'chops_etudes', 'name')) == "First",
      		"findOneWithoutID method");

      	//find one entire row of info from the database
      	$row1 = $db->findOneRow(5, 'chops_videos');
      	unseenTest( $row1['id'] == 5, "findOneRow method (id)");
      	unseenTest( $row1['file'] == "http://localhost/chops/Resources/Videos/5V.%20Triple%20Stroke%20Roll",
      		"findOneRow method (file)");
      	unseenTest( $row1['rudiment_id'] == 5, "findOneRow method (rudiment_id");
      	unseenTest( $row1['hybrid_id'] == 0, "findOneRow method (hybrid_id");
      	unseenTest( $row1['name'] == "Triple Stroke Roll", "findOneRow method (name)");

      	$row2 = $db->findOneRow(8, 'chops_videos');
      	unseenTest( $row2['id'] == 8, "findOneRow method (id)");
      	unseenTest( $row2['file'] == "http://localhost/chops/Resources/Videos/8V.%20Six%20Stroke%20Roll",
      		"findOneRow method (file)");
      	unseenTest( $row2['rudiment_id'] == 8, "findOneRow method (rudiment_id)");
      	unseenTest( $row2['hybrid_id'] == 0, "findOneRow method (hybrid_id)");
      	unseenTest( $row2['name'] == "Six Stroke Roll", "findOneRow method (name)");

      	test( ($row1['id'] == 5 && $row2['id'] == 8), "findOneRow method");

      	//find multiple rows of info from the database
      	$rows1 = $db->findMany('chops_etudes', 'name', 'rudiment_id', 21);
      	unseenTest( (($rows1[0]['name'] && $rows1[1]['name']) == "Crazy Eights"), "findMany method (name)");
      	unseenTest( (($rows1[2]['name'] && $rows1[3]['name']) == "Funky Fat"), "findMany method (name)");

      	$rows2 = $db->findMany('chops_etudes', 'name', 'rudiment_id', 27);
      	unseenTest( (($rows2[0]['name'] && $rows2[1]['name']) == "Five against Two"), "findMany method (name)");
      	unseenTest( (($rows2[2]['name'] && $rows2[3]['name'] && $rows2[4]['name']) == "Method to my Madness"),
      		"findMany method (name)");

      	test( ($rows1[1]['name'] == "Crazy Eights" && $rows2[3]['name'] == "Method to my Madness"), "findMany method");

      	//count how many rows are in a table of the database (as of 3/27/17)
      	$audio_rows = $db->countRows('chops_audio');
      	$video_rows = $db->countRows('chops_videos');
      	$etude_rows = $db->countRows('chops_etudes');

      	unseenTest( $etude_rows->num_rows == 54, "countRows method (etude)");
      	unseenTest( $video_rows->num_rows == 12, "countRows method (video)");
      	test( $audio_rows->num_rows == 22, "countRows method");


	//Student Class Methods
	echo "<center><div class='alert alert-info' role='alert'> Student Class Methods </div></center>";

		//Create a New Student Object
	  	test($student = new Student("username", "password"), "Student Object Constructor");

	  	//ID creation for future tests
	  	$Student_ID = $student->getUserID();

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

	  	//set Student's password method
		$student->setPassword('PASSWORD');
	  	test( ($db->findOne($Student_ID, 'chops_students', 'password') == 'PASSWORD') , 
	  			"setPassword Method call");

		//check a Student's Favorites
	  	$content_1 = new Content('1', 'chops_etudes');
	  	test( $student->checkFavorite( $content_1->getFileAddress() ) == false, "Check an Unfavorited Etude");

		//add the etude to the Student's favorites
	  	$student->addFavorite($content_1);
	  	test( $student->checkFavorite( $content_1->getFileAddress() ) == true, "Check a Favorited Etude");

		//remove the newly added Etude
		$student->removeFavorite($content_1);
		test( $student->checkFavorite( $content_1->getFileAddress() ) == false, "Removed a Favorited Etude");

		//Reset the username, password, and fname fields back to their original names (from line 63)
		unseenTest( ($db->updateStudentQuery(['username', 'password', 'fname', $Student_ID])), 
	  			"Reset Student info to original");

		test( ($db->checkStudentProgress($Student_ID, 1)) == Null, "checkStudentProgress method");

		unseenTest( ($db->updateStudentProgress($Student_ID, 1)) == true, "updateStudentProgress method");
		test( ($db->checkStudentProgress($Student_ID, 1)) == true, "updateStudentProgress method");

		//delete a student
		test( ($student->deleteUser($Student_ID)), "Delete student method");


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
?>