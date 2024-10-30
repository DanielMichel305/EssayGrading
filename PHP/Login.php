<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EssayGrader</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../CSS/base.css">
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
<?php include 'navbar.php'; ?>

    <div class="login-container">
        <div class="login-box">
            <h1>Login</h1>
            <form id="loginForm">
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
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            // Perform client-side validation
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            if (email && password) {
                // If validation passes, redirect to home.php
                window.location.href = 'home.php';
            } else {
                alert('Please fill in all fields.');
            }
        });

    </script>
</body>
</html>


