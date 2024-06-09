<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect back to the main page (index.php)
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
?>
