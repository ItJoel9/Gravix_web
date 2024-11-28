<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Last of Us - Gravix</title>
    <link rel="icon" type="image/png" sizes="32x32" href="logo (2).png">
    <style>
        /* General styling */
        body {
            font-family: 'Roboto', sans-serif;
            background: url('lou.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #FFFFFF;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
            position: relative;
        }

        /* Dark overlay for readability */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }

        /* Header styling */
        header {
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background: linear-gradient(to right, #000000, #444444);
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
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

        /* Content styling */
        .content-wrapper {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            width: 100%;
            z-index: 2;
            margin-top: 80px;
        }

        .game-details {
            width: 55%;
            background-color: rgba(34, 34, 34, 0.85);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        }

        .game-details h2 {
            font-size: 2.8rem;
            margin-bottom: 20px;
        }

        .game-details p {
            font-size: 1.2rem;
            line-height: 1.7;
            margin-bottom: 20px;
            text-align: justify;
        }

        .price {
            font-size: 2rem;
            color: #DA0037;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .buy-button, .add-to-cart-button {
            display: inline-block;
            margin-top: 20px;
            padding: 15px 30px;
            background-color: #DA0037;
            color: #FFFFFF;
            text-decoration: none;
            font-size: 1.2rem;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s;
            cursor: pointer;
            margin-right: 10px;
        }

        .buy-button:hover, .add-to-cart-button:hover {
            background-color: #FF4056;
            transform: translateY(-3px);
        }

        .features {
            text-align: left;
            margin-bottom: 20px;
        }

        .features ul {
            list-style-type: square;
            padding-left: 20px;
        }

        .features ul li {
            margin-bottom: 10px;
        }

        /* Trailer Section */
        .trailer-section {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }

        .trailer-section iframe {
            width: 100%;
            height: 315px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        /* Rating Summary */
        .rating-summary {
            background-color: #222222;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            color: #FFFFFF;
        }

        .average-rating {
            display: flex;
            align-items: center;
            font-size: 2.5rem;
            font-weight: bold;
        }

        .star-rating {
            color: gold;
            margin-left: 10px;
        }

        .rating-bars {
            margin-top: 20px;
        }

        .rating-bar {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .rating-bar div {
            width: 20%;
            font-size: 1rem;
        }

        .bar {
            flex-grow: 1;
            height: 10px;
            background-color: #444444;
            margin: 0 10px;
            position: relative;
            border-radius: 5px;
        }

        .bar-fill {
            height: 100%;
            background-color: gold;
            border-radius: 5px;
        }

        /* Review Submission */
        .review-section {
            margin-top: 20px;
        }

        /* Side Image */
        .fade-image {
            width: 40%;
            position: relative;
        }

        .fade-image img {
            width: 100%;
            border-radius: 15px;
            object-fit: cover;
        }

        .fade-image::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.7));
            z-index: 2;
            border-radius: 15px;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .content-wrapper {
                flex-direction: column;
                align-items: center;
            }

            .game-details {
                width: 100%;
            }

            .fade-image {
                width: 100%;
                margin-top: 20px;
            }
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
            <a href="cart.php">Cart</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="content-wrapper">
        <!-- Game Details Section -->
        <div class="game-details">
            <h2>The Last of Us</h2>

            <!-- Gameplay Trailer Section -->
            <div class="trailer-section">
                <h3>Watch the Gameplay Trailer of The Last of Us</h3>
                <iframe src="https://www.youtube.com/embed/ygVPHxkokAE" title="The Last of Us Gameplay Trailer" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <p>
                Experience a post-apocalyptic world in "The Last of Us," a gripping action-adventure game that follows the journey of Joel and Ellie as they navigate a world ravaged by a fungal infection. Engage in intense combat, solve challenging puzzles, and forge deep emotional connections.
            </p>
            <div class="price">$39.99</div>

            <!-- Additional Game Features -->
            <div class="features">
                <h3>Game Features:</h3>
                <ul>
                    <li>Emotionally-driven narrative and character development</li>
                    <li>Intense and realistic combat scenarios</li>
                    <li>Beautifully crafted post-apocalyptic environments</li>
                    <li>Engaging stealth and exploration mechanics</li>
                    <li>Compelling story with unexpected twists</li>
                </ul>
            </div>

            <!-- Add to Cart and Buy Now Buttons -->
            <button class="add-to-cart-button" onclick="addToCart('The Last of Us', 39.99)">Add to Cart</button>
            <a href="buy.php" class="buy-button">Buy Now</a>

            <!-- Rating Summary Section -->
            <div class="rating-summary">
                <div class="average-rating">
                    <span id="averageRating">0.0</span>
                    <span class="star-rating">★★★★★</span>
                    <span id="totalRatings">0 ratings</span>
                </div>
                
                <!-- Rating Bars -->
                <div class="rating-bars">
                    <div class="rating-bar">
                        <div>5</div>
                        <div class="bar"><div class="bar-fill" id="bar5"></div></div>
                        <div id="count5">0</div>
                    </div>
                    <div class="rating-bar">
                        <div>4</div>
                        <div class="bar"><div class="bar-fill" id="bar4"></div></div>
                        <div id="count4">0</div>
                    </div>
                    <div class="rating-bar">
                        <div>3</div>
                        <div class="bar"><div class="bar-fill" id="bar3"></div></div>
                        <div id="count3">0</div>
                    </div>
                    <div class="rating-bar">
                        <div>2</div>
                        <div class="bar"><div class="bar-fill" id="bar2"></div></div>
                        <div id="count2">0</div>
                    </div>
                    <div class="rating-bar">
                        <div>1</div>
                        <div class="bar"><div class="bar-fill" id="bar1"></div></div>
                        <div id="count1">0</div>
                    </div>
                </div>
            </div>

            <!-- Add Review Section -->
            <div class="review-section">
                <label for="reviewRating">Rate this game:</label>
                <select id="reviewRating">
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="2">2 Stars</option>
                    <option value="1">1 Star</option>
                </select>
                <button onclick="addReview()">Submit Review</button>
            </div>
        </div>

        <!-- Right-side Image with Vertical Gradient Fade -->
        <div class="fade-image">
            <img src="last of us.jpg" alt="The Last of Us">
        </div>
    </div>

    <script>
        function loadReviews() {
            const reviews = JSON.parse(localStorage.getItem('lastOfUsReviews')) || [];
            const totalRatings = reviews.length;
            const ratingCounts = [0, 0, 0, 0, 0];

            let sum = 0;
            reviews.forEach(rating => {
                sum += rating;
                ratingCounts[rating - 1]++;
            });

            const averageRating = totalRatings ? (sum / totalRatings).toFixed(1) : 0;
            document.getElementById('averageRating').textContent = averageRating;
            document.getElementById('totalRatings').textContent = `${totalRatings} ratings`;

            for (let i = 5; i >= 1; i--) {
                const barFill = document.getElementById(`bar${i}`);
                const countDisplay = document.getElementById(`count${i}`);
                const percentage = totalRatings ? (ratingCounts[i - 1] / totalRatings) * 100 : 0;
                
                barFill.style.width = `${percentage}%`;
                countDisplay.textContent = ratingCounts[i - 1];
            }
        }

        function addReview() {
            const rating = parseInt(document.getElementById('reviewRating').value);
            const reviews = JSON.parse(localStorage.getItem('lastOfUsReviews')) || [];
            reviews.push(rating);
            localStorage.setItem('lastOfUsReviews', JSON.stringify(reviews));
            loadReviews();
            alert('Thank you for your review!');
        }

        function addToCart(itemName, itemPrice) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let existingItem = cart.find(item => item.name === itemName);
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({ name: itemName, price: itemPrice, quantity: 1 });
            }
            localStorage.setItem('cart', JSON.stringify(cart));
            alert(`${itemName} has been added to your cart.`);
        }

        window.onload = loadReviews;
    </script>

</body>
</html>
