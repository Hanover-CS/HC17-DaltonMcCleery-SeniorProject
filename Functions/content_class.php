<?php

	use \chops\hc07chops\Database\dbconnect;

	class Content {

		//class properities
		public $ID;
		public $table;


		//constructor used to initialize an object
		function __construct($ID, $table)
		{
			$this->ID = $ID;
			$this->table = $table;
		}

		//Content class methods
		// Wrapper methods. TODO/FIX //

		//Get the URL address of the file from the database
		function getFileAddress()
		{
			return Database::connect()->findOne($this->ID, $this->table, 'file');
		}


		//get the Name/title of the File from the database
		function getFileName()
		{
			return Database::connect()->findOne($this->ID, $this->table, 'name');
		}


		//return the File's table-specfic ID
		function getFileID()
		{ 
    		return $this->ID; 
		}

		//return the File's table-specfic ID
		function getFileTable()
		{ 
    		return $this->table; 
		}


		//returns the ID associated with a rudiment for compiling files with the same rudiment ID
		function getRudimentID()
		{
			if ($this->table == "chops_rudiment" or $this->table == "chops_hybrids")
			{
				//Rudiment table in the database does NOT have a 'rudiment_id' field.
				//since it IS a rudiment, it is just called id.
				return Database::connect()->findOne($this->ID, $this->table, 'id');
			}

			return Database::connect()->findOne($this->ID, $this->table, 'rudiment_id');	
		}


		// ETUDE Specifc methods. Should throw Error if table !== etude //

		//get the Composer/Writer of a specific Etude
		function getComposer()
		{
			if ($this->table !== 'chops_etudes')
			{
				die ("Cannot access Composer of non-Etude content. (Composer is Etude-specific)");
			}

			return Database::connect()->findOne($this->ID, $this->table, 'composer');
  		}

  		//If an etude is multiple pages, grab which page the file is
  		function getPageNum() 
  		{
			if ($this->table !== 'chops_etudes')
			{
				die ("Cannot access Composer of non-Etude content. (Composer is Etude-specific)");
			}

			return Database::connect()->findOne($this->ID, $this->table, 'page');
  		}


  		// AUDIO Specifc methods. Should throw Error if table !== audio //

		//get the Composer/Writer of a specific Etude
		function getBPM()
		{
			if ($this->table !== 'chops_audio')
			{
				die ("Cannot access bpm of non-Audio content. (BPM is Audio-specific)");
			}

			return Database::connect()->findOne($this->ID, $this->table, 'bpm');
  		}


	}


?>