<?php
// Start a session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: loginpage.html"); // Redirect to login page if not logged in
    exit();
}

// Database connection
$conn = new mysqli("localhost", "root", "", "sign_up");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT ID, NAME, EMAIL, created_at FROM users WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="dashboard_styles.css">
</head>
<body>
    <section class="user-dashboard">
        <h1>Welcome, <?= htmlspecialchars($user['NAME']); ?>!</h1>

        <!-- User Details -->
        <form>
            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" value="<?= htmlspecialchars($user['ID']); ?>" disabled>

            <label for="name">Name:</label>
            <input type="text" id="name" value="<?= htmlspecialchars($user['NAME']); ?>" disabled>

            <label for="email">Email:</label>
            <input type="email" id="email" value="<?= htmlspecialchars($user['EMAIL']); ?>" disabled>

            <label for="created_at">Account Created On:</label>
            <input type="text" id="created_at" value="<?= htmlspecialchars($user['created_at']); ?>" disabled>
        </form>

        <!-- Logout Button -->
        <a href="logout.php" class="logout-btn">Logout</a>
    </section>
</body>
</html>
