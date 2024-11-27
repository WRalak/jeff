<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Successful</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link your CSS -->
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
    <h1>Thank You for Your Purchase!</h1>
    <p>Your order has been successfully placed. You will receive a confirmation email shortly.</p>
    <a href="index.php" class="button">Return to Shop</a>
</body>
</html>
