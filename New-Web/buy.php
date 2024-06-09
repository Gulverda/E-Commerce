<?php
session_start();
include 'nav.php';

// Database connection
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "user_system";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is signed in
if (isset($_SESSION['username'])) {
    // If signed in, get the logged-in user's ID
    $username = $_SESSION['username'];
    $sql = "SELECT id FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];
    } else {
        echo "User not found";
        exit;
    }

    // Insert purchase information into the database when the buy button is clicked
    if (isset($_POST['buy'])) {
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $product_id => $quantity) {
                // Fetch product details to get the current price
                $sql = "SELECT price FROM products WHERE id = $product_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $product = $result->fetch_assoc();
                    $price = $product['price'];
                    $total_price = $price * $quantity;

                    $sql = "INSERT INTO purchases (user_id, product_id, quantity, total_price, purchase_date) 
                            VALUES ('$user_id', '$product_id', '$quantity', '$total_price', NOW())";

                    if ($conn->query($sql) === TRUE) {
                        echo "Purchase recorded successfully for product ID: $product_id<br>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            }
            // Clear the cart after purchase
            unset($_SESSION['cart']);
            echo "All items purchased successfully.";
        } else {
            echo "Your cart is empty.";
        }
    }
} else {
    echo "Please log in to proceed with the purchase.";
}

$conn->close();
?>


<style>
    .header{
        margin-top: 20%;
    }
</style>