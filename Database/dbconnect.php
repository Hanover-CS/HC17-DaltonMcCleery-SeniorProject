<?php
  /**
   * This is the main file that interacts with the data in the tables in the Database.
   */
	
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

    /**
     * This is the main method of the DB Class.
     *
     * When this method is called (and it can be called statically without referencing an object),
     * it checks an instance property, above, to see if there was a DB connection previously made.
     * If there was, then there is no need to create another connection, just return the first (and only) connection.
     * If there was not, then it (and only it) calls the construct method of this class and creates a DB connection.
     *
     * @return the mysqli connection object
     */
    public static function connect()
    {
    	if (self::$instance == null)
    	{
    		self::$instance = new Database(self::$serverinfo);
    	}

    	return self::$instance;
    }

    /**
     * set Server info for Database connection. 
  	 *
     * The Dummy_server (Parameters) file gives us an Array of DB variables used to
     * connection to the Database.
     *
  	 * @param array $server_array should be formatted as: [$dbhost, $dbuser, $password, $dbname]
     *
     * @return the information provided
     */
    static function setServer($server_array)
    {
    	self::$serverinfo = $server_array;
    	return self::$serverinfo;
    }

    /**
     * This method returns only ONE item from the Database.
     *
     * Using the $ID as an identifer/row, the $table as to which table to access,
     * and the $column to pinpoint the exact item to grab.
     *
     * @param tuple with an ID identifier, which table to grab from, and what column is wanted
     *
     * @return one item of information from a certain table in the Database
     */
    function findOne($ID, $table, $column)
    {
      $query = "SELECT $column FROM $table 
      					WHERE id = $ID";

      $result = mysqli_fetch_array( mysqli_query($this->conn, $query) );

      $this->testForError($result);
 
      return $result[$column];
    }

    /**
     * Access some DB information without using the ID field.
     *
     * Some instances arise where the ID is unknown but other pieces of information are known.
     * I safe guarded some of this by having to know at least 2 other pieces/fields to get at the info
     *
     * @param tuple with 2 sets of variables for the WHERE clause, and a column and table to access
     *
     * @return one item of information from a certain table in the Database
     */
    function findOneWithoutID($fieldname1, $fieldvar1, $fieldname2, $fieldvar2, $table, $column)
    {
      $query = "SELECT $column FROM $table
      					WHERE $fieldname1 = '$fieldvar1'
      					AND $fieldname2 = '$fieldvar2'";

      $result = mysqli_fetch_array( mysqli_query($this->conn, $query) );

      $this->testForError($result);
 
      return $result[$column];
    }

    /**
     * Same as findOne method except it returns a row of information instead of 1 item.
     * 
     * Grabs an entire row of information, instead of just one item within a row.
     *
     * @param tuple with an ID identifier and a table with which to access from
     *
     * @return array with index's that match the column data in the table that was given
     */
    //findOneRow returns ['etude_name', 'etude_ID', 'etude_composer', 'etude_file']
    function findOneRow($ID, $table)
    {
      $query = "SELECT * FROM $table 
      					WHERE id = $ID";
 
      $result = mysqli_fetch_array( mysqli_query($this->conn, $query) );

      $this->testForError($result);
 
      return $result;
    }

    /**
     * Grabs multiple rows of data
     *
     * Similar to the findOneRow method, except the where clause is more open-ended
     * and might include more than one row of information. Rows are stored using a simple
     * for-loop process.
     *
     * @param tuple with an ID and table (similar to others) and a explicitly expressed where clause
     *
     * @return array
     */
    function findMany($table, $column, $whereclause, $equals)
    {
      $results = [];
      $counter = 0;

      $query = "SELECT $column FROM $table
                WHERE $whereclause = '$equals'";

      $result = mysqli_query($this->conn, $query);

      $this->testForError($result);

      while ($row = mysqli_fetch_assoc($result)) 
      {
        $results[$counter] = $row;
        $counter = $counter + 1;
      }

      return $results;
    }

    /**
     * Simple count method to see how many rows there are for a table in the database
     *
     * @param a table name in the database
     *
     * @return integer
     */
    function countRows($table)
    {
    	$query = "SELECT 'COUNT(*)' FROM $table";

      $result = mysqli_query($this->conn, $query);

      $this->testForError($result);

      return $result;
    }

    /**
     * Query method used to add a file to the Favorites table based on the current student's ID
     *
     * This method inserts a new entry into the chops_favorites table and fills in the columns
     * with the current Student's ID, the file's address, table, and ID.
     *
     * @param array that is formatted as: [student_id, file's ID, file's address, and the file's origin table name]
     *
     * @return void
     */
    function addToFavorite($values)
    {
    	$query = "INSERT INTO chops_favorites (student_id, file_id, file, lib_table) 
    						VALUES ('$values[0]', '$values[1]', '$values[2]', '$values[3]')";

    	$result = mysqli_query($this->conn, $query);

			$this->testForError($result);

			// return true;
    }

    /**
     * Query method used to remove a file from the Favorites table based on the current student's ID
     *
     * very similar to the addToFavorites method except it is deleting a row in the chops_favorites
     * table that has the corrosponding values
     *
     * @param array that is formmatted as: [student_id, file's ID, and the file's origin table name]
     *
     * @return boolean if successful
     */
    function removeFromFavorite($values)
    {
      $query = "DELETE FROM chops_favorites 
                WHERE student_id = $values[0]
                AND file_id = $values[1]
                AND lib_table = '$values[2]'";

    	$result = mysqli_query($this->conn, $query);

			$this->testForError($result);

			return true;
    }

    /**
     * Check method to see if a Row exists in the Student Progress table
     *
     * Given a Student's ID and a specific file's address, checks to see if
     * a row in the chops_favorites table has the matching student_id and file address fields
     *
     * @param tuple with a student's ID and a file's address
     *
     * @return boolean if successful
     */
    function checkStudentFavorite($studentID, $file)
    {
      $studentFavorites = $this->getStudentFavorites($studentID);

      $length = count($studentFavorites);

      for ($counter = 0; $counter < $length; $counter++)
      {
        if ($file == $studentFavorites[$counter]['file'])
        {
          return true;
        }
      }

      return false;
    }

    /**
     * Gets all rows corrosponding to the current Student's ID
     *
     * Using the logged in Student's ID, make an array with all the information
     * that is associated with that ID in the chops_favorites table
     *
     * @param integer #studentID that is the currently logged in student's ID identifier
     *
     * @return array
     */
    function getStudentFavorites($studentID)
    {
      $results = [];
      $counter = 0;

      $query = "SELECT * FROM chops_favorites WHERE student_id = '$studentID'";

      $result = mysqli_query($this->conn, $query);

      $this->testForError($result);

      while ($row = mysqli_fetch_assoc($result)) 
      {
        $results[$counter] = $row;
        $counter = $counter + 1;
      }

      return $results;
    }

    /**
     * Query method used to update the information in the Student table of the Database.
     *
     * When a Student updates their Student Object via the update_user form,
     * it also needs to update the information in the Database
     *
     * @param array $values structured like: [student's username, password, fname, and thier ID]
     *
     * @return boolean if successful
     */
    function updateStudentQuery($values)
    {
    	$query = "UPDATE chops_students 
    						SET username = '$values[0]', password = '$values[1]', fname = '$values[2]' 
    						WHERE id = '$values[3]'";

   		$result = mysqli_query($this->conn, $query);

   		$this->testForError($result);

   		return true;
    }

    /**
     * Query method used to insert a new Student into the Student table of the Database.
     *
     * When a new student creates an account, there must be a new entry into the
     * chops_students table with the fields filled in with the information they submitted
     *
     * @param array $values structured like: [student's username, password, and fname]
     *
     * @return boolean if successful
     */
    function insertStudent($values)
    {
      
      //First, check to see if there is a Student already there with the same creds

    	$query = "INSERT INTO chops_students (username, password, fname)
                VALUES ('$values[0]', '$values[1]', '$values[2]')";

      $result = mysqli_query($this->conn, $query);

      $this->testForError($result);


   		return true;
    }

    /**
     * Add new "Progress" row in the Student Progress table
     *
     * Insert a new row in the progress table with the current student's ID
     * and the rudiment's ID with a status field set to 1 for completed and 0 for uncompleted
     *
     * @param tuple with the Student's ID and the rudiment's ID
     *
     * @return boolean if successful
     */
    function updateStudentProgress($ID, $r_id)
    {
      $query = "INSERT INTO chops_student_progress (r_id, student_id, status)
                VALUES ('$r_id', '$ID', '1')";

      $result = mysqli_query($this->conn, $query);

      $this->testForError($result);

      return true;
    }

    /**
     * Check to see if a Row exists in the Student Progress table
     *
     * Similar to updateStudentProgress, except this first checks to see if a row
     * is even there, if it is not, then it is Null and if it is there, it matches the
     * student ID and rudiment ID with the given variables
     *
     * @param tuple with the Student's ID and the rudiment's ID
     *
     * @return boolean on success and Null on unsuccessful
     */
    function checkStudentProgress($ID, $r_id)
    {
      $query = "SELECT status FROM chops_student_progress
                WHERE student_id = '$ID'
                AND r_id = '$r_id'";

      $result = mysqli_query($this->conn, $query);

      if ($result->num_rows == 0)
      {
        return Null;
      } else
      {
        return true;
      }
    }

    /**
     * Method for Deleting a Student and all their related progress
     *
     * This multi-step process first deletes all the rows in the Student Progress table
     * with the associated student ID, then it deletes all the rows in the Favorites table
     * just like the Progress table, and lastly it deletes the row in the Students table itself
     *
     * @param integer $ID as the currently logged in Student's ID
     *
     * @return
     */
    //Query method used to delete a Student user from the Student table in the Database.
    /* protected? */function deleteStudent($ID)
    {
      //First, delete the Student's Rudiment progress
      $query_progress = "DELETE FROM chops_student_progress
                         WHERE student_id = '$ID'";

      $result_progress = mysqli_query($this->conn, $query_progress);

      $this->testForError($result_progress);

      //Next, delete all the files the Student has Favorited
    	$query_favorites = "DELETE FROM chops_favorites 
    						WHERE student_id = '$ID'";

    	$result_favorites = mysqli_query($this->conn, $query_favorites);

      $this->testForError($result_favorites);

      //Lastly, delete the Student from the students table
      $query = "DELETE FROM chops_students 
                WHERE chops_students.id = '$ID'";

      $result = mysqli_query($this->conn, $query);

      $this->testForError($result);

      return true;
    }

    /**
     * This private method is used to test if there was an error performing a Database query.
     *
     * @param mysqli query result object
     *
     * @return throw error on failure
     */
    private function testForError($result)
    {
      if (!$result)
      {
        die ("Error retreiving information from Database.");
      }
    }


  }

?>