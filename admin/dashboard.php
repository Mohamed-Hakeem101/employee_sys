<?php
require '../config/db.php';
$logs = $pdo->query("SELECT * FROM punch_logs ORDER BY punch_time DESC")->fetchAll(PDO::FETCH_ASSOC);

foreach ($logs as $log) {
    echo "Emp ID: {$log['employee_id']} - {$log['punch_type']} at {$log['punch_time']}<br>";
}

