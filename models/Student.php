<?php
include_once __DIR__ . "/../config/Database.php";

class Student {
    private $conn;

    public function __construct(){
        $database = Database::getInstance();
        $this->conn = $database->connect();
        }

    public function getAll(){
        $query = "SELECT * FROM students";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($first_name, $last_name, $email){
        $query = "INSERT INTO students (first_name, last_name, email) VALUES (:first_name, :last_name, :email)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    public function delete($student_id){
        $query = "DELETE FROM students WHERE student_id = :student_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':student_id', $student_id);
        return $stmt->execute();
    }
}