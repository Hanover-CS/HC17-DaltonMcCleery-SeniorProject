<?php

	include 'rudiment_banner.html';
	// include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Functions/functions.php';

	$rudimentProgress = array();
	
	for($counter = 1; $counter <= 40; $counter++)
	{
		$rudimentCheck = Database::connect()->checkStudentProgress($student->getUserID(), $counter);

		if ($rudimentCheck)
		{
			$rudimentProgress[$counter] = $rudimentCheck;
		} else {
			$rudimentProgress[$counter] = 0;
		}
	}
	
	// print_r($rudimentProgress);
	json_encode($rudimentProgress);
?>