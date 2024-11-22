function addToCart(productName, price, imagePath) {
    // Retrieve the current cart from local storage or initialize an empty array if it doesn't exist
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Check if the item already exists in the cart
    let existingItem = cart.find(item => item.name === productName);

    if (existingItem) {
        // If the item exists, increase its quantity
        existingItem.quantity += 1;
    } else {
        // If the item doesn't exist, add it to the cart with the image path
        cart.push({ name: productName, price: price, quantity: 1, image: imagePath });
    }

    // Save the updated cart back to local storage
    localStorage.setItem('cart', JSON.stringify(cart));

    // Update the cart count display in the header
    updateCartCountDisplay();
}

function updateCartCountDisplay() {
    // Retrieve the cart from local storage and calculate the total quantity
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartCount = cart.reduce((total, item) => total + item.quantity, 0);

    // Display the total quantity in the cart count element
    document.getElementById('cart-count').innerText = cartCount;
}

// Initialize cart count display on page load
document.addEventListener('DOMContentLoaded', updateCartCountDisplay);
