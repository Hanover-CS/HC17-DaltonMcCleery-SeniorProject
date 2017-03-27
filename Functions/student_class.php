<?php
	/**
	 * This file serves as the object class for the Chop's Student that is currently Logged In.
	 * *Many of the methods in this Class call Query Methods in the Database Class.*
	 */

	//this line allows this Class to use the Database Class's static methods (i.e. accessing the Connection)
	use \chops\hc07chops\Database\dbconnect;
	
	class Student {

		//class properities
		public $username;
		public $name;
		private $password;
		protected $user_id;

		/**
		 * Constructor used to initialize a Student Object
		 *
		 * @param tuple with a student's username and password (submitted from the Login form)
		 *
		 * @return void
		 */
		function __construct($student_username, $student_password) 
		{
			$this->username = $student_username;	
			$this->password = $student_password;
			//Getting the Student's ID from the Database (when the ID wasn't submitted with the Login form)
			$this->user_id = Database::connect()->findOneWithoutID("username", $student_username, 
											"password", $student_password, "chops_students", "id");
			$this->name = Database::connect()->findOne($this->user_id, "chops_students", "fname");
		}

		/**
		 * Get the current Student's ID
		 *
		 * @param void
		 *
		 * @return integer
		 */
		function getUserID()
		{
			return $this->user_id;
		}

		/**
		 * Update a current Student's name field
		 *
		 * This method sets the Student Object's name property as well as updating the same information
		 * in the Database table
		 *
		 * @param string (new first name)
		 *
		 * @return void (Error on fail)
		 */
		function setName($new_name) 
		{
			Database::connect()->updateStudentQuery([$this->username, $this->password, $new_name, $this->user_id]);
			$this->name = $new_name;
		}

		/**
		 * Get the current Student's first name
		 *
		 * @param void
		 *
		 * @return string
		 */
		function getName() 
		{
			return $this->name;
		}

		/**
		 * Update the Student's username
		 *
		 * This method updates the Student Object's username property as well as updating the same information
		 * in the Database table
		 *
		 * @param string (new username)
		 *
		 * @return void (Error on fail)
		 */
		function setUsername($new_username) 
		{
			Database::connect()->updateStudentQuery([$new_username, $this->password, $this->name, $this->user_id]);
			$this->username = $new_username;
		}

		/**
		 * Get the current Student's username
		 *
		 * @param void
		 *
		 * @return string
		 */
		function getUsername() 
		{
			return $this->username;
		}

		/**
		 * Update the Student's password
		 *
		 * This method updates the Student Object's *protected* password property as well as 
		 * updating the same information in the Database table
		 *
		 * @param string (new password)
		 *
		 * @return void (Error on fail)
		 */
		function setPassword($new_password)
		{
			Database::connect()->updateStudentQuery([$this->username, $new_password, $this->name, $this->user_id]);
			$this->password = $new_password;
		}

		// --- FAVORITES SECTION --- //

		/**
		 * This method checks to see if a Table entry exists or not
		 *
		 * This method checks to see if a file's address field exists in the chops_favorites table
		 * with the student_id matching to the current Student's ID. 
		 * Returns true if a file IS favorited by a student. Returns false if it is not.
		 *
		 * @param string (file's URL/path address)
		 *
		 * @return boolean (true if success, false if fail)
		 */
		function checkFavorite($file)
		{
			$result = Database::connect()->checkStudentFavorite($this->user_id, $file);
			
			if ($result == true) 
			{
				return true;
			}

			return false;
		}

		/**
		 * Gets an Array of table entries based on a Student's ID
		 *
		 * This method grabs all the Rows in the chops_favorites table that have
		 * the same `student_id` as the current Student Object's ID field
		 *
		 * @param void
		 *
		 * @return array (of all the matching rows)
		 */
		function getFavorites()
		{
			$favorites = Database::connect()->getStudentFavorites($this->user_id);

			return $favorites;
		}

		/**
		 * Inserts a new Table entry into Chops_favorites
		 *
		 * Passed a Content OBJECT, using the Content Class and the Database Class methods,
		 * it *adds* a file to the current Student's Favorites section/table.
		 *
		 * @param Content Object
		 *
		 * @return void
		 */
		function addFavorite($Content)
		{
			$values = [$this->user_id, $Content->getFileID(), $Content->getFileAddress(), $Content->getFileTable()];

			Database::connect()->addToFavorite($values);
		}

		/**
		 * Inserts a new Table entry into Chops_favorites
		 *
		 * Passed a Content OBJECT, using the Content Class and the Database Class methods,
		 * it *removes* a file to the current Student's Favorites section/table.
		 *
		 * @param Content Object
		 *
		 * @return void
		 */
		function removeFavorite($Content)
		{
			$values = [$this->user_id, $Content->getFileID(), $Content->getFileTable()];

			Database::connect()->removeFromFavorite($values);
		}

		/**
		 * Double checks that the Student's login information is correct
		 *
		 * It is given a username and password variables as checkers.
		 * The passed variables are then used to grab a student_id (using a DB method),
		 * and if that fails, then there is no user with that username or password.
		 * If it finds an ID that is associated with the passed args, Then it trys to get a table row with
		 * all the Student information. It uses the information in that Database row to see if it 
		 * matches the passed args. If it does, then that student is logged in.
		 * If it does not, then the information given is incorrect.
		 *
		 * @param tuple (strings) with a username and password
		 *
		 * @return boolean (true on success, false on fail)
		 */
		function checkLogin($username, $password)
		{
			$dbuser_id = Database::connect()->findOneWithoutID("username", $username, 
													"password", $password, "chops_students", "id");
			
			$dbuser = Database::connect()->findOneRow($dbuser_id, "chops_students");

			if ($dbuser['username'] != $username && $dbuser['password'] != $password)
			{
				return false;
			}

			return true;
		}

		/**
		 * Deletes a Student Account and all their associated Favorites/Progress entries
		 *
		 * Given a Student's ID, it calls a Database method that first deletes all the Student's
		 * Rudimental progress, then all the Student's Favorites entires, and then lastly the Student's
		 * row in the chops_students table
		 *
		 * @param integer (Student's unique ID)
		 *
		 * @return void
		 */
		function deleteUser($ID)
		{
			Database::connect()->deleteStudent($ID);
		}

	}


?>