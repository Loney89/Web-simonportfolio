<?php
/**
*	Provides Core Functionality to the Application
*
*	- Creates MySQL Connection
*	- Renders Views & HTML Pages/Forms
*
*	@author - S Nicholls
*	@modified - 28/02/2012
*	@access - class
*/
class Base {

	//Protected DB Instance
	protected $db;

	/**
	* Create Instance of MySQL Database from DB Class
	*
	* @access protected
	* @return instance of DB Class
	*/
	protected function getDatabase(){
	
		$this->db = DB::getInstance();
        $this->db->connect();
		
		return $this->db;
	}	

	/**
	* Render Method -- render's files from the view directory.
	*
	* @access protected
	* @param $file_name string
	* @param $environment array
	* @return null
	*/
    protected function render($file_name, $environment = null)
    {
        if ($environment) {
            extract($environment);
        }

		if(file_exists(__SITE_PATH . '/views/' . $file_name . '.php') !== TRUE){
			throw new Exception(__METHOD__." Missing View File");
		}

		require(__SITE_PATH . '/views/' . $file_name . '.php');		
    }
}
