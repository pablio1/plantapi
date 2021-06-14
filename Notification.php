<?php
    
require_once __DIR__ . './DBConnection.php';

class Notification
{
    //connection to db
    private $_table = "notification";
    private $_conn;
    private $_db;
    private $_stmt;
    //properties
    private $notif_id;
    private $message;
    private $userid;
    private $status;
    private $schedule;

    public function __construct()
    {
        $this->_db = Database::getInstance();
        $this->_conn = $this->_db->getConnection();
    }

    function selectUnreadMessages()
    {
        $this->_stmt = $this->_conn->prepare("SELECT * FROM " . $this->_table . " WHERE status = 0");
        $this->_stmt->execute();
        return $this->_stmt->get_result();
    }

    function addNotification($schedule)
    {
        $this->_stmt = $this->_conn->prepare("INSERT INTO notification (`message`,`userid`,`status`,`schedule`) VALUES ('You have to water the plants!', 4,0,'$schedule')");
        return $this->_stmt->execute();
    }

}
?>