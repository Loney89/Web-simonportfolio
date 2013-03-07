<?php

class DB {
    private static $instance = NULL;

    private $link = NULL;
    private $db_host = "mscit.db.7896170.hostedresource.com";
    private $db_schema = "mscit";
    private $db_user = "mscit";
    private $db_password = "Tutorial1!";
    private $connected = false;


    private function __construct() 
    {
        // private so the constructor cannot be called elsewhere
        ;
    }

    public static function getInstance() 
    {
        if (!isset(self::$instance))
        {
            self::$instance = new DB();
        }

        return self::$instance;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function connect($host='', $user='', $password='', $schema='')
    {
        if ($this->connected) {
            return;
        }

        // using hard-coded values instead of parameters (for now)
        $this->link = mysql_connect($this->db_host, $this->db_user, $this->db_password);
        mysql_select_db($this->db_schema, $this->link);

        $this->connected = true;
    }

    public function query($query) 
    {
        $result = mysql_query($query, $this->link);

        return $result;
    }

    private function __clone()
    {
        // private so the singleton object is not cloned
        ;
    }
} 

?>
