<?php
    
    include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/navbar.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Library/Rudiment/rudiment_info.php';

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
                    'table' => $table,
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