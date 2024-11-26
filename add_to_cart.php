<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = []; // Initialize cart if not set
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = [
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'image' => $_POST['image']
    ];
    
    $_SESSION['cart'][] = $item; // Add item to the cart session
    echo json_encode(['status' => 'success', 'message' => 'Item added to cart']);
    exit;
}
?>
