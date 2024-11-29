// Update cart count on page load
document.addEventListener('DOMContentLoaded', updateCartCount);

// Function to add an item to the cart
function addToCart(itemName, itemPrice) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let existingItem = cart.find(item => item.name === itemName);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ name: itemName, price: itemPrice, quantity: 1 });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
    alert(`${itemName} has been added to your cart.`);
}

// Function to update the cart count display
function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartCount = cart.reduce((total, item) => total + item.quantity, 0);
    const cartCountElement = document.getElementById('cartCount');

    if (cartCountElement) {
        cartCountElement.textContent = cartCount;
    }
}

// Function to remove an item from the cart
function removeFromCart(itemName) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart = cart.filter(item => item.name !== itemName);

    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
}

// Function to clear the cart (for checkout or other purposes)
function clearCart() {
    localStorage.removeItem('cart');
    updateCartCount();
}
