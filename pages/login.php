<?php
session_start();
require_once "../controllers/AuthController.php";
$controller = new AuthController();
$error = null;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $controller->login();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if(isset($_SESSION['error'])): ?>
            <div class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        <?php if(isset($_GET['success'])): ?>
            <div class="success"><?php echo $_GET['success']; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>