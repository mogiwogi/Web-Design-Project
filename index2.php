<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: loginpage.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arKived - Logged In</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Top Notification Bar -->
    <div class="top-notification">
        GET 20% DISCOUNT WHEN YOU <a href="signup.html" class="signup-link">SIGN UP</a> BEFORE.
    </div>

    <!-- Header Section -->
    <header>
        <div class="header-left">
            <div class="logo">
                <img src="arkived.png" alt="Logo">
            </div>
        </div>
        <nav>
            <ul>
                <li class="dropdown">
                    <a href="#">Categories</a>
                    <ul class="dropdown-menu">
                        <li><a href="jacketscat.html">Jackets</a></li>
                        <li><a href="bottomcat.html">Bottoms</a></li>
                        <li><a href="accessoriescat.html">Accessories</a></li>
                        <li><a href="walletscat.html">Wallets</a></li>
                        <li><a href="bagscat.html">Bags</a></li>
                    </ul>
                </li>
                <li><a href="new_arrivals.html">New Arrivals</a></li>
                <li><a href="custom_design.html">Custom Design</a></li>
                <li><a href="about.html">About Us</a></li>
            </ul>
        </nav>
        <div class="right-container">
            <a href="cart.html" class="cart-icon">
                <img src="Front Page images/cart.png" alt="Cart">
                <span id="cart-count">0</span>
            </a>
            <a href="logout.php" class="logout-link">Log Out</a>
        </div>
    </header>

    <!-- Static Hero Image Section -->
    <section class="hero-image">
        <img src="collection.jpeg" alt="Hero Image" class="static-hero">
    </section>

    <!-- New Arrivals Section -->
    <section class="new-arrivals">
        <h2>New Arrivals</h2>
        <div class="product-grid">
            <div class="product">
                <a href="new_arrivals.html">
                    <img src="NewArrivals Category/1.jpg" alt="Product 1">
                </a>
            </div>
            <div class="product">
                <a href="new_arrivals.html">
                    <img src="NewArrivals Category/4.jpg" alt="Product 2">
                </a>
            </div>
            <div class="product">
                <a href="new_arrivals.html">
                    <img src="NewArrivals Category/5.jpg" alt="Product 3">
                </a>
            </div>
            <div class="product">
                <a href="new_arrivals.html">
                    <img src="NewArrivals Category/6.jpg" alt="Product 4">
                </a>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits">
        <div class="benefit">
            <img src="Front Page images/Shipping.jpg" alt="Free Shipping">
            <h3>Free Shipping EU</h3>
            <p>Free shipping on orders over €150</p>
        </div>
        <div class="benefit">
            <img src="Front Page images/Returns.jpg" alt="Easy Returns">
            <h3>Easy Returns</h3>
            <p>Easy and problem-free returns</p>
        </div>
        <div class="benefit">
            <img src="Front Page images/Secure.jpg" alt="Secure Purchase">
            <h3>Secure Purchase</h3>
            <p>Best security features</p>
        </div>
        <div class="benefit">
            <img src="Front Page images/Multiple Payment Method.jpg" alt="Multiple Payment Methods">
            <h3>Multiple Payment Methods</h3>
            <p>Many payment methods available</p>
        </div>
    </section>

    <!-- Collection Grid Section -->
    <section class="collection-grid">
        <div class="grid-item"><img src="Front Page images/1.jpeg" alt="Image 1"></div>
        <div class="grid-item"><img src="Front Page images/2.jpeg" alt="Image 2"></div>
        <div class="grid-item"><img src="Front Page images/3.jpeg" alt="Image 3"></div>
        <div class="grid-item"><img src="Front Page images/4.jpeg" alt="Image 4"></div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <h2>SUBSCRIBE TO OUR NEWSLETTER</h2>
        <p>Stay up to date with news and new arrivals by subscribing to our newsletter.</p>
        <form class="newsletter-form" action="thank_you_sub.html" method="get">
            <input type="email" name="email" placeholder="Your email address" required>
            <button type="submit">Subscribe</button>
        </form>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-column">
            <h3>Support</h3>
            <a href="contact.html">Contact</a>
            <a href="size_guide.html">Size Guide</a>
        </div>
        <div class="footer-column">
            <h3>Shop</h3>
            <a href="jacketscat.html">Jackets</a>
            <a href="bottomcat.html">Bottoms</a>
            <a href="accessoriescat.html">Accessories</a>
            <a href="walletscat.html">Wallets</a>
            <a href="bagscat.html">Bags</a>
        </div>
        <div class="footer-bottom">
            <div class="footer-logo">
                <img src="arkived.png" alt="Footer Logo">
            </div>
            <div class="payment-options">
                <img src="Front Page images/apple pay.png" alt="Apple Pay">
                <img src="Front Page images/paypal.png" alt="Paypal">
                <img src="Front Page images/visa.png" alt="Visa">
            </div>
            <p>&copy; 2024 Your Store. Powered by Shopify</p>
        </div>
    </footer>

    <!-- Link to JavaScript file for cart functionality -->
    <script src="cartHandler.js"></script>
</body>
</html>
