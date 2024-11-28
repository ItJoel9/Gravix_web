<?php
session_start();
include('db_connection.php'); // Include your database connection file

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    $userId = $_SESSION['user_id']; // Assume user ID is stored in the session

    // Check if the item already exists in the cart
    $stmt = $conn->prepare("SELECT id, quantity FROM cart WHERE product_name = ? AND user_id = ?");
    $stmt->bind_param("si", $productName, $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();

    if ($item) {
        // If item exists, update the quantity
        $newQuantity = $item['quantity'] + $quantity;
        $updateStmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
        $updateStmt->bind_param("ii", $newQuantity, $item['id']);
        $updateStmt->execute();
    } else {
        // If item does not exist, insert a new row
        $insertStmt = $conn->prepare("INSERT INTO cart (user_id, product_name, product_price, quantity) VALUES (?, ?, ?, ?)");
        $insertStmt->bind_param("isdi", $userId, $productName, $productPrice, $quantity);
        $insertStmt->execute();
    }

    header("Location: cart.php"); // Redirect to the cart page
    exit();
}
?>
