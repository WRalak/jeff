<?php
session_start();

// Check if the cart session is set
$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Calculate total cost
$total = 0;

// Validate cart items and calculate total
foreach ($cart_items as $item) {
    // Default quantity to 1 if it is missing
    $quantity = $item['quantity'] ?? 1;
    $price = $item['price'] ?? 0;

    // Add to total
    $total += $price * $quantity;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your styles -->
</head>
<body>
<header>
    <a href="#" class="logo">BLACK.COLLECTION</a>

    <a href="cart.php" class="icon-cart">
        <i class="ri-shopping-cart-line"></i>
        <span>0</span>
    </a>

    <a href="login.php" class="icon-login">
    <i class="ri-user-line"></i> Login
</a>

</header>
    <h1>Your Shopping Cart</h1>
    
    <!-- Display cart items -->
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
            <?php if (!empty($cart_items)): ?>
                <?php foreach ($cart_items as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['name'] ?? 'Unknown Item'); ?></td>
                        <td><?php echo htmlspecialchars($item['quantity'] ?? 1); ?></td>
                        <td><?php echo htmlspecialchars(number_format($item['price'] ?? 0, 2)); ?></td>
                        <td><?php echo htmlspecialchars(number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 1), 2)); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Your cart is empty.</td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td><strong><?php echo htmlspecialchars(number_format($total, 2)); ?></strong></td>
            </tr>
        </tfoot>
    </table>

    <br>
    <a href="index.php" class="button">Continue Shopping</a>
    <a href="checkout.php" class="button">Proceed to Checkout</a>
</body>
</html>
