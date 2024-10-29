<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - EssayGrader</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../CSS/base.css">
    <link rel="stylesheet" href="../CSS/register.css">
</head>
<body>
<?php include 'navbar.php'; ?>

    <div class="signup-container">
        <div class="signup-box">
            <h1>Create an Account</h1>
            <form>
                <div class="input-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" minlength="7" required>
                </div>

                <button type="submit" class="cta">Sign Up</button>
            </form>
            <p class="register-text">Already have an account? <a href="Login.php">Login here</a>.</p>
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


