<?php

require_once __DIR__ . './DBConnection.php';

class User
{
    //connection to db
    private $_table = "login";
    private $_conn;
    private $_db;
    private $_stmt;

    //properties
    private $id;
    private $name;
    private $email;
    private $gender;
    private $phonenumber;
    private $password;
    
    public function __construct()
    {
        $this->_db = Database::getInstance();
        $this->_conn = $this->_db->getConnection();
    }
    
    function selectSpecificUser($email, $password)
    {
        $this->_stmt = $this->_conn->prepare("SELECT * FROM " . $this->_table . " WHERE email = '$email' AND password = '$password'");
        //$this->_stmt->bind_param("s", );
        $this->_stmt->execute();
        return $this->_stmt->get_result();
    }
    function checkUsername($email)
    {	
        $this->_stmt = $this->_conn->prepare("SELECT * FROM " . $this->_table . " WHERE email = '$email'");
        //$this->_stmt->bind_param("s", );
        $this->_stmt->execute();
        return $this->_stmt->get_result();
    }
    function insertUser()
    {
        $this->_stmt = $this->_conn->prepare("INSERT INTO " . $this->_table . "(name, email, gender,phonenumber,password) VALUES (?,?,?,?,?)");
        $this->_stmt->bind_param("sssss", $this->name, $this->email, $this->gender, $this->phonenumber, $this->password);
        return $this->_stmt->execute();
    }

    
    
    function setName($name)
    {
        $this->name = $name;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }
    function setGender($gender)
    {
        $this->gender = $gender;
    }
    function setPhone($phone)
    {
        $this->phonenumber = $phone;
    }
    function setPassword($password)
    {
        $this->password = $password;
    }
    function setId($id)
    {
        $this->id = $id;
    }
}

?>