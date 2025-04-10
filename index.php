<?php
session_start();

if (isset($_SESSION['employee_id'])) {
    header('Location: public/punch.php');
    exit;
} else {
    header('Location: public/login.php');
    exit;
}
