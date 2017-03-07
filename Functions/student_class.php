<?php

	use \chops\hc07chops\Database\dbconnect;
	
	class Student {

		//class properities
		public $username;
		public $name;
		private $password;
		protected $user_id;

		//constructor used to initialize a student
		function __construct($student_username, $student_password) 
		{
			$this->username = $student_username;	
			$this->password = $student_password;
			$this->user_id = Database::connect()->findOneWithoutID("username", $student_username, 
											"password", $student_password, "chops_students", "id");
			$this->name = Database::connect()->findOne($this->user_id, "chops_students", "fname");
		}

		//class methods
		function getUserID()
		{
			return $this->user_id;
		}


		function setName($new_name) 
		{
			$this->name = $new_name;
		}


		function getName() 
		{
			return $this->name;
		}


		function setUsername($new_username) 
		{
			$this->username = $new_username;
		}


		function getUsername() 
		{
			return $this->username;
		}


		function setPassword($new_password)
		{
			$this->password = $new_password;
		}


		function getPassword()
		{
			return $this->password;
		}

		// --- FAvORITES Section --- //
		// ---  ---  TODO  ---  --- //

		//Returns true if a file IS favorited by a student.
		//Returns false if it is not. 
		function checkFavorite($file)
		{
			$result = Database::connect()->findOne($this->user_id, 'chops_favorites', $file);

			if ($result)
			{
				return true;
			}

			return false;
		}

		//TODO
		function getFavorites()
		{
			$favorites = Database::connect()->getStudentFavorites($this->user_id);

			return $favorites;
		}

		//Passed a Content OBJECT, then using the Content Class and the Database Class methods,
		//it adds a file to the current Student's Favorites section/table.
		function addFavorite($Content)
		{
			$values = [$this->user_id, $Content->getFileID(), $Content->getFileAddress(), $Content->getFileTable()];

			Database::connect()->addToFavorite($values);
		}

		//Passed a Content OBJECT, then using the Content Class and the Database Class methods,
		//it removes a file from the current Student's Favorites section/table. 
		function removeFavorite($Content)
		{
			$values = [$this->user_id, $Content->getFileID(), $Content->getFileAddress(), $Content->getFileTable()];

			Database::connect()->removeFromFavorite($values);
		}

		//It is given a username and password variables as checkers.
		//The passed variables are then used to grab a student_id (using a DB method). 
		//	If that fails, then there is no user with that username or password.
		//If it finds an ID that is associated with the passed args,
		//Then it trys to get a table row with all the Student information.
		//It uses the information in that Database row to see if it matches the passed args.
		//	If it does, then that student is logged in.
		//	If it does not, then the information given is incorrect.
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

	}


?>