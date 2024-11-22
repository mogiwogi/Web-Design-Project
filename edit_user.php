<?php
include 'dbconnect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
} else {
    header("Location: admin_manage_users.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1 style="text-align: center;">Edit User</h1>
    <form action="edit_user_process.php" method="POST" style="width: 300px; margin: auto;">
        <input type="hidden" name="ID" value="<?php echo $user['ID']; ?>">

        <label for="NAME">Full Name:</label><br>
        <input type="text" id="NAME" name="NAME" value="<?php echo $user['NAME']; ?>" required><br><br>

        <label for="EMAIL">Email:</label><br>
        <input type="email" id="EMAIL" name="EMAIL" value="<?php echo $user['EMAIL']; ?>" required><br><br>

        <label for="PASSWORD">Password (leave blank to keep current):</label><br>
        <input type="password" id="PASSWORD" name="PASSWORD"><br><br>

        <button type="submit">Update User</button>
    </form>
</body>
</html>
