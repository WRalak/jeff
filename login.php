<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Replace these with your actual admin credentials
    $adminUsername = 'admin';
    $adminPassword = 'password';

    if ($username === $adminUsername && $password === $adminPassword) {
        $_SESSION['logged_in'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"> <!-- Add your CSS file -->
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST" action="login.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
