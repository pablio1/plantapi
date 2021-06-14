<?php

//class that holds the db context
require_once __DIR__ . './DBConfig.php';

class Database
{
    private $_connection;
    private static $_instance;
    private $_user = DB_USER; 
    private $_passsword  = DB_PASSWORD;
    private $_db = DB_DATABASENAME;
    private $_host = DB_HOST; 
    
    private function __construct()
    {
        // params 1. host, 2. user, 3. password, 4. dbname
        $this->_connection = new mysqli($this->_host, $this->_user, $this->_passsword, $this->_db);        
    }

    public function getConnection()
    {        
        return $this->_connection;   
    }

    //singleton database pattern
    public static function getInstance()
    {
        if(!self::$_instance)
        {            
            self::$_instance = new self();  
        }
        return self::$_instance;
    }

    //copy constructor
    private function __clone()
    {
    } 
}

?>