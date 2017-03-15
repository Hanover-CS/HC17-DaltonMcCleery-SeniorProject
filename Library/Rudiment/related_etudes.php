<!DOCTYPE html>
<html>

<head>
  <title>Chops/User/<?php echo $student->getUsername(); ?></title>

    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <!-- Bootstrap -->
    <link href='../css/bootstrap.min.css' rel='stylesheet' media='screen'>
</head>

<body>
  <div class="jumbotron">
  <h1><center>
  	<span class='glyphicon glyphicon-music' aria-hidden='true'></span>
  	<font color="blue">Related Etudes</font>
  	<span class='glyphicon glyphicon-music' aria-hidden='true'></span>
  	</center></h1>

      <div class="container">
        <div class="row">

        <?php
        
        for ($counter = 0; $counter < $length; $counter++) 
        {
        	//This is used to determine if/when a row should end. A row should only be 3 items, 
          //enough to fit nicely on a page.
          //When the 3 item limit is reached, it closes that row's div tag and opens another row.
        	if ($counter % 3 == 0)
          {
            //Close current ROW div and then reopen another ROW
            echo "</div>" . "<div class='row'>";
          }

          //get the Table from the list of the current Student's favorites in order
          //to build a new Content object.
          $ID = $etudes[$counter]['id'];

          //New Content Object
          $content = new Content($ID, "chops_etudes");

          echo $twig->render('thumbnail_etude.html', 
          array('address' => $content->getFileAddress(),
                  'name' => $content->getFileName(),
                  'composer' => $content->getComposer(),
                  'page' => $content->getPageNum(),
                  'table' => $content->getFileTable(),
                  'ID' => $content->getFileID(),
                  'favorite' => $student->checkFavorite($content->getFileAddress())
                  ));
        }?>

        </div>
 
      </div>

  </div>
 
</body>
 
</html>