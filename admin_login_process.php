<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Default admin credentials
    $default_username = "Admin";
    $default_password = "admin123";

    if ($username === $default_username && $password === $default_password) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin_dashboard.php');
        exit;
    } else {
        echo "<script>alert('Invalid username or password!'); window.location.href='index.php';</script>";
    }
} else {
    header('Location: admin_index.php');
    exit;
}
?>
