<?php
session_start();

// Check if the cart is empty
$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Redirect to the cart page if no items are in the cart
if (empty($cart_items)) {
    header('Location: cart.php');
    exit;
}

// Calculate total cost
$total = 0;
foreach ($cart_items as $item) {
    $quantity = $item['quantity'] ?? 1;
    $price = $item['price'] ?? 0;
    $total += $price * $quantity;
}

// Handle form submission for checkout
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Save order details to the database (optional implementation)
    // Clear the cart after checkout
    $_SESSION['cart'] = [];

    // Redirect to a success page
    header('Location: success.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link your CSS -->
</head>
<body>
    <h1>Checkout</h1>
    
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price (per item)</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cart_items as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name'] ?? 'Unknown Item'); ?></td>
                    <td><?php echo htmlspecialchars($item['quantity'] ?? 1); ?></td>
                    <td><?php echo htmlspecialchars(number_format($item['price'] ?? 0, 2)); ?></td>
                    <td><?php echo htmlspecialchars(number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 1), 2)); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td><strong><?php echo htmlspecialchars(number_format($total, 2)); ?></strong></td>
            </tr>
        </tfoot>
    </table>

    <br>
    <form method="POST" action="checkout.php">
        <h2>Confirm Your Order</h2>
        <button type="submit">Confirm and Checkout</button>
    </form>

    <br>
    <a href="cart.php" class="button">Return to Cart</a>
</body>
</html>
