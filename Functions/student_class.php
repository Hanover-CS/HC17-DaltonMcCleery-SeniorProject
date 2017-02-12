<?php
	
	class student {

		//class properities
		public $username;
		public $name;
		private $password;
		protected $user_id;

		//constructor used to initialize a student
		function __construct($student_name, $student_username, $student_password) {

			$this->name = $student_name;
			$this->username = $student_username;	
			$this->password = $student_password;

		}

		//class methods
		protected function get_user_id()
			{ return $this->user_id; }


		function set_name($new_name) 
			{ $this->name = $new_name; }


		function get_name() 
			{ return $this->name; }


		function set_username($new_username) 
			{ $this->username = $new_username; }


		function get_username() 
			{ return $this->username; }


		private function set_password($new_password)
			{ $this->password = $new_password; }


		private function get_password()
			{ return $this->password; }

	}


?>