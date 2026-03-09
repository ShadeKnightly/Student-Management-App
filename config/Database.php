<?php
class Database {
    private $host = "localhost";
    private $db_name = "student_management";
    private $username = "root";
    private $password = "";
    private static $instance = null;
    private $conn = null;

    private function __construct(){}

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function connect(){
        if($this->conn === null){
            try {
                $this->conn = new PDO(
                    "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                    $this->username,
                    $this->password
                );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
                echo "Connection error: " . $e->getMessage();
            }
        }
        return $this->conn;
    }
}