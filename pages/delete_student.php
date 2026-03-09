<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
require_once "../controllers/StudentController.php";
$controller = new StudentController();

if(!isset($_SESSION['user_id'])){
    header('Location: /Assignment1/pages/login.php');
    exit();
}

$controller->delete();