<?php
/*************
*
*	Database Class
*
*	- Connects to the Database
*	- Queries the Database
*	- Returns Rows from the Database
*
*	@author - S Nicholls
*	@modified - 28/02/2012
*	@access - class
*
*
*************/
class DB {

	//Instance of Self
    private static $instance = NULL;

	//MySQL Resource
    private $link = NULL;
	
	//Database Hostname
    private $db_host = "localhost"; //"mscit.db.7896170.hostedresource.com";
	//Database 
    private $db_schema = "mscit";
	//Database User
    private $db_user = "mscit";
	//Database Password
    private $db_password = "Tutorial1!";
	
	//flag if connection exists
    private $connected = false;


	/**
	* Private so the constructor cannot be called elsewhere
	*/
    private function __construct() 
    {
        return ;
    }

	/**
	* Creates Database Instance
	*
	* @return Instance Of DBs
	*/
    public static function getInstance() 
    {
        if (!isset(self::$instance))
        {
            self::$instance = new DB();
        }

        return self::$instance;
    }

	/**
	* Provides MySQL Resource Externally
	*
	* @return MySQL Resource
	*/
    public function getLink()
    {
        return $this->link;
    }
	
	/**
	* Creates MySQL Database Connection
	*
	* @param $host string
	* @param $user string
	* @param $password string
	* @param $schema string (aka database name)
	* @return true/false
	*/
    public function connect($host='', $user='', $password='', $schema='')
    {
        if ($this->connected) {
            return;
        }

        // using hard-coded values instead of parameters (for now)
        $this->link = mysql_connect($this->db_host, $this->db_user, $this->db_password);
        mysql_select_db($this->db_schema, $this->link);

        $this->connected = true;
		
		return $this->connected;
    }

	/**
	* Executes MySQL Queries/Statements on the Server
	* 
	* @param $query string (eg - mysql query select/update/insert)
	* @return MySQL Resource/Results
	*/
    public function query($query) 
    {
        $result = mysql_query($query, $this->link);

		$this->result = $result;
		
        return $result;
    }
	
	/**
	* Quotes and makes values safe to be used in MySQL 
	*
	* @param $value string/int
	* @return string
	*/
	public function quote($value){
		return mysql_real_escape_string($value);
	}
	
	/**
	* Fetches Rows from a Successful MySQL Query (using query() method)
	*
	* @return array (of MySQL Rows)
	*/
	public function getRows()
	{
		//if we have a single row...
		if(mysql_num_rows($this->result) == 1){
			return mysql_fetch_assoc($this->result);
		}
		
		//if we have multiple rows...
		$result = array();
		while($row = mysql_fetch_assoc($this->result)){
			$result[] = $row;
		}		
		return $result;		
	}

	/**
	* Magic Method... don't worry about it.
	*/
    private function __clone()
    {
        // private so the singleton object is not cloned
        ;
    }
} 

?>
