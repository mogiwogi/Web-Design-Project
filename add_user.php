<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <h1 style="text-align: center;">Add New User</h1>
    <form action="add_user_process.php" method="POST" style="width: 300px; margin: auto;">
        <label for="NAME">Full Name:</label><br>
        <input type="text" id="NAME" name="NAME" required><br><br>

        <label for="EMAIL">Email:</label><br>
        <input type="email" id="EMAIL" name="EMAIL" required><br><br>

        <label for="PASSWORD">Password:</label><br>
        <input type="password" id="PASSWORD" name="PASSWORD" required><br><br>

        <button type="submit">Add User</button>
    </form>
</body>
</html>
