<?php
require '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $employee_id = $_POST['employee_id']; // This should be the correct employee ID
    $type = $_POST['punch_type'];
    $ip = $_SERVER['REMOTE_ADDR'];  // Use the actual client IP address instead of hardcoding

    $stmt = $pdo->prepare("INSERT INTO punch_logs (employee_id, punch_type, punch_time, ip_address) VALUES (?, ?, NOW(), ?)");
    $stmt->execute([$employee_id, $type, $ip]);

    echo "Punched $type at " . date("Y-m-d H:i:s");
}
?>

<a href="../public/punch_out.php" style="margin-left: 5rem;">Punch Out</a>
