<?php
include 'dbconnect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // hash password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // insert data into the users table
    $stmt = $conn->prepare("INSERT INTO users (NAME, EMAIL, PASSWORD) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        header("Location: tyforregistering.html"); // Redirect to thank-you page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
