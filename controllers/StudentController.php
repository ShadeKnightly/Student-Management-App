<?php
include_once __DIR__ . "/../models/Student.php";

class StudentController {
    private $studentModel;

    public function __construct(){
        $this->studentModel = new Student();
    }

    public function getStudents(){
    return $this->studentModel->getAll();
}

    public function index(){
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    if(!isset($_SESSION['user_id'])){
        header('Location: /Assignment1/pages/login.php');
        exit();
    }
    $students = $this->studentModel->getAll();
}

public function create(){
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    if(!isset($_SESSION['user_id'])){
        header('Location: /Assignment1/pages/login.php');
        exit();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $email = trim($_POST['email']);

        if(empty($first_name) || empty($last_name) || empty($email)){
            $_SESSION['error'] = "All fields are required";
            return;
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] = "Invalid email format";
            return;
        }

        if($this->studentModel->create($first_name, $last_name, $email)){
            header('Location: /Assignment1/pages/students.php?success=Student added successfully');
            exit();
        } else {
            $_SESSION['error'] = "Something went wrong, please try again";
        }
    }
}

    public function delete(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
            }
        if(!isset($_SESSION['user_id'])){
            header('Location: /Assignment1/pages/login.php');
            exit();
        }

        if(isset($_GET['id'])){
            $student_id = $_GET['id'];
            if($this->studentModel->delete($student_id)){
                header('Location: /Assignment1/pages/students.php?success=Student deleted successfully');
                exit();
            } else {
                header('Location: /Assignment1/pages/students.php?error=Could not delete student');
                exit();
            }
        }
    }
}