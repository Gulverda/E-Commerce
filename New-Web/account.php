<?php
session_start();

include 'nav.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php'); // Redirect to the login page if the user is not logged in
    exit();
}

// Database connection
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "user_system";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check for database connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$error = '';
$success = '';

// Handle form submissions for changing username and email
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['newUsername']) && !empty($_POST['newUsername'])) {
        $newUsername = $conn->real_escape_string($_POST['newUsername']);
        $stmt = $conn->prepare("UPDATE users SET username = ? WHERE username = ?");
        $stmt->bind_param("ss", $newUsername, $username);

        if ($stmt->execute()) {
            $_SESSION['username'] = $newUsername;
            $username = $newUsername;
            $success = "Username successfully updated.";
        } else {
            $error = "Error updating username: " . $stmt->error;
        }
        $stmt->close();
    }

    if (isset($_POST['newEmail']) && !empty($_POST['newEmail'])) {
        $newEmail = $conn->real_escape_string($_POST['newEmail']);
        $stmt = $conn->prepare("UPDATE users SET email = ? WHERE username = ?");
        $stmt->bind_param("ss", $newEmail, $username);

        if ($stmt->execute()) {
            $_SESSION['email'] = $newEmail;
            $email = $newEmail;
            $success = "Email successfully updated.";
        } else {
            $error = "Error updating email: " . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
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
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .account-info {
            margin-top: 150px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            width: 300px;
            text-align: center;
        }
        .account-info h2 {
            margin-top: 0;
        }
        .account-info form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .account-info input {
            margin-bottom: 10px;
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .account-info button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        .account-info button:hover {
            background-color: #45a049;
        }
        .message {
            margin-bottom: 10px;
            color: green;
        }
        .error {
            margin-bottom: 10px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="account-info">
        <h2>Account Information</h2>
        <?php if ($success): ?>
            <p class="message"><?php echo htmlspecialchars($success); ?></p>
        <?php endif; ?>
        <?php if ($error): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        <form method="POST">
            <input type="text" name="newUsername" placeholder="New Username">
            <button type="submit">Change Username</button>
        </form>
        <form method="POST">
            <input type="email" name="newEmail" placeholder="New Email">
            <button type="submit">Change Email</button>
        </form>
    </div>
</body>
</html>
