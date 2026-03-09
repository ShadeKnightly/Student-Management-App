<?php
session_start();

if(isset($_SESSION['user_id'])){
    header('Location: pages/students.php');
} else {
    header('Location: pages/login.php');
}
exit();