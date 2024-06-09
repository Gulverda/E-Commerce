<?php
session_start();

$response = array('success' => false, 'message' => '', 'cart_count' => 0);

if (isset($_POST['product_id'])) {
    $product_id = (int)$_POST['product_id'];
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
        $response['success'] = true;
        $response['cart_count'] = array_sum($_SESSION['cart']);
    } else {
        $response['message'] = 'Product not found in cart';
    }
} else {
    $response['message'] = 'Invalid product ID';
}

echo json_encode($response);
?>
