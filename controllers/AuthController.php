<?php
include_once __DIR__ . "/../models/User.php";

class AuthController {
    private $userModel;

    public function __construct(){
        $this->userModel = new User();
    }

    public function register(){
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);

        if(empty($username) || empty($email) || empty($password)){
            $_SESSION['error'] = "All fields are required";
            return;
        }
        if($password !== $confirm_password){
            $_SESSION['error'] = "Passwords do not match";
            return;
        }
        if($this->userModel->emailExists($email)){
            $_SESSION['error'] = "Email already in use";
            return;
        }
        if($this->userModel->usernameExists($username)){
            $_SESSION['error'] = "Username already taken";
            return;
        }
        if($this->userModel->register($username, $email, $password)){
            header('Location: /Assignment1/pages/login.php?success=Account created! Please login.');
            exit();
        } else {
            $_SESSION['error'] = "Something went wrong, please try again";
        }
    }

    public function login(){
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if(empty($email) || empty($password)){
            $_SESSION['error'] = "All fields are required";
            return;
        }

        $user = $this->userModel->getUserByEmail($email);

        if($user && password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: /Assignment1/pages/students.php');
            exit();
        } else {
            $_SESSION['error'] = "Invalid email or password";
        }
    }

    public function logout(){
        session_destroy();
        header('Location: /Assignment1/pages/login.php');
        exit();
    }
}