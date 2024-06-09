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

// Initialize filter variables
$filter_name = '';
$filter_price = '';
$sort_by = '';

// Check if the filter form is submitted
if (isset($_GET['filter'])) {
    if (!empty($_GET['name'])) {
        $filter_name = $_GET['name'];
    }
    if (!empty($_GET['price'])) {
        $filter_price = $_GET['price'];
    }
    if (!empty($_GET['sort_by'])) {
        $sort_by = $_GET['sort_by'];
    }
}

// SQL query to fetch product details with filters
$sql = "SELECT * FROM products WHERE 1=1";

if ($filter_name !== '') {
    $sql .= " AND name LIKE '%" . $conn->real_escape_string($filter_name) . "%'";
}

if ($filter_price !== '') {
    $sql .= " AND price <= " . $conn->real_escape_string($filter_price);
}

if ($sort_by !== '') {
    if ($sort_by == 'price_asc') {
        $sql .= " ORDER BY price ASC";
    } elseif ($sort_by == 'price_desc') {
        $sql .= " ORDER BY price DESC";
    } elseif ($sort_by == 'name_asc') {
        $sql .= " ORDER BY name ASC";
    } elseif ($sort_by == 'name_desc') {
        $sql .= " ORDER BY name DESC";
    }
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detailed Search</title>
    <script src="https://kit.fontawesome.com/ec1c03a947.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Rubik:wght@300&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts.js" defer></script>
    <script src="nav.js" defer></script>
    <style>
 body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0 70px;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        h1, h2 {
            text-align: left !important;
            color: #333;
        }

        .filter-form {
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .filter-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        .filter-form input, .filter-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .filter-form button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .filter-form button:hover {
            background-color: #45a049;
        }

        .product-cards {
            display: flex;
            flex-wrap: wrap;
        }

        .col-4 {
            min-width: 280px !important;
            flex: 0 0 35% !important;
            max-width: 35% !important;
            margin-bottom: 20px;
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }

        .col-4:hover {
            transform: scale(1.05);
        }

        .col-4 img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .col-4 h4 {
            font-size: 18px;
            margin: 10px 0;
            color: #333;
        }

        .col-4 .rating {
            color: #ffd700;
            margin-bottom: 10px;
        }

        .col-4 p {
            font-size: 16px;
            color: #333;
        }

        .col-4 form {
            display: flex;
            justify-content: center;
        }

        .col-4 button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .col-4 button:hover {
            background-color: #45a049;
        }
        .for-flex{
            display: flex;
            flex-direction: column;
        }
        .center{
            display: flex;
            justify-content: space-between;
            gap: 70px;

        }
        .left-side{
            display: flex;
            flex-direction: column;
            flex: 0 0 25%;
        }
    </style>
</head>
<body>
<div class="loader__wrap" id="loading-screen" role="alertdialog" aria-busy="true" aria-live="polite" aria-label="Loading…">
	<div class="loader" aria-hidden="true">
		<div class="loader__sq"></div>
		<div class="loader__sq"></div>
	</div>
</div>
    <?php include 'nav.php'; ?>
    <h1>Detailed Search</h1>
        <div class="center">
        <div class="left-side">
    <form method="get" action="detailed_search.php">
        <div class="for-flex">
        <label for="name">Filter by name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($filter_name); ?>">
        </div>
        <br>
        <div class="for-flex">
        <label for="price">Filter by price (max):</label>
        <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($filter_price); ?>">
        </div>
        <br>
        <div class="for-flex">
        <label for="sort_by">Sort by:</label>
        <select id="sort_by" name="sort_by">
            <option value="">Select</option>
            <option value="price_asc" <?php if ($sort_by == 'price_asc') echo 'selected'; ?>>Price: Low to High</option>
            <option value="price_desc" <?php if ($sort_by == 'price_desc') echo 'selected'; ?>>Price: High to Low</option>
            <option value="name_asc" <?php if ($sort_by == 'name_asc') echo 'selected'; ?>>Name: A to Z</option>
            <option value="name_desc" <?php if ($sort_by == 'name_desc') echo 'selected'; ?>>Name: Z to A</option>
        </select>
        </div>
        <br>
        <button type="submit" name="filter" value="Filter">Filter</button>
    </form>
    </div>

   <div class="right-side">
   <h2>Filtered Products</h2>
    <div class="product-cards">
        <?php
        // Check if there are any products
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                // Echo or display the product card HTML dynamically
                echo '<div class="col-4">';
                echo '<a href="shop.php?id=' . $row["id"] . '">';
                echo '<img src="' . $row["image_url"] . '" style="width: 200px; height: 200px; background-size: cover; object-fit: contain;">'; // Adjust width and height as needed
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

        // Close connection
        $conn->close();
        ?>
    </div>
   </div>
        </div>
</body>
<script>
    
window.onload = function() {
    // Hide the loading screen
    document.getElementById("loading-screen").style.display = "none";
};
</script>
</html>
