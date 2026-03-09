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

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $controller->create();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="container">
        <div class="header-bar">
            <h2>Add New Student</h2>
            <div>
                <span>Welcome, <?php echo $_SESSION['username']; ?></span>
                <a href="../logout.php" class="btn btn-logout">Logout</a>
            </div>
        </div>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" required>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <button type="submit">Add Student</button>
        </form>
        <a href="students.php" class="btn">Back to Students</a>
    </div>
</body>
</html>