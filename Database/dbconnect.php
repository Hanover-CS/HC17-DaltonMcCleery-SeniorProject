<?php
	
	require_once $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Database/dummy_server.php';
  // require_once $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Database/parameters.php';

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

    //This is the main method of the DB Class
    //When this method is called (and it can be called statically without referencing an object),
    //it checks an instance property, above, to see if there was a DB connection previously made.
    //If there was, then there is no need to create another connection, just return the first (and only) connection.
    //If there was not, then it (and only it) calls the construct method of this class
    //and creates a DB connection.
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
    static function setServer($server_array)
    {
    	self::$serverinfo = $server_array;
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

    //The idea here is to access some DB information without using the ID field.
    //Some instances arise where the ID is unknown but other pieces of information are known.
    //I safe guarded some of this by having to know at least 2 other pieces/fields to get at the info
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
    //Ex. findOne returns something like 'etude_name'
    //findOneRow returns ['etude_name', 'etude_ID', 'etude_composer', 'etude_file']
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

    //Query method used to add a file to the Favorites table based on the current student's ID
    function addToFavorite($values)
    {
    	$query = "INSERT INTO chops_favorites (student_id, file_id, file) 
    						VALUES ($values[0], $values[1], $values[2])";

    	$result = mysqli_query($this->conn, $query);

			$this->testForError($result);

			return true;
    }

    //Query method used to remove a file from the Favorites table based on the current student's ID
    function removeFromFavorite($studentID, $file)
    {
    	$query = "DELETE FROM chops_favorites 
    						WHERE student_id = '$studentID'
    						AND file = $file";

    	$result = mysqli_query($this->conn, $query);

			$this->testForError($result);

			return true;
    }

    //Query method used to update the information in the Student table of the Database.
    //$values argument should be structured like: ['username', 'password', 'name', 'ID']
    function updateStudentQuery($values)
    {
    	$query = "UPDATE chops_students 
    						SET username = '$values[0]', password = '$values[1]', fname = '$values[2]' 
    						WHERE id = '$values[3]'";

   		$result = mysqli_query($this->conn, $query);

   		$this->testForError($result);

   		return true;
    }

    //Query method used to insert a new Student into the Student table of the Database.
    //$values argument should be structured like: ['username', 'password', 'name']
    function insertStudent($values)
    {
    	$query = "INSERT INTO chops_students (username, password, fname)
                VALUES ('$values[0]', '$values[1]', '$values[2]')";

      $result = mysqli_query($this->conn, $query);

      $this->testForError($result);

   		return true;
    }

    //Query method used to delete a Student user from the Student table in the Database.
    /* protected? */function deleteStudent($ID)
    {
    	$query = "DELETE FROM chops_students 
    						WHERE id = '$ID'";

    	$result = mysqli_query($this->conn, $query);

      $this->testForError($result);

      return true;
    }

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