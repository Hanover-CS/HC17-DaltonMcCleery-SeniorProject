<?php

	class Database {

    public $conn;
    private static $instance = null;
    private static $serverinfo;

    //$server variable should be an ARRAY with
    //the first element being the server host,
    //the second element being the username of the database,
    //the third being the password to the database,
    //the last (fourth) being the server name.
    private function __construct($server) 
    {
      $this->conn = mysqli_connect($server[0], $server[1], $server[2], $server[3]);

      if (mysqli_connect_error()) 
      { 
        die ("Error connecting to Database. Check Database variables.");
      }
    }


    public static function connect()
    {
    	if (self::$instance == null)
    	{
    		self::$instance = new Database(self::$serverinfo);
    	}

    	return self::$instance;
    }

    //set Server info for Database connection. 
  	//The Dummy_server (Parameters) file gives us an Array of DB variables used to
  	//connection to the Database.
  	//Array should be formatted as: [$dbhost, $dbuser, $password, $dbname]
    static function setServer($server)
    {
    	self::$serverinfo = $server;
    	return self::$serverinfo;
    }

    //This method returns only ONE item from the Database
    //using the $ID as an identifer/row,
    //the $table as to which table to access,
    //and the $column to pinpoint the exact item to grab.
    function findOne($ID, $table, $column)
    {
      $query = "SELECT $column FROM $table 
      					WHERE id = $ID";

      $result = mysqli_fetch_array( mysqli_query($this->conn, $query) );

      $this->testForError($result);
 
      return $result[$column];
    }


    function findOneWithoutID($fieldname1, $fieldvar1, $fieldname2, $fieldvar2, $table, $column)
    {
      $query = "SELECT $column FROM $table 
      					WHERE $fieldname1 = '$fieldvar1' 
      					AND $fieldname2 = '$fieldvar2'";

      $result = mysqli_fetch_array( mysqli_query($this->conn, $query) );

      $this->testForError($result);
 
      return $result[$column];
    }

    //Same as findOne method except it returns a row of information instead of 1 item.
    function findOneRow($ID, $table)
    {
      $query = "SELECT * FROM $table 
      					WHERE id = $ID";
 
      $result = mysqli_fetch_array( mysqli_query($this->conn, $query) );

      $this->testForError($result);
 
      return $result;
    }

    //Returns an array of data from the Database.
    //Rows are stored one at a time in the While loop
    function findMany($table, $column)
    {
      $results = [];
      $counter = 0;

      $query = "SELECT $column FROM $table";

      $result = mysqli_query($this->conn, $query);

      $this->testForError($result);

      while ($row = mysqli_fetch_assoc($result)) 
      {
        $results[$counter] = $row;
        $counter = $counter + 1;
      }

      return $results;
    }

    //TODO
    function addToFavorite($values)
    {
    	$query = "INSERT INTO chops_favorites (student_id, file_id, file) 
    						VALUES ($values[0], $values[1], $values[2])";

    	$result = mysqli_query($this->conn, $query);

			$this->testForError($result);

			return true;
    }

    //TODO
    function removeFromFavorite($studentID, $file)
    {
    	$query = "DELETE FROM chops_favorites 
    						WHERE student_id = '$studentID'
    						AND file = $file";

    	$result = mysqli_query($this->conn, $query);

			$this->testForError($result);

			return true;
    }


    function updateStudentQuery($values)
    {
    	$query = "UPDATE chops_students 
    						SET username = '$values[0]', password = '$values[1]', fname = '$values[2]' 
    						WHERE id = '$values[3]'";

   		$result = mysqli_query($this->conn, $query);

   		$this->testForError($result);

   		return true;
    }

    //This protected method is used to test if there was
    //This private method is used to test if there was
    //an error performing a Database query.
    private function testForError($result)
    {
      if (!$result)
      {
        die ("Error retreiving information from Database."); 
      }
    }


  }

?>