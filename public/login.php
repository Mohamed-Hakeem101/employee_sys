<?php
session_start();
require '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_code = $_POST['employee_code'];
    $password = $_POST['password'];

    // Fetch the employee from DB
    $stmt = $pdo->prepare("SELECT * FROM employees WHERE emp_code = ?");
    $stmt->execute([$employee_code]);
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($employee) {
        if(password_verify($password, $employee['emp_password'])){
            // Password is correct, login
            $_SESSION['emp_id'] = $employee['emp_id'];
            $_SESSION['emp_name'] = $employee['emp_name'];
            header('Location: punch_in.php');
            exit;
        } else {
            die("Invalid password");
        }
    } else {
        die("User not found");
    }
}
?>

<form method="POST" action="login.php">
    <div class="mb-3">
        <label for="employee_code">Employee Code</label>
        <input type="text" name="employee_code" required>
    </div>
    
    <div class="mb-3">
        <label for="password">Password</label>
        <input type="password" name="password" required>
    </div>
    
    <button type="submit">Login</button>
</form>
<div class="mt-5">
    <a href="../admin/add_employee.php">Add employee</a>
</div>
