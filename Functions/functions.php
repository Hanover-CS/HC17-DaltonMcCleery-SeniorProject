<?php

  session_start();
 
  //Database class (dbconnect) and the necessary connection variables (parameters)
  include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Database/dbconnect.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Database/parameters.php';

  //set Server info for Database connection. 
  //The Dummy_server (Parameters) file gives us an Array of DB variables used to
  //connection to the Database.
  //Array should be formatted as: [$dbhost, $dbuser, $password, $dbname]
  Database::setServer($server);

  //Classes
  include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Functions/student_class.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Functions/content_class.php';

  //Twig's enviroment.
  //The $loader is used to see where to look for templates at.
  //$twig is the actual enviroment that holds the templates.
  require_once $_SERVER['DOCUMENT_ROOT'] . '/Chops/vendor/composer/vendor/autoload.php';

  $loader = new Twig_Loader_Filesystem('C:/wamp64/www/Chops/hc07-Chops/Templates');
  $twig = new Twig_Environment($loader, array(
      'cache' => 'C:/wamp64/www/Chops/vendor/composer/vendor/twig/twig/test/Twig/Tests',
  ));

  // Example of how to load/render a template with the identifiers and there values
      // --- $twig->render('FILE', array('VARIABLES' => 'VALUES', ... )); --- //

  //Current logged in Student object
  $student = new Student($_SESSION['username'], $_SESSION['password']);