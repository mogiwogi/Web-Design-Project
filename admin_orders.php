<?php
include 'dbconnect.php';

// Fetch all orders from the database
$sql = "SELECT o.id, u.name AS user_name, o.product_name, o.quantity, o.total_price, o.order_date
        FROM orders o
        JOIN users u ON o.user_id = u.id
        ORDER BY o.order_date DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Error fetching orders: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Orders</title>
    <link rel="stylesheet" href="admin_styles.css">
</head>
<body>
    <h1>Order Management</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User Name</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['total_price']; ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
