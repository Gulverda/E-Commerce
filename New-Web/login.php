<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_system";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check user credentials
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['profile_icon'] = 'profile_icon_url'; // Change 'profile_icon_url' to the actual URL of the profile icon

// Check if user is admin
if ($row['role'] == 'admin') {
    $_SESSION['isAdmin'] = true;
    header("Location: index.php"); // Redirect to admin panel
    exit(); // Ensure no further code execution after redirection
} else {
    $_SESSION['isAdmin'] = false;
    header("Location: index.php"); // Redirect to main page for regular users
    exit(); // Ensure no further code execution after redirection
}


        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "No user found with that username";
    }

    $conn->close();
}

$buttonContent = '';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $profileIcon = $_SESSION['profile_icon'];
    $buttonContent = '<div class="profile-info"><img src="' . $profileIcon . '" alt="Profile Icon">' . $username . '</div>';
} else {
    $buttonContent = '<button id="showRegistration">Registration</button>';
}
?>
