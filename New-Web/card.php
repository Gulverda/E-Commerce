<?php
// Start session
// Database connection
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

// SQL query to fetch product details
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Check if there are any products
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Echo or display the product card HTML dynamically
        echo '<div class="col-4">';
        echo '<a href="shop.php?id=' . $row["id"] . '">';
        echo '<img src="' . $row["image_url"] . '" style="width: 200px; height: 200px; background-size: cover;
    object-fit: contain;">'; // Adjust width and height as needed
        echo '<h4>' . $row["name"] . '</h4>';
        // Output the rating dynamically (you can fetch it from the database if available)
        echo '<div class="rating">';
        echo '<i class="fa fa-star"></i>';
        echo '<i class="fa fa-star"></i>';
        echo '<i class="fa fa-star"></i>';
        echo '<i class="fa fa-star"></i>';
        echo '<i class="fa fa-star-half-o"></i>';
        echo '</div>';
        echo '<p>$' . $row["price"] . '</p>';
        echo '</a>';
        echo '<form method="post" action="add_to_cart.php">';
        echo '<input type="hidden" name="product_id" value="' . $row["id"] . '">';
        echo '<button type="submit" name="add_to_cart" value="Add to Cart"><i class="fa fa-shopping-cart"></i></button>';
        echo '</form>';
        echo '</div>';
    }
} else {
    echo "No products found";
}

// Check if the form is submitted
if(isset($_POST['add_to_cart'])) {
    // Process form submission
    // Assuming you have added the product to the cart or performed necessary operations here

    // Redirect back to index.php after form submission
    header("Location: index.php");
    exit(); // Make sure to exit after redirection
}

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Style for each product card container */


    </style>
</head>
<body>
<a href="detailed_search.php">Go to Detailed Search</a>
</body>
</html>