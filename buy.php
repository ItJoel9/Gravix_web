<?php
session_start();

$servername = "localhost";
$username = "root";  // Replace with your MySQL username
$password = "123456"; // Replace with your MySQL password
$dbname = "gravix_db"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Gravix</title>
    <link rel="icon" type="image/png" sizes="32x32" href="logo (2).png">
    <style>
        /* Reset and basic styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: url('assa.JPG') no-repeat center center fixed;
            background-size: cover;
            color: #FFFFFF;
            margin: 0;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* Overlay for dimming background */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: -1;
        }

        /* Header */
        header {
            background: linear-gradient(to right, #000000, #444444);
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
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

        /* Main Content */
        .checkout-content {
            max-width: 800px;
            margin: 100px auto 50px;
            padding: 20px;
            background-color: rgba(34, 34, 34, 0.95);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        .checkout-title {
            font-size: 2.5rem;
            color: #DA0037;
            text-align: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 1.8rem;
            color: #DA0037;
            margin-bottom: 10px;
        }

        .input-field {
            background-color: #333333;
            color: #FFFFFF;
            padding: 10px;
            border: 2px solid #444444;
            border-radius: 8px;
            font-size: 1rem;
            width: 100%;
            margin-bottom: 15px;
        }

        .input-field:focus {
            outline: none;
            border-color: #DA0037;
        }

        .payment-option {
            margin: 20px 0;
        }

        .payment-option label {
            font-size: 1.2rem;
            color: #FFFFFF;
        }

        .payment-details {
            display: none;
            margin-top: 15px;
        }

        .pay-button {
            background-color: #DA0037;
            color: #FFFFFF;
            padding: 15px 20px;
            font-size: 1.2rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 20px;
        }

        .pay-button:hover {
            background-color: #FF4056;
        }
    </style>
</head>
<body>

    <!-- Overlay for dimming the background -->
    <div class="overlay"></div>

    <!-- Header Section -->
    <header>
        <a href="login.php"><img src="logo (2).png" alt="Gravix Logo"></a>
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="cart.php">Cart</a>
        </nav>
    </header>

    <!-- Checkout Content -->
    <section class="checkout-content">
        <h2 class="checkout-title">Checkout</h2>

        <!-- Billing and Shipping Information -->
        <div>
            <h3 class="section-title">Billing Information</h3>
            <input type="text" class="input-field" placeholder="Full Name" id="fullName">
            <input type="text" class="input-field" placeholder="Email" id="email">
            <input type="text" class="input-field" placeholder="Phone Number" id="phone">
            <input type="text" class="input-field" placeholder="Street Address" id="address">
            <input type="text" class="input-field" placeholder="City" id="city">
            <input type="text" class="input-field" placeholder="State" id="state">
            <input type="text" class="input-field" placeholder="Postal Code" id="postalCode">
        </div>

        <!-- Payment Methods Section -->
        <div>
            <h3 class="section-title">Payment Method</h3>

            <!-- Payment Options -->
            <div class="payment-option">
                <label><input type="radio" name="payment" value="credit-card" onclick="showPaymentDetails('credit-card-details')"> Credit Card</label>
            </div>
            <div class="payment-details" id="credit-card-details">
                <input type="text" class="input-field" placeholder="Card Number" maxlength="16">
                <input type="text" class="input-field" placeholder="Cardholder Name">
                <div style="display: flex; gap: 10px;">
                    <input type="text" class="input-field" placeholder="Expiry Date (MM/YY)" maxlength="5">
                    <input type="text" class="input-field" placeholder="CVV" maxlength="3">
                </div>
            </div>

            <div class="payment-option">
                <label><input type="radio" name="payment" value="upi" onclick="showPaymentDetails('upi-details')"> UPI</label>
            </div>
            <div class="payment-details" id="upi-details">
                <input type="text" class="input-field" placeholder="Enter UPI ID">
            </div>

            <div class="payment-option">
                <label><input type="radio" name="payment" value="net-banking" onclick="showPaymentDetails('net-banking-details')"> Net Banking</label>
            </div>
            <div class="payment-details" id="net-banking-details">
                <select class="input-field">
                    <option>Select Your Bank</option>
                    <option>Bank of America</option>
                    <option>Chase</option>
                    <option>Wells Fargo</option>
                    <option>HSBC</option>
                </select>
            </div>

            <div class="payment-option">
                <label><input type="radio" name="payment" value="cash" onclick="showPaymentDetails('')"> Cash on Delivery</label>
            </div>
        </div>

        <!-- Pay Button -->
        <button class="pay-button" onclick="confirmPayment()">Confirm and Pay</button>
    </section>

    <!-- JavaScript for Showing Payment Details and Confirming Payment -->
    <script>
        function showPaymentDetails(detailsId) {
            document.querySelectorAll('.payment-details').forEach(element => {
                element.style.display = 'none';
            });
            if (detailsId) {
                document.getElementById(detailsId).style.display = 'block';
            }
        }

        function confirmPayment() {
            window.location.href = "Payment conformed.php";
        }
    </script>

</body>
</html>
