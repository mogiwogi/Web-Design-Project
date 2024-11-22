<?php
include 'dbconnect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM users WHERE ID = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: admin_manage_users.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
