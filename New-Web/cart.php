<?php
session_start();

// Check if form is submitted
if (isset($_POST['add_to_cart'])) {
    if (isset($_POST['product_id']) && is_numeric($_POST['product_id'])) {
        $product_id = (int)$_POST['product_id'];
        echo "Product ID received: " . $product_id . "<br>";

        // Validate if product ID exists in the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user_system";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM products WHERE id = $product_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Product exists, proceed to add to cart
            if (isset($_SESSION['cart'])) {
                // Check if the product is already in the cart
                if (array_key_exists($product_id, $_SESSION['cart'])) {
                    // Increase the quantity if the product is already in the cart
                    $_SESSION['cart'][$product_id]++;
                } else {
                    // Add the product to the cart with quantity 1
                    $_SESSION['cart'][$product_id] = 1;
                }
            } else {
                // Create a new cart and add the product
                $_SESSION['cart'] = array($product_id => 1);
            }

            // Redirect back to the shop page
            header("Location: shop.php");
            exit();
        } else {
            // Invalid product ID
            echo "Invalid product ID";
        }

        // Close connection
        $conn->close();
    } else {
        // Invalid product ID format
        echo "Invalid product ID format";
    }
} else {
    // Invalid form submission
    echo "Invalid form submission";
}
?>
