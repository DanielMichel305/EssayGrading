<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EssayGrader</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<<<<<<< Updated upstream:PHP/Login.php
    <link rel="stylesheet" href="../CSS/base.css">
    <link rel="stylesheet" href="../CSS/login.css">
=======
    <link rel="stylesheet" href="../public/css/base.css">
    <link rel="stylesheet" href="../public/css/login.css">
>>>>>>> Stashed changes:app/Views/Login.php
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="login-container">
    <div class="login-box">
        <h1>Login</h1>
        <?php if (isset($_GET['error'])): ?>
            <div class="error-message">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
        <form id="loginForm" action="/auth/login" method="POST">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="cta">Login</button>
        </form>

        <p class="reset-password">
            <a href="reset_password.php">Forgot your password?</a>
        </p>
        <p class="register-text">Don’t have an account? <a href="Register.php">Sign up here</a>.</p>
    </div>
</div>

<footer>
    <p>&copy; 2024 EssayGrader. All rights reserved.</p>
    <ul>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms of Service</a></li>
        <li><a href="#">FAQs</a></li>
    </ul>
</footer>
</body>
</html>
