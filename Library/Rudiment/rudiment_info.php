<?php

	// include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/navbar.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Library/Rudiment/rudiment.php';

  	//get the ID from the URL
  	$ID = $_GET['id'];
    $table = $_GET['table'];

    if ($table == "chops_rudiment")
    {
      $rudimentColumn = "rudiment_id";
    } else { //if $table == chops_hybrids
      $rudimentColumn = "hybrid_id";
    }

  	//Get all the rows from etudes table in the Database
  	//that have the corrosponding rudiment_id or hybrid_id that was given to this file
  	//audio/video doesn't matter at this point, I will be using the same audios for
  	//all rudiments (regardless of ID)
  	//and there is only 1 "main" video I want for each page
  	$etudes = Database::connect()->findMany("chops_etudes", "*", $rudimentColumn, $ID);

  	//Concat both etude and video arrays to make one large array with the correct info
  	$rudiment_video = new Content($ID, "chops_videos");;

  	//TODO
  	$rudiment_picture = new Content($ID, $table);

  	//Audio Markings
  	$audios = Database::connect()->findMany("chops_audio", "id", "name", "Metronome Marking");
  	$audio_length = count($audios);

  	//get the length of how long/how many files have that rudiment_id
  	$length = count($etudes);


?>