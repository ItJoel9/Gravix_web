<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// MySQL connection details
$servername = "localhost";
$username = "root";  // Replace with your MySQL username
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
    <title>Gravix - Game Store</title>
    <link rel="icon" type="image/png" sizes="32x32" href="logo (2).png">
    <style>
        /* Base and Reset Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #171717;
            color: #FFFFFF;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Header Styles */
        header {
            background: linear-gradient(to right, #000000, #444444);
            padding: 15px 40px;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        header a img {
            max-width: 50px;
        }

        nav {
            display: flex;
            gap: 20px;
            margin-left: auto;
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
            margin-left: 20px;
        }

        .filter-button, .cart-button {
            background-color: #444444;
            color: #FFFFFF;
            padding: 10px 15px;
            border: 2px solid #DA0037;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .filter-button:hover, .cart-button:hover {
            background-color: #555555;
            color: #DA0037;
        }

        .cart-button {
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
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

        /* Filter Panel */
        .filter-panel {
            display: none;
            position: absolute;
            top: 70px;
            right: 40px;
            background: linear-gradient(45deg, #333333, #222222);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            z-index: 10;
        }

        .filter-panel label {
            font-size: 1rem;
            color: #DA0037;
            margin-right: 10px;
        }

        .filter-panel select {
            padding: 5px 10px;
            background-color: #444444;
            color: #FFFFFF;
            border: 2px solid #DA0037;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .filter-panel select:hover {
            background-color: #555555;
            border-color: #FFFFFF;
        }

        .filter-panel select:focus {
            outline: none;
            border-color: #DA0037;
            box-shadow: 0 0 8px rgba(218, 0, 55, 0.6);
        }

        /* Banner Section */
        .main-banner {
            position: relative;
            height: 500px;
            overflow: hidden;
            display: flex;
            align-items: flex-end;
            justify-content: left;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }

        .main-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            transition: opacity 1s ease-in-out;
        }

        .main-banner img.hidden {
            opacity: 0;
        }

        /* Welcome message section */
        .welcome-section {
            padding: 30px;
            text-align: center;
            background-color: #222222;
            margin-bottom: 20px;
            color: #F1F1F1;
        }

        .welcome-section h3 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #DA0037;
        }

        .welcome-section p {
            font-size: 1.2rem;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Game Cards Container */
        .game-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 40px;
            background-color: #AA2222;
        }

        /* Game Card */
        .game-card {
            flex: 1 1 calc(25% - 20px);
            max-width: 250px;
            background-color: #444444;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .game-card img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
        }

        .game-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        /* Footer */
        footer {
            background-color: #222222;
            padding: 40px 20px;
            text-align: center;
            margin-top: 40px;
        }

        footer p {
            color: #999999;
            font-size: 1rem;
        }

        footer p a {
            color: #DA0037;
            text-decoration: none;
        }

        footer img.logo {
            width: 60px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Header Section with Filter and Cart -->
    <header>
        <a href="index.php"><img src="logo (2).png" alt="Gravix Logo"></a>
        
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
        </nav>

        <div class="header-actions">
            <button class="filter-button" onclick="toggleFilterPanel()">Filter</button>
            <a href="cart.php" class="cart-button">
                Cart <span class="cart-count" id="cartCount">0</span>
            </a>
        </div>

        <!-- Dropdown Filter Panel -->
        <div class="filter-panel" id="filterPanel">
            <label for="genre">Genre:</label>
            <select id="genre" onchange="filterGames()">
                <option value="all">All</option>
                <option value="action">Action</option>
                <option value="adventure">Adventure</option>
                <option value="rpg">RPG</option>
            </select>

            <label for="platform">Platform:</label>
            <select id="platform" onchange="filterGames()">
                <option value="all">All</option>
                <option value="pc">PC</option>
                <option value="playstation">PlayStation</option>
                <option value="xbox">Xbox</option>
            </select>
        </div>
    </header>

    <!-- Banner Section -->
    <section class="main-banner">
        <img src="ghost-of-tsushima.jpg" alt="Ghost of Tsushima" class="slide">
        <img src="eldenb.jpeg" alt="Elden Ring" class="slide hidden">
        <img src="sp1.jpg" alt="Spider Man" class="slide hidden">
        <img src="gow1.jpg" alt="God of War Ragnarok" class="slide hidden">
        <img src="lou.jpg" alt="The Last of Us" class="slide hidden">
        <img src="rdr22.jpg" alt="Red Dead Redemption 2" class="slide hidden">
    </section>

    <!-- Welcome Section -->
    <section class="welcome-section">
        <h3>Welcome to Gravix</h3>
        <p>Discover the latest and greatest games at Gravix! We are passionate about bringing you the best gaming experiences, from epic adventures to thrilling action. Dive into our collection of handpicked games and enjoy exploring new worlds!</p>
    </section>

    <!-- Game Cards Section -->
    <section class="game-cards">
        <a href="gow.php" class="game-card" data-genre="action" data-platform="playstation"><img src="gow.jpg" alt="God of War Ragnarok"></a>
        <a href="spider.php" class="game-card" data-genre="action" data-platform="playstation"><img src="spider man.jpg" alt="Marvel Spider-Man"></a>
        <a href="last.php" class="game-card" data-genre="adventure" data-platform="playstation"><img src="last of us.jpg" alt="The Last of Us"></a>
        <a href="ghost.php" class="game-card" data-genre="adventure" data-platform="playstation"><img src="ghost-of-tsushima.jpg" alt="Ghost of Tsushima"></a>
        <a href="rdr2.php" class="game-card" data-genre="action" data-platform="xbox"><img src="red-dead-redemption-2.jpg" alt="Red Dead Redemption 2"></a>
        <a href="elden.php" class="game-card" data-genre="rpg" data-platform="pc"><img src="elden ring.jpg" alt="Elden Ring"></a>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>Stay connected with us on social media for updates and more!</p>
        <img src="logo (2).png" alt="Gravix Logo" class="logo">
        <p>&copy; 2024 <a href="#">Gravix</a>. All rights reserved.</p>
    </footer>

    <!-- JavaScript for Filter Toggle, Slideshow, and Cart Count -->
    <script>
        function toggleFilterPanel() {
            const filterPanel = document.getElementById('filterPanel');
            filterPanel.style.display = filterPanel.style.display === 'block' ? 'none' : 'block';
        }

        // Slideshow JavaScript
        let currentIndex = 0;
        const slides = document.querySelectorAll('.main-banner .slide');
        const totalSlides = slides.length;

        function showNextSlide() {
            slides[currentIndex].classList.add('hidden');
            currentIndex = (currentIndex + 1) % totalSlides;
            slides[currentIndex].classList.remove('hidden');
        }
        setInterval(showNextSlide, 5000);

        // Filtering JavaScript
        const gameCards = document.querySelectorAll('.game-card');

        function filterGames() {
            const genre = document.getElementById('genre').value;
            const platform = document.getElementById('platform').value;

            gameCards.forEach(card => {
                const gameGenre = card.getAttribute('data-genre');
                const gamePlatform = card.getAttribute('data-platform');

                if ((genre === 'all' || genre === gameGenre) &&
                    (platform === 'all' || platform === gamePlatform)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Update Cart Count
        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartCount = cart.reduce((total, item) => total + item.quantity, 0);
            document.getElementById('cartCount').textContent = cartCount;
        }

        // Initialize Cart Count on page load
        window.onload = updateCartCount;
    </script>

</body>
</html>
