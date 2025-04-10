<?php
require '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $employee_code = $_POST['employee_code'];
    $password = $_POST['password']; // Plain password
    
    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert the new employee into the database
    $stmt = $pdo->prepare("INSERT INTO employees (emp_name, emp_code, emp_password) VALUES (?, ?, ?)");
    $stmt->execute([$name, $employee_code, $hashed_password]);

    echo "Employee added successfully!";
}
?>

<form method="POST" action="add_employee.php">
    <div class="mb-2">
    <label for="name">Name</label>
    <input type="text" name="name" required>
    </div>

    <div class="mb-3">
    <label for="employee_code">Employee Code</label>
    <input type="text" name="employee_code" required>
    </div>

    <div class="mb-3">
    <label for="password">Password</label>
    <input type="password" name="password" required>
    </div>

    <button type="submit">Add Employee</button>
</form>
