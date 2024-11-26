<?php
session_start();

// Retrieve the cart from the session
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Handle item removal
if (isset($_POST['remove_item'])) {
    $item_name = $_POST['item_name']; // Get the name of the item to remove
    foreach ($cart as $key => $item) {
        if ($item['name'] === $item_name) {
            unset($cart[$key]); // Remove the item from the cart
        }
    }
    $_SESSION['cart'] = $cart; // Update the session with the modified cart
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        .cart-table {
            width: 100%;
            border-collapse: collapse;
        }
        .cart-table th, .cart-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .cart-table th {
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Shopping Cart</h1>

    <?php if (count($cart) > 0): ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td>KSH <?php echo number_format($item['price'], 2); ?></td>
                        <td>
                            <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="Product Image" width="50">
                        </td>
                        <td>
                            <!-- Remove item form -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="item_name" value="<?php echo htmlspecialchars($item['name']); ?>">
                                <button type="submit" name="remove_item">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>

    <a href="index.php">Continue Shopping</a>
</body>
</html>
