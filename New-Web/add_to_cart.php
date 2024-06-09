<?php
session_start();

$response = array('success' => false, 'message' => '', 'cart_count' => 0);

if (isset($_POST['product_id'])) {
    $product_id = (int)$_POST['product_id'];

    if ($product_id > 0) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]++;
        } else {
            $_SESSION['cart'][$product_id] = 1;
        }

        $response['success'] = true;
        $response['cart_count'] = array_sum($_SESSION['cart']);
    } else {
        $response['message'] = 'Invalid product ID';
    }
} else {
    $response['message'] = 'Product ID not set';
}

echo json_encode($response);


// Redirect back to index.php
header("Location: index.php");
exit(); // Make sure to exit after redirection
?>
