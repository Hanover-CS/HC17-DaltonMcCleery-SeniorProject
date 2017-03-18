<?php
 
    include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/navbar.php';
    // include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Functions/functions.php';

  	//get the ID from the URL
  	$ID = $_GET['id'];

  	//Get all the rows from etudes table in the Database
  	//that have the corrosponding rudiment_id that was given to this file
  	//audio/video doesn't matter at this point, I will be using the same audios for
  	//all rudiments (regardless of ID)
  	//and there is only 1 "main" video I want for each page
  	$etudes = Database::connect()->findMany("chops_etudes", "*", "rudiment_id", $ID);

  	//Concat both etude and video arrays to make one large array with the correct info
  	$rudiment_video = new Content($ID, "chops_videos");

  	//TODO
  	$rudiment_picture = new Content($ID, "chops_rudiment");

  	//Audio Markings
  	$audios = Database::connect()->findMany("chops_audio", "id", "name", "Metronome Marking");
  	$audio_length = count($audios);

  	//get the length of how long/how many files have that rudiment_id
  	$length = count($etudes);

?>
<!DOCTYPE HTML>
  <html>

    <head>
      <title>Chops/User/<?php echo $student->getUsername(); ?></title>
 
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <!-- Bootstrap -->
        <link href='../css/bootstrap.min.css' rel='stylesheet' media='screen'>
 
 	</head>

 	<body>

  <div class="jumbotron">
        <div class="container">
          <!-- RUDIMENT BANNER -->
          <?php include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Library/rudiment_banner.html'; ?>
        </div>
    </div>

    <!-- RUDI PIC + VIDEO + Metronome Markings -->
    <div class="container">
    	<div class="row">

    		<!-- Instructional Video on How-TO play the Rudiment -->
		    <center><div><?php
		    echo $twig->render('thumbnail_video.html', 
		            array('address' => $rudiment_video->getFileAddress(),
		                'name' => $rudiment_video->getFileName(),
		                'rudiment' => $rudiment_video->getRudimentID(),
		                'table' => $rudiment_video->getFileTable(),
		                'ID' => $rudiment_video->getFileID(),
		                'favorite' => $student->checkFavorite($rudiment_video->getFileAddress())
		                ));
		    ?></div></center>


		    <!-- Rudiment Picture -->
		    <?php
          echo $twig->render('thumbnail_rudiment_pic.html', 
                array('address' => $rudiment_picture->getFileAddress(),
                    'rudi_ID' => $ID,
                    'completed' => Database::connect()->checkStudentProgress($student->getUserID(), $ID)
                    ));
        ?>


          	<!-- Audio/Metronome Markings -->
          	<div class="col-sm-6 col-md-4">
        		  <div class="thumbnail">

          		<?php
          		for ($counter = 0; $counter < $audio_length; ) 
          		{ 
          			$audio = new Content($audios[$counter]['id'], "chops_audio"); ?>

          			<audio controls>
  	            	<source src= '<?php echo $audio->getFileAddress() ?>' alt='Audio' type='audio/wav'>
  	            	Your browser does not support the audio element.</audio>

  	              	<div class='caption'>
  	                <p><?php echo $audio->getBPM() ?> BPM</p>
  	                </div>

          		<?php $counter = $counter + 3; 
          		} ?>

	            </div>
	        </div>

    	</div>
    </div>

    <!-- Include the etudes that have the Rudiment ID associated with them -->
    <?php require 'related_etudes.php'; ?>
 
  </body>
 
</html>