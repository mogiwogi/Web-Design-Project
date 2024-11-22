<?php
session_start();
include 'dbconnect.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_index.php');
    exit();
}

$result = $conn->query("SELECT * FROM custom_design_requests ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Custom Design Requests</title>
    <link rel="stylesheet" href="admin_styles.css">
</head>
<body>
    <h1>Manage Custom Design Requests</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Details</th>
                <th>Attachment</th>
                <th>Budget</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['design_details']) ?></td>
                    <td>
                        <?php if ($row['attachment']): ?>
                            <a href="<?= $row['attachment'] ?>" target="_blank">View Attachment</a>
                        <?php else: ?>
                            None
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($row['budget']) ?></td>
                    <td><?= htmlspecialchars($row['status']) ?></td>
                    <td>
                        <form action="update_request_status.php" method="POST">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="action" value="approve">Approve</button>
                            <button type="submit" name="action" value="deny">Deny</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
