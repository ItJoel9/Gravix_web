<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Gravix</title>
    <link rel="icon" type="image/png" sizes="32x32" href="logo (2).png">
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Use flexbox to keep footer at the bottom */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #171717;
            color: #FFFFFF;
            margin: 0;
            min-height: 100vh;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        header {
            background: linear-gradient(to right, #000000, #444444);
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        header a img {
            max-width: 50px;
            height: auto;
        }

        /* Main Content */
        .main-content {
            flex: 1; /* This will push the footer to the bottom */
            padding: 40px 20px;
            background-color: #000000;
            max-width: 1200px;
            margin: auto;
        }

        .main-content h1 {
            font-size: 3rem;
            color: #DA0037;
            margin-bottom: 20px;
        }

        .main-content p {
            font-size: 1.2rem;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        /* Home Button */
        .home-button {
            display: block;
            width: fit-content;
            margin: 20px auto;
            padding: 15px 30px;
            background-color: #DA0037;
            color: #FFFFFF;
            text-decoration: none;
            font-size: 1.2rem;
            border-radius: 8px;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        .home-button:hover {
            background-color: #FF4056;
            transform: translateY(-3px);
        }

        /* Footer */
        footer {
            background-color: #222222;
            padding: 40px 0;
            text-align: center;
        }

        footer p {
            color: #999999;
            font-size: 1rem;
            letter-spacing: 0.05em;
        }

        footer p a {
            color: #DA0037;
            text-decoration: none;
        }

        footer p a:hover {
            text-decoration: underline;
        }

        footer p.copy {
            margin-top: 10px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <a href="index.php"><img src="logo (2).png" alt="Gravix Logo"></a>
    </header>

    <!-- Main Content -->
    <section class="main-content">
        <h1>About Gravix</h1>
        <p>
            Welcome to Gravix, your ultimate destination for the latest and greatest in gaming. At Gravix, we are passionate about bringing you the most exciting and engaging games across all genres. Our team is dedicated to curating a selection of top titles that cater to every type of gamer, from action-packed adventures to immersive role-playing experiences.
        </p>
        <p>
            Our mission is to provide an unparalleled gaming experience by offering high-quality games, insightful reviews, and exceptional customer service. We strive to stay at the forefront of the gaming industry, ensuring that our offerings are always up-to-date with the latest trends and innovations.
        </p>

        <!-- Home Button -->
        <a href="index.php" class="home-button">Back to Home</a>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>Stay connected with us on social media for updates and more!</p>
        <p class="copy">&copy; 2024 <a href="#">Gravix</a>. All rights reserved.</p>
    </footer>

</body>
</html>
