<?php
session_start();

// Determine the homepage based on login status
$homepage = isset($_SESSION['user_id']) ? 'index2.php' : 'index.html';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="thank_you_checkout_styles.css">
</head>
<body>

    <header>
        <div class="back-link">
            <a href="<?php echo $homepage; ?>">Back</a>
        </div>
    </header>

    <section class="thank-you-container">
        <div class="logo-container">
            <img src="arkived.png" alt="Logo">
        </div>
        <div class="message-box">
            <h1>Thank You for Your Purchase!</h1>
            <p>We've sent a confirmation email to your inbox. Stay tuned for live updates on your product's journey!</p>
            <!-- Dynamically set the homepage link -->
            <a href="<?php echo $homepage; ?>" class="back-button">Return to Homepage</a>
        </div>
    </section>

</body>
</html>
