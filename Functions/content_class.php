<?php

	require $_SERVER['DOCUMENT_ROOT'] . '/chops/hc07-chops/Database/dbconnect.php';

	class Content extends Database {

		//class properities
		public $ID;
		public $table;


		//constructor used to initialize an object
		function __construct($ID, $table, $server)
		{
			$this->ID = $ID;
			$this->table = $table;
			parent::__construct($server);
		}

		//Content class methods
		// Wrapper methods. TODO/FIX //

		//Get the URL address of the file from the database
		function get_file_address()
		{
			return Database::findOne($this->ID, $this->table, 'file');
		}


		//get the Name/title of the File from the database
		function get_file_name()
		{
			return Database::findOne($this->ID, $this->table, 'name');
		}


		//return the File's table-specfic ID
		function get_file_id()
		{ 

    		return $this->ID; 
		}


		//returns the ID associated with a rudiment for compiling files with the same rudiment ID
		function get_rudiment_id()
		{
			return Database::findOne($this->ID, $this->table, 'rudiment_id');			
		}


		// ETUDE Specifc methods. Should throw Error if table !== etude //

		//get the Composer/Writer of a specific Etude
		function get_composer()
		{
			if ($this->table !== 'chops_etudes')
			{
				die ("Cannot access Composer of non-Etude content. (Composer is Etude-specific)");
			}

			return Database::findOne($this->ID, $this->table, 'composer');
  		}

  		//If an etude is multiple pages, grab which page the file is
  		function get_page_num() 
  		{
			if ($this->table !== 'chops_etudes')
			{
				die ("Cannot access Composer of non-Etude content. (Composer is Etude-specific)");
			}

			return Database::findOne($this->ID, $this->table, 'page');
  		}


  		// AUDIO Specifc methods. Should throw Error if table !== audio //

		//get the Composer/Writer of a specific Etude
		function get_audio_bpm()
		{
			if ($this->table !== 'chops_audio')
			{
				die ("Cannot access bpm of non-Audio content. (BPM is Audio-specific)");
			}

			return Database::findOne($this->ID, $this->table, 'bpm');
  		}


	}


?>