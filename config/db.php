<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=employees_sys", "root", "");
} catch (PDOException $e) {
    die("DB Connection Failed: " . $e->getMessage());
}
