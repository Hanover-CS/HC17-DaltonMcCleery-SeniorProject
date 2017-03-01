<?php

	include 'functions.php';
	
	class Student {

		//class properities
		public $username;
		public $name;
		private $password;
		protected $user_id;

		//constructor used to initialize a student
		function __construct($student_name, $student_username, $student_password) 
		{
			$this->name = $student_name;
			$this->username = $student_username;	
			$this->password = $student_password;
		}

		//class methods
		protected function get_user_id()
		{
			return $this->user_id;
		}


		function set_name($new_name) 
		{
			$this->name = $new_name;
		}


		function get_name() 
		{
			return $this->name;
		}


		function set_username($new_username) 
		{
			$this->username = $new_username;
		}


		function get_username() 
		{
			return $this->username;
		}


		private function set_password($new_password)
		{
			$this->password = $new_password;
		}


		private function get_password()
		{
			return $this->password;
		}

		// --- FAvORITES Section --- //

		//Returns true if a file IS favorited by a student.
		//Returns false if it is not. 
		function checkFavorite($file)
		{
			$query = "SELECT $file FROM chops_favorites WHERE student_id = $this->student_id";

			$result = mysqli_fetch_array( mysqli_query($Database->getConn(), $query) );

			if ($result)
			{
				return true;
			}

			return false;
		}

		//Passed a Content OBJECT, then using the Content Class and the Database Class methods,
		//it adds a file to the current Student's Favorites section/table. 
		function addFavorite($Content)
		{
			$values = [$this->user_id, $Content->get_file_id(), $Content->get_file_address()];

			$Database->addToFavorites($values);
		}

	}


?>