<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// MySQL connection details
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = "123456"; // Replace with your MySQL password
$dbname = "gravix_db"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Gravix</title>
    <link rel="icon" type="image/png" sizes="32x32" href="logo (2).png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            color: #FFFFFF;
            margin: 0;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: url('assa.JPG') no-repeat center center fixed;
            background-size: cover;
        }

        /* Dimmed overlay */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }

        /* Header */
        header {
            background: linear-gradient(to right, #000000, #444444);
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 2;
            width: 100%;
        }

        header a img {
            max-width: 50px;
            height: auto;
        }

        nav {
            display: flex;
            gap: 20px;
        }

        nav a {
            color: #FFFFFF;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #DA0037;
        }

        .header-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .cart-button {
            background-color: #444444;
            color: #FFFFFF;
            padding: 10px 15px;
            border: 2px solid #DA0037;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
        }

        .cart-button:hover {
            background-color: #555555;
            color: #DA0037;
        }

        .cart-count {
            background-color: #DA0037;
            color: #FFFFFF;
            border-radius: 50%;
            font-size: 0.8rem;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Cart Content */
        .cart-content {
            width: 90%;
            max-width: 1200px;
            margin: 70px auto;
            padding: 40px;
            background-color: rgba(34, 34, 34, 0.9);
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 2;
        }

        .cart-title {
            font-size: 2.5rem;
            color: #DA0037;
            text-align: center;
            margin-bottom: 20px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #444444;
            transition: transform 0.2s;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item:hover {
            transform: scale(1.02);
        }

        .cart-item img {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            margin-right: 20px;
            transition: transform 0.3s ease;
        }

        .cart-item img:hover {
            transform: scale(1.1);
        }

        .item-details {
            flex: 2;
            margin-left: 15px;
        }

        .item-details h3 {
            font-size: 1.2rem;
            color: #FFFFFF;
            margin-bottom: 5px;
        }

        .item-details p {
            font-size: 1rem;
            color: #999999;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-right: 20px;
        }

        .quantity-controls button {
            background-color: #DA0037;
            color: #FFFFFF;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease, box-shadow 0.2s;
        }

        .quantity-controls button:hover {
            background-color: #FF4056;
            box-shadow: 0px 4px 8px rgba(255, 64, 86, 0.2);
        }

        .item-price {
            font-size: 1.2rem;
            color: #FFFFFF;
            margin-right: 20px;
        }

        .remove-button {
            background-color: #DA0037;
            color: #FFFFFF;
            border: none;
            border-radius: 5px;
            padding: 5px 15px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }

        .remove-button:hover {
            background-color: #FF4056;
        }

        .cart-summary {
            text-align: right;
            margin-top: 20px;
            font-size: 1.5rem;
        }

        .total-box {
            padding: 10px;
            background-color: #333333;
            border-radius: 8px;
            margin-top: 10px;
        }

        .checkout-button {
            background-color: #DA0037;
            color: #FFFFFF;
            padding: 10px 20px;
            font-size: 1.2rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .checkout-button:hover {
            background-color: #FF4056;
        }

        /* Empty Cart Message */
        .empty-cart {
            text-align: center;
            font-size: 1.2rem;
            color: #999999;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <a href="index.php"><img src="logo (2).png" alt="Gravix Logo"></a>
        
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
        </nav>

        <!-- Header actions with Cart button -->
        <div class="header-actions">
            <a href="cart.php" class="cart-button">
                Cart
                <span class="cart-count" id="cartCount">0</span>
            </a>
        </div>
    </header>

    <!-- Cart Content -->
    <section class="cart-content">
        <h2 class="cart-title">Your Cart</h2>

        <div id="cartItems"></div>

        <div class="cart-summary">
            <div class="total-box">
                <p>Total: $<span id="totalPrice">0.00</span></p>
            </div>
            <button class="checkout-button" onclick="goToCheckout()">Checkout</button>
        </div>
    </section>

    <!-- JavaScript for Cart Operations -->
    <script>
        function goToCheckout() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            localStorage.setItem('cartForCheckout', JSON.stringify(cart));
            window.location.href = "buy.php";
        }

        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartCount = cart.reduce((total, item) => total + item.quantity, 0);
            document.getElementById('cartCount').textContent = cartCount;
        }

        function renderCartItems() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartItemsContainer = document.getElementById('cartItems');
            cartItemsContainer.innerHTML = '';
            let totalPrice = 0;

            if (cart.length === 0) {
                cartItemsContainer.innerHTML = '<p class="empty-cart">Your cart is empty.</p>';
                document.getElementById('totalPrice').textContent = '0.00';
                return;
            }

            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                totalPrice += itemTotal;

                let imageSrc = '';
                switch (item.name) {
                    case "Marvel's Spider-Man": imageSrc = 'L spider.PNG'; break;
                    case 'God of War: Ragnarok': imageSrc = 'L godw.JPG'; break;
                    default: imageSrc = 'default-image.jpg'; break;
                }

                const cartItem = document.createElement('div');
                cartItem.classList.add('cart-item');
                cartItem.innerHTML = `
                    <img src="${imageSrc}" alt="${item.name}">
                    <div class="item-details">
                        <h3>${item.name}</h3>
                        <p>$${item.price.toFixed(2)}</p>
                    </div>
                    <div class="quantity-controls">
                        <button onclick="decreaseQuantity(${index})">-</button>
                        <span>${item.quantity}</span>
                        <button onclick="increaseQuantity(${index})">+</button>
                    </div>
                    <div class="item-price">$${itemTotal.toFixed(2)}</div>
                    <button class="remove-button" onclick="removeItem(${index})">Remove</button>
                `;
                cartItemsContainer.appendChild(cartItem);
            });

            document.getElementById('totalPrice').textContent = totalPrice.toFixed(2);
        }

        function increaseQuantity(index) {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart[index].quantity += 1;
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCartItems();
            updateCartCount();
        }

        function decreaseQuantity(index) {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            if (cart[index].quantity > 1) {
                cart[index].quantity -= 1;
            } else {
                cart.splice(index, 1);
            }
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCartItems();
            updateCartCount();
        }

        function removeItem(index) {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCartItems();
            updateCartCount();
        }

        window.onload = function() {
            updateCartCount();
            renderCartItems();
        };
    </script>

</body>
</html>
