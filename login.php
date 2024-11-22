<?php
session_start();

$servername = "localhost";
$username = "root";
$password = ""; 
$database = "sign_up";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT ID, PASSWORD FROM users WHERE EMAIL = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['PASSWORD'])) {
            // Set session variables
            $_SESSION['user_id'] = $row['ID'];
            $_SESSION['email'] = $email;
            header("Location: index2.php"); // Redirect to the logged-in page
            exit();
        } else {
            header("Location: loginpage.html?error=Invalid email or password.");
            exit();
        }
    } else {
        header("Location: loginpage.html?error=No user found with this email.");
        exit();
    }
}

$conn->close();
?>
