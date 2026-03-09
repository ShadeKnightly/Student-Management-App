<?php
include_once __DIR__ . "/../config/Database.php";

class User {
    private $conn;

    public function __construct(){
        $database = Database::getInstance();
        $this->conn = $database->connect();
        }

    public function register($username, $email, $password) {
        $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    public function emailExists($email) {
        $query = "SELECT id FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount() > 0; 
    }

    public function usernameExists($username) {
        $query = "SELECT id FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->rowCount() > 0; 
    }

    public function getUserByEmail($email){
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
       
}