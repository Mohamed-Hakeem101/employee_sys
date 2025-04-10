<?php
session_start();

// Check if the employee is logged in
if (!isset($_SESSION['emp_id'])) {
    header("Location: login.php");  // Redirect to login page if not logged in
    exit;
}
?>


<form method="POST" action="../functions/punch_out_func.php">
    <input type="hidden" name="employee_id" value="<?php echo $_SESSION['emp_id']; ?>">
    <button type="submit" name="punch_type" value="out">Punch Out</button>
</form>
