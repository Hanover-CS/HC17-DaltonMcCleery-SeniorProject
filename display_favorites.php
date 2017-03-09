<?php

  //Should return an Array whose elements are also an array of the information retrieved from
  //the database query.
  $favorites = $student->getFavorites();

  //determine how many content elements need to appear on the page
  $length = count($favorites);

?>
<html>
    <div class="container">
      <div class="row">


      <?php
      
      //Using this counter as both a counter and
      //the ID fields of the database since they both start at 1
      //and go until the last row of the given $table
      for ($counter = 0; $counter < $length; $counter++) 
      {
        //This is used to determine if/when a row should end. A row should only be 3 items, 
        //enough to fit nicely on a page. 
        //This has to be moved from the other way to account for various heights of the content;
        //i.e. the thumbnail height of an audio object is much smaller than that of the video object.
        if ($counter % 3 == 0 && $counter > 0)
        {
          //Close current ROW div and then reopen another ROW
          echo "</div>" . "<div class='row'>";
        }

        //get the Table from the list of the current Student's favorites in order
        //to build a new Content object.
        $table = $favorites[$counter]['lib_table'];
        $ID = $favorites[$counter]['file_id'];

        //New Content Object
        $content = new Content($ID, $table);

        if ($table == "chops_etudes")
        {
          echo $twig->render('thumbnail_etude.html', 
            array('address' => $content->getFileAddress(),
                  'name' => $content->getFileName(),
                  'composer' => $content->getComposer(),
                  'page' => $content->getPageNum(),
                  'favorite' => true //it shouldn't show up if it is not, so no need to check
                ));
        } else if ($table == "chops_audio")
        {
          echo $twig->render('thumbnail_audio.html', 
            array('address' => $content->getFileAddress(),
                  'name' => $content->getFileName(),
                  'bpm' => $content->getBPM(),
                  'favorite' => true //it shouldn't show up if it is not, so no need to check
                ));
        } else //$table == "chops_video"
        {
          echo $twig->render('thumbnail_video.html', 
            array('address' => $content->getFileAddress(),
                  'name' => $content->getFileName(),
                  'rudiment' => $content->getRudimentID(),
                  'favorite' => true //it shouldn't show up if it is not, so no need to check
                ));
        }

      }?>
 
    </div>
  </div>
</html>