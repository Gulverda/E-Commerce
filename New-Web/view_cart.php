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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <script src="https://kit.fontawesome.com/ec1c03a947.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Rubik:wght@300&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts.js" defer></script>
    <script src="nav.js" defer></script>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}


</style>
<body>
<div class="cart-container">
    <h2>Your Shopping Cart</h2>
    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $total_price = 0;
        foreach ($_SESSION['cart'] as $id => $quantity) {
            // Fetch product details from the database
            $sql = "SELECT * FROM products WHERE id = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $product_name = $row['name'];
            $product_price = $row['price'];
            $product_image = $row['image_url'];
            $product_total = $product_price * $quantity;
            $total_price += $product_total;

            echo '<div class="cart-item">';
            echo '<img src="' . htmlspecialchars($product_image) . '" alt="' . htmlspecialchars($product_name) . '">';
            echo '<div class="cart-item-details">';
            echo '<p>' . htmlspecialchars($product_name) . '</p>';
            echo '<p>Quantity: ' . $quantity . '</p>';
            echo '<p>Price: $' . htmlspecialchars($product_price) . '</p>';
            echo '<p>Total: $' . htmlspecialchars($product_total) . '</p>';
            echo '</div>';
            echo '<div class="cart-actions">';
            echo '<button class="remove-from-cart" data-product-id="' . htmlspecialchars($id) . '">Remove</button>';
            echo '</div>';
            echo '</div>';
        }
        echo '<h3>Total Price: $' . htmlspecialchars($total_price) . '</h3>';
        
        // Add the Buy button
        echo '<form method="post" action="buy.php">';
        echo '<input type="submit" name="buy" value="Buy">';
        echo '</form>';
    } else {
        echo '<p>Your cart is empty.</p>';
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(".remove-from-cart").click(function() {
        var productId = $(this).data("product-id");
        var cartItem = $(this).closest(".cart-item");

        // Send an AJAX request to remove the item from the session cart
        $.ajax({
            type: "POST",
            url: "remove_from_cart.php",
            data: { product_id: productId },
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    cartItem.remove();
                    $("#cart-count").text(response.cart_count);
                } else {
                    console.error("Failed to remove item from cart:", response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error removing item from cart:", error);
            }
        });
    });
});
</script>
</body>
</html>

<?php
$conn->close();
?>
