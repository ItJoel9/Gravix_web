<?php
session_start();

// Database connection
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = '123456'; // Replace with your MySQL root password
$dbname = 'gravix_db';

// Create a connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userId, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            // Password is correct, start a session
            $_SESSION['user_id'] = $userId;
            
            // Redirect to index.php after successful login
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Invalid username.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gravix</title>
    <link rel="icon" type="image/png" sizes="32x32" href="logo (2).png">
    <style>
        /* CSS styling */
        body {
            font-family: 'Roboto', sans-serif;
            background: url('assa.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #FFFFFF;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            position: relative;
        }

        /* Dark overlay */
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

        .login-container {
            background-color: rgba(34, 34, 34, 0.85);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
            max-width: 400px;
            width: 100%;
            z-index: 2;
            position: relative;
        }

        .login-container h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .login-container form {
            display: flex;
            flex-direction: column;
        }

        .login-container label {
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .login-container input {
            padding: 10px;
            font-size: 1rem;
            margin-bottom: 15px;
            border: 1px solid #444;
            border-radius: 5px;
            background-color: #333;
            color: #FFFFFF;
        }

        .login-container input:focus {
            border-color: #DA0037;
            outline: none;
        }

        .login-button {
            padding: 15px;
            background-color: #DA0037;
            color: #FFFFFF;
            font-size: 1.2rem;
            border-radius: 8px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        .login-button:hover {
            background-color: #FF4056;
            transform: translateY(-3px);
        }

        .login-footer {
            margin-top: 20px;
            text-align: center;
        }

        .login-footer a {
            color: #DA0037;
            text-decoration: none;
            font-size: 1rem;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #FF4056;
            font-size: 1rem;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>
        
        <!-- Display error message if there's an issue -->
        <?php if (isset($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit" class="login-button">Login</button>
        </form>
        
        <div class="login-footer">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>

</body>
</html>
