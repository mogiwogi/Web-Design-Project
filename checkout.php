<?php
session_start();
include 'dbconnect.php'; // Ensure this file exists and works correctly

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login_prompt.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];

    // Decode the cart data
    $cart_data = json_decode($_POST['cart_data'], true);

    if (empty($cart_data)) {
        echo "Error: No items in the cart.";
        exit();
    }

    // Prepare the statement to insert into the orders table
    $stmt = $conn->prepare("INSERT INTO orders (user_id, product_name, quantity, total_price) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }

    // Loop through each item in the cart and insert into the orders table
    foreach ($cart_data as $item) {
        $product_name = $item['name'];
        $quantity = intval($item['quantity']); // Ensure quantity is an integer
        $total_price = floatval($item['price']) * $quantity; // Ensure total price is a float

        $stmt->bind_param("isid", $user_id, $product_name, $quantity, $total_price);

        if (!$stmt->execute()) {
            echo "Error executing statement: " . $stmt->error;
            exit();
        }
    }

    $stmt->close();
    $conn->close();

    // Redirect to the thank you page
    header("Location: thank_you_checkout.php");
    exit();
} else {
    echo "Invalid request method.";
}
?>
