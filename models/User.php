<?php
include "config/Database.php";   // makes the Database class available

class User {
    private $conn;

    public function __construct(){
        $database = new Database();      // creates a Database object
        $db = $database->connect();      // gets the connection
        $this->conn = $db;               // stores it
    }
       
}