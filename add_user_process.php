<?php
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['NAME'];
    $email = $_POST['EMAIL'];
    $password = password_hash($_POST['PASSWORD'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (NAME, EMAIL, PASSWORD) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        header("Location: admin_manage_users.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
