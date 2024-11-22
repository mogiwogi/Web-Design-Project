<?php
session_start();
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $action = $_POST['action'];

    $status = $action === 'approve' ? 'Approved' : 'Denied';

    $stmt = $conn->prepare("UPDATE custom_design_requests SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);

    if ($stmt->execute()) {
        header("Location: admin_custom_design.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
