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

$students = $controller->getStudents();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="container">
        <div class="header-bar">
            <h2>Students</h2>
            <div>
                <span>Welcome, <?php echo $_SESSION['username']; ?></span>
                <a href="../logout.php" class="btn btn-logout">Logout</a>
            </div>
        </div>

        <?php if(isset($_GET['success'])): ?>
            <div class="success"><?php echo $_GET['success']; ?></div>
        <?php endif; ?>

        <?php if(isset($_GET['error'])): ?>
            <div class="error"><?php echo $_GET['error']; ?></div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($students)): ?>
                    <?php foreach($students as $student): ?>
                        <tr>
                            <td><?php echo $student['student_id']; ?></td>
                            <td><?php echo $student['first_name']; ?></td>
                            <td><?php echo $student['last_name']; ?></td>
                            <td><?php echo $student['email']; ?></td>
                            <td>
                                <td>
                                    <a href="delete_student.php?id=<?php echo $student['student_id']; ?>" 
                                    class="btn btn-delete"
                                    onclick="return confirm('Are you sure you want to delete this student?')">
                                    Delete
                                    </a>
                                </td>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No students found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>