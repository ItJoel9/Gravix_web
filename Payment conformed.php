<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation - Gravix</title>
    <link rel="icon" type="image/png" sizes="32x32" href="logo (2).png">
    <style>
        /* Reset and basic styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            color: #FFFFFF;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            background: url('assa.JPG') no-repeat center center fixed;
            background-size: cover;
            position: relative;
        }

        /* Dimmed overlay */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        /* Confetti animation */
        @keyframes confettiFall {
            0% { transform: translateY(-100vh) rotate(0deg); opacity: 1; }
            100% { transform: translateY(100vh) rotate(360deg); opacity: 0; }
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #DA0037;
            animation: confettiFall linear infinite;
            z-index: 2;
        }

        .confetti:nth-child(odd) {
            background-color: #FFFFFF;
        }

        /* Fade-in Animation */
        @keyframes fadeIn {
            0% { opacity: 0; transform: scale(0.9); }
            100% { opacity: 1; transform: scale(1); }
        }

        /* Pulse Animation */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        /* Header styling for consistency */
        header {
            background: linear-gradient(to right, #000000, #444444);
            padding: 15px 40px;
            display: flex;
            align-items: center;
            width: 100%;
            position: absolute;
            top: 0;
            z-index: 3;
        }

        header a img {
            max-width: 50px;
            height: auto;
            margin-right: auto;
        }

        .confirmation-container {
            text-align: center;
            padding: 20px;
            background-color: rgba(34, 34, 34, 0.9);
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 3;
            animation: fadeIn 1s ease-in-out;
        }

        .confirmation-container h2 {
            color: #DA0037;
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .confirmation-container p {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .game-title {
            font-weight: bold;
            color: #DA0037;
        }

        .button-container {
            margin-top: 20px;
        }

        .return-button {
            padding: 10px 20px;
            background-color: #DA0037;
            color: #FFFFFF;
            border: 2px solid #DA0037;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            animation: pulse 2s infinite;
        }

        .return-button:hover {
            background-color: #FF4056;
            color: #FFFFFF;
        }
    </style>
</head>
<body>

    <!-- Header for consistent styling -->
    <header>
        <a href="login.php"><img src="logo (2).png" alt="Gravix Logo"></a>
    </header>

    <!-- Confirmation Message -->
    <div class="confirmation-container">
        <h2>Payment Successful!</h2>
        <p>Thank you for your purchase!</p>
        <p>Your game has been successfully purchased.</p>
        <div class="button-container">
            <a href="index.php" class="return-button">Return to Home</a>
        </div>
    </div>

    <!-- Confetti animation -->
    <script>
        function createConfetti() {
            const confettiContainer = document.body;
            for (let i = 0; i < 100; i++) {
                const confetti = document.createElement('div');
                confetti.classList.add('confetti');
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.animationDuration = Math.random() * 3 + 2 + 's';
                confetti.style.opacity = Math.random();
                confettiContainer.appendChild(confetti);
                
                // Remove confetti after animation
                confetti.addEventListener('animationend', () => {
                    confetti.remove();
                });
            }
        }

        // Start confetti animation
        createConfetti();
    </script>

</body>
</html>
