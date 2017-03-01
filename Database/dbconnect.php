<?php

	class Database {

    public $conn,

    //$server variable should be an ARRAY with
    //the first element being the server host,
    //the second element being the username of the database,
    //the third being the password to the database,
    //the last (fourth) being the server name.
    function __construct($server) 
    {
      $this->conn = mysqli_connect($server[0], $server[1], $server[2], $server[3]);

      if (mysqli_connect_error()) 
      { 
        die ("Error connecting to Database. Check Database variables.");
      }
    }


    function getConn()
    {
    	return $this->conn;
    }

    //This method returns only ONE item from the Database
    //using the $ID as an identifer/row,
    //the $table as to which table to access,
    //and the $column to pinpoint the exact item to grab.
    function findOne($ID, $table, $column)
    {
      $query = "SELECT $column FROM $table WHERE id = $ID";
 
      $result = mysqli_fetch_array( mysqli_query($this->conn, $query) );

      testForError($result);
 
      return $result[0];
    }

    //Same as findOne method except it returns a row of information instead of 1 item.
    function findOneRow($ID, $table)
    {
      $query = "SELECT * FROM $table WHERE id = $ID";
 
      $result = mysqli_fetch_array( mysqli_query($this->conn, $query) );

      testForError($result);
 
      return $result[0];
    }

    //Returns an array of data from the Database.
    //Rows are stored one at a time in the While loop
    function findMany($table, $column)
    {
      $results = [];
      $counter = 0;

      $query = "SELECT $column FROM $table";

      $result = mysqli_query($this->conn, $query);

      testForError($result);

      while ($row = mysqli_fetch_assoc($result)) 
      {
        $results[$counter] = $row;
        $counter = $counter + 1;
      }

      return $results;
    }

    //TODO
    function addToFavorites($values)
    {
    	$query = "INSERT INTO chops_favorites (student_id, file_id, file) 
    						VALUES ($values[0], $values[1], $values[2])";

    	$result = mysqli_query($conn, $query);

    	testForError($result);
    }

    //This protected method is used to test if there was
    //an error performing a Database query.
    protected function testForError($result)
    {
      if (!$result)
      {
        die ("Error retreiving information from Database."); 
      }
    }


  }

?>