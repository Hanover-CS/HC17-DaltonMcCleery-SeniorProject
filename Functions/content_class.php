<?php
	/**
	 * This file serves as the object class for Chop's Content (audio, video, or etude)
	 * *Many of the methods in this Class call Query Methods in the Database Class.*
	 */

	//this line allows this Class to use the Database Class's static methods (i.e. accessing the Connection)
	use \chops\hc07chops\Database\dbconnect;

	class Content {

		//class properities
		public $ID;
		public $table;


		/**
     	 * The Constructor method for establishing Connection to the Database
	     *
	     * Given a Table and an ID within that table, this method builds an Object for a Row of Content
	     * from the Database (using a lot of the DB Class methods to get that Row's information).
	     *
	     * @param tuple with a Content's $ID identifier and the specific $table name the Content belongs to
	     *
	     * @return void
	     */
		function __construct($ID, $table)
		{
			$this->ID = $ID;
			$this->table = $table;
		}

		/**
		 * Get the URL address of the file from the database
		 *
		 * This method is used to access the file's path address from the Resources Folder
		 * of the Chops project
		 *
		 * @param void
		 *
		 * @return string URL path
		 */
		function getFileAddress()
		{
			return Database::connect()->findOne($this->ID, $this->table, 'file');
		}


		/**
		 * Get the Name/title of the File from the database
		 *
		 * This method is used to get the file's Name field
		 *
		 * @param void
		 *
		 * @return string Name field of the Content's row in the Database
		 */
		function getFileName()
		{
			return Database::connect()->findOne($this->ID, $this->table, 'name');
		}


		/**
		 * Get the File's *table-specfic* ID
		 *
		 * Should only return the ID from the table the Object was created with.
		 *
		 * @param void
		 *
		 * @return integer
		 */
		function getFileID()
		{ 
    		return $this->ID; 
		}

		/**
		 * Get the table name of a *specific* Table in the Database
		 *
		 * Method used for getting the table the Object was created with
		 *
		 * @param void
		 *
		 * @return string
		 */
		function getFileTable()
		{ 
    		return $this->table; 
		}


		/**
		 * Get the ID associated with a Rudiment
		 *
		 * Method used to get the (*Forgien Key*) rudiment_id field from a Row in the Database
		 *
		 * @param void
		 *
		 * @return integer
		 */
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

		/**
		 * Get the Composer/Writer of a *specific* Etude
		 *
		 * (Etude-Only method) Used to get the Composer field from the Chops_etudes table.
		 * *Should throw error if this method is called on a non-etude Content Object.*
		 *
		 * @param void
		 *
		 * @return string
		 */
		function getComposer()
		{
			//check to make sure this method is called with the correct Table property
			if ($this->table !== 'chops_etudes')
			{
				die ("Cannot access Composer of non-Etude content. (Composer is Etude-specific)");
			}

			return Database::connect()->findOne($this->ID, $this->table, 'composer');
  		}

  		/**
  		 * Get the Page Number of a multi-page Etude
  		 *
		 * (Etude-Only method) This method is used if an etude has multiple pages. 
		 * If it does, grab which page the file is. If it doesn't, then it will return Null.
		 *
		 * @param void
		 *
		 * @return integer on success, Null on fail
		 */
  		function getPageNum() 
  		{
  			//check to make sure this method is called with the correct Table property
			if ($this->table !== 'chops_etudes')
			{
				die ("Cannot access Composer of non-Etude content. (Composer is Etude-specific)");
			}

			return Database::connect()->findOne($this->ID, $this->table, 'page');
  		}


  		// AUDIO Specifc methods. Should throw Error if table !== audio //

		/**
		 * Get the Audio's Beats-per-Minute information
		 *
		 * (Audio-Only Method) Used to access the chops_audio table's specific column's field (BPM)
		 *
		 * @param
		 *
		 * @return
		 */
		function getBPM()
		{
			//check to make sure this method is called with the correct Table property
			if ($this->table !== 'chops_audio')
			{
				die ("Cannot access bpm of non-Audio content. (BPM is Audio-specific)");
			}

			return Database::connect()->findOne($this->ID, $this->table, 'bpm');
  		}


	}


?>