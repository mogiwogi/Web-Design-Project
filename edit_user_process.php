<?php
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['ID'];
    $name = $_POST['NAME'];
    $email = $_POST['EMAIL'];
    $password = $_POST['PASSWORD'];

    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET NAME = ?, EMAIL = ?, PASSWORD = ? WHERE ID = ?");
        $stmt->bind_param("sssi", $name, $email, $hashed_password, $id);
    } else {
        $stmt = $conn->prepare("UPDATE users SET NAME = ?, EMAIL = ? WHERE ID = ?");
        $stmt->bind_param("ssi", $name, $email, $id);
    }

    if ($stmt->execute()) {
        header("Location: admin_manage_users.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
