<?php

class Database {
    private $host = "localhost";
    private $db_name = "student_management";
    private $username = "root";
    private $password = "";  
    private $conn = null;

    public function connect() {
        try {
            $this->conn = new PDO( 
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch(PDOException $e) {
            //PDO Exception handles connection errors
            echo "Connection error: " . $e->getMessage(); //description of error
            return null;
        }
    }
}