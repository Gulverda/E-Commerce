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

// Get the product ID from the query parameter
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($product_id > 0) {
    // SQL query to fetch product and monitor details by product ID
    $sql = "
        SELECT p.*, m.brand, m.model, m.screen_size, m.resolution, m.refresh_rate, m.panel_type,
               m.aspect_ratio, m.response_time, m.brightness, m.contrast_ratio, m.ports
        FROM products p
        LEFT JOIN monitors m ON p.id = m.product_id
        WHERE p.id = $product_id
    ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found";
        exit;
    }
} else {
    echo "Invalid product ID";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/ec1c03a947.js" crossorigin="anonymous"></script>
    <style>
        .product-details {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .product-details h2 {
            text-align: center;
        }

        .product-details img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
        }

        .product-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .product-details th, .product-details td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .product-details th {
            background-color: #f8f8f8;
        }

        .product-details form {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="product-details">
    <h2><?php echo htmlspecialchars($product['name']); ?></h2>
    <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
    <p><?php echo htmlspecialchars($product['description']); ?></p>
    <p>Price: $<?php echo htmlspecialchars($product['price']); ?></p>
    <?php if (!empty($product['brand'])): ?>
    <h3>Monitor Details</h3>
    <table>
        <tr>
            <th>Brand</th>
            <td><?php echo htmlspecialchars($product['brand']); ?></td>
        </tr>
        <tr>
            <th>Model</th>
            <td><?php echo htmlspecialchars($product['model']); ?></td>
        </tr>
        <tr>
            <th>Screen Size</th>
            <td><?php echo htmlspecialchars($product['screen_size']); ?> inches</td>
        </tr>
        <tr>
            <th>Resolution</th>
            <td><?php echo htmlspecialchars($product['resolution']); ?></td>
        </tr>
        <tr>
            <th>Refresh Rate</th>
            <td><?php echo htmlspecialchars($product['refresh_rate']); ?> Hz</td>
        </tr>
        <tr>
            <th>Panel Type</th>
            <td><?php echo htmlspecialchars($product['panel_type']); ?></td>
        </tr>
        <tr>
            <th>Aspect Ratio</th>
            <td><?php echo htmlspecialchars($product['aspect_ratio']); ?></td>
        </tr>
        <tr>
            <th>Response Time</th>
            <td><?php echo htmlspecialchars($product['response_time']); ?> ms</td>
        </tr>
        <tr>
            <th>Brightness</th>
            <td><?php echo htmlspecialchars($product['brightness']); ?> nits</td>
        </tr>
        <tr>
            <th>Contrast Ratio</th>
            <td><?php echo htmlspecialchars($product['contrast_ratio']); ?></td>
        </tr>
        <tr>
            <th>Ports</th>
            <td><?php echo htmlspecialchars($product['ports']); ?></td>
        </tr>
    </table>
    <?php endif; ?>
    <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
        <input type="submit" name="add_to_cart" value="Add to Cart">
    </form>
</div>
</body>
</html>
