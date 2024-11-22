<?php
include 'dbconnect.php'; // Include database connection

// Fetch all users from the database
$result = $conn->query("SELECT * FROM users");

if ($result->num_rows > 0): // Check if there are rows
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Users</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .action-links a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Admin: Manage Users</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['ID']); ?></td>
                    <td><?php echo htmlspecialchars($row['NAME']); ?></td>
                    <td><?php echo htmlspecialchars($row['EMAIL']); ?></td>
                    <td class="action-links">
                        <a href="edit_user.php?id=<?php echo $row['ID']; ?>">Edit</a>
                        <a href="delete_user.php?id=<?php echo $row['ID']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <div style="text-align: center; margin-top: 20px;">
        <a href="add_user.php">Add New User</a>
    </div>
</body>
</html>
<?php
else:
    echo "<p style='text-align:center;'>No users found.</p>";
endif;

$conn->close();
?>
