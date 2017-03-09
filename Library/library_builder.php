<?php

  //include the navbar, which in turn haas access to the functions file
  include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/navbar.php';
 
  //the navbar puts what table is being accessed in the URL of the page
  //So I "get" that field and that helps determine which database table to grab from
  $table = $_GET['table'];

  //get all the ID's of all the content in the table we got on the line above
  // $library_ids = Database::connect()->findMany($table, "id"); --- use for Favorite Button? Otherwise useless...

  //determine how many content elements need to appear on the page
  $length = (Database::connect()->countRows($table))->num_rows;
 
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
          <h1><font color="purple">Chops Library</font></h1>
        </div>
    </div>

  
    <div class="container">
      <div class="row">


      <?php
      
      //Using this counter as both a counter and
      //the ID fields of the database since they both start at 1
      //and go until the last row of the given $table
      for ($counter = 1; $counter <= $length; $counter++) 
      {

        //New Content Object
        $content = new Content($counter, $table);

        if ($table == "chops_etudes")
        {
          echo $twig->render('thumbnail_etude.html', 
            array('address' => $content->getFileAddress(),
                  'name' => $content->getFileName(),
                  'composer' => $content->getComposer(),
                  'page' => $content->getPageNum(),
                  'table' => $content->getFileTable(),
                  'ID' => $content->getFileID(),
                  'favorite' => $student->checkFavorite($content->getFileAddress())
                ));
        } else if ($table == "chops_audio")
        {
          echo $twig->render('thumbnail_audio.html', 
            array('address' => $content->getFileAddress(),
                  'name' => $content->getFileName(),
                  'bpm' => $content->getBPM(),
                  'table' => $content->getFileTable(),
                  'ID' => $content->getFileID(),
                  'favorite' => $student->checkFavorite($content->getFileAddress())
                ));
        } else //$table == "chops_video"
        {
          echo $twig->render('thumbnail_video.html', 
            array('address' => $content->getFileAddress(),
                  'name' => $content->getFileName(),
                  'rudiment' => $content->getRudimentID(),
                  'table' => $content->getFileTable(),
                  'ID' => $content->getFileID(),
                  'favorite' => $student->checkFavorite($content->getFileAddress())
                ));
        }
        //Implement this only passing it the actual Content object 
        //and have the template figure out how to get the requried info based on the object's methods.
 
        //This is used to determine if/when a row should end. A row should only be 3 items, 
        //enough to fit nicely on a page.
        //When the 3 item limit is reached, it closes that row's div tag and opens another row. 
        if ($counter % 3 == 0)
        {
          //Close current ROW div and then reopen another ROW
          echo "</div>" . "<div class='row'>";
        }

      }?>

 
      </div>
 
    </div>
 
  </body>
 
</html>