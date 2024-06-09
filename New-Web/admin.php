<?php
session_start();

// Check if the user is an admin
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
    header('Location: index.php'); // Redirect to the login page if the user is not an admin
    exit();
}

// Database connection
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "user_system";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = '';
$success = '';

// Handle form submission for adding new product
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $price = $conn->real_escape_string($_POST['price']);
    $image_url = $conn->real_escape_string($_POST['image_url']);

    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image_url) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $name, $description, $price, $image_url);

    if ($stmt->execute()) {
        $success = "Product successfully added.";
    } else {
        $error = "Error adding product: " . $stmt->error;
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
    <title>Admin Panel</title>
    <style>
           /* Container styles */
           .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Heading styles */
        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Return back button styles */
        .return-button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            display: inline-block;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .return-button:hover {
            background-color: #0056b3;
        }

        /* Form styles */
        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="url"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Error and success messages styles */
        .message {
            margin-top: 10px;
            padding: 10px;
            border-radius: 4px;
        }

        .error {
            color: red;
            background-color: #ffcdd2;
        }

        .success {
            color: green;
            background-color: #d0f0c0;
        }
    </style>
</head>
<body>
    <h2>Admin Panel</h2>
    <?php if ($success): ?>
        <p style="color: green;"><?php echo htmlspecialchars($success); ?></p>
    <?php endif; ?>
    <?php if ($error): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <a href="index.php" class="return-button">Return Back</a>
        <form method="POST">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
            <br>
            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price" required>
            <br>
            <label for="image_url">Image URL:</label>
            <input type="url" id="image_url" name="image_url">
            <br>
            <input type="submit" value="Add Product">
        </form>
</body>
</html>
