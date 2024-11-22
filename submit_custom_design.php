<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'dbconnect.php'; // Ensure this file exists and connects to your database

    // Retrieve form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $design_details = $conn->real_escape_string($_POST['design-details']);
    $budget = $conn->real_escape_string($_POST['budget']);

    // Ensure the uploads directory exists
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true); // Create the directory if it doesn't exist
    }

    // Handle file upload
    $attachment = null;
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['attachment']['tmp_name'];
        $fileName = time() . "_" . basename($_FILES['attachment']['name']);
        $destination = 'uploads/' . $fileName;

        if (move_uploaded_file($fileTmpPath, $destination)) {
            $attachment = $destination;
        } else {
            die("Error uploading file. Check file permissions or folder existence.");
        }
    }

    // Insert request into database
    $stmt = $conn->prepare("INSERT INTO custom_design_requests (name, email, design_details, attachment, budget) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $design_details, $attachment, $budget);

    if ($stmt->execute()) {
        // Redirect to thank you page after successful submission
        header("Location: thank_you(cd).html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    die("Invalid request method.");
}
?>
