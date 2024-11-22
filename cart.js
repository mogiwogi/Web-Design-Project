function loadCart() {
    // Retrieve the cart from local storage or initialize an empty array if it doesn't exist
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartContainer = document.querySelector('.cart-container');

    // Clear current items in the container
    cartContainer.innerHTML = '';

    // Check if the cart is empty
    if (cart.length === 0) {
        cartContainer.innerHTML = '<p>Your cart is empty.</p>';
    } else {
        // Loop through each item and display it in the cart
        cart.forEach((item, index) => {
            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item');
            cartItem.innerHTML = `
                <img src="${item.image}" alt="${item.name}" class="cart-item-image">
                <div class="cart-item-details">
                    <h2>${item.name}</h2>
                    <p>Price: MYR${item.price.toFixed(2)}</p>
                    <label for="quantity-${index}">Quantity:</label>
                    <input type="number" id="quantity-${index}" name="quantity" value="${item.quantity}" min="1" onchange="updateQuantity(${index}, this.value)">
                    <button class="remove-item" onclick="removeItem(${index})">Remove</button>
                </div>
            `;
            cartContainer.appendChild(cartItem);
        });
    }

    // Update the cart totals
    updateCartTotal();
}

// Update item quantity in the cart
function updateQuantity(index, quantity) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart[index].quantity = parseInt(quantity);
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartTotal();
}

// Remove item from the cart
function removeItem(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.splice(index, 1); // Remove item at specified index
    localStorage.setItem('cart', JSON.stringify(cart));
    loadCart(); // Refresh cart display
}

// Calculate and display total cost in the order summary
function updateCartTotal() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let subtotal = 0;

    cart.forEach(item => {
        subtotal += item.price * item.quantity;
    });

    const tax = subtotal * 0.1; // Example 10% tax rate
    const total = subtotal + tax;

    document.getElementById('subtotal').textContent = `MYR${subtotal.toFixed(2)}`;
    document.getElementById('tax').textContent = `MYR${tax.toFixed(2)}`;
    document.getElementById('total').textContent = `MYR${total.toFixed(2)}`;
}

// Initialize the cart on page load
document.addEventListener('DOMContentLoaded', loadCart);
