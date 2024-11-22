<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_dashboard.css">
    <!-- Add Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="dashboard-container">
        <!-- Logo Section -->
        <div class="logo-container">
            <img src="arKived.png" alt="arKived Logo">
        </div>

        <!-- Welcome Message -->
        <h1>Welcome, Admin</h1>
        
        <!-- Dashboard Links -->
        <div class="dashboard-links">
            <!-- Manage Orders -->
            <a href="admin_orders.php" class="dashboard-card">
                <h2><i class="fas fa-shopping-cart"></i> Manage Orders</h2>
                <p>View and update all customer orders.</p>
            </a>
            
            <!-- Manage Users -->
            <a href="admin_manage_users.php" class="dashboard-card">
                <h2><i class="fas fa-users"></i> Manage Users</h2>
                <p>Add, edit, or delete user accounts.</p>
            </a>
            
            <!-- View Messages -->
            <a href="admin_view.php" class="dashboard-card">
                <h2><i class="fas fa-envelope"></i> View Messages</h2>
                <p>Read messages submitted by users.</p>
            </a>

            <!-- Custom Design Requests -->
            <a href="admin_custom_design.php" class="dashboard-card">
                <h2><i class="fas fa-paint-brush"></i> Custom Design Requests</h2>
                <p>View, approve, or deny custom design requests.</p>
            </a>
        </div>
        
        <!-- Logout Button -->
        <a href="admin_logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
