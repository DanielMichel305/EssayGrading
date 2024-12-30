<?php
session_start();

$error = '';

// Check for registration success
if (isset($_GET['register']) && $_GET['register'] == 'success' && isset($_SESSION['temp_user'])) {
    $success = "Registration successful! You can now log in.";
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Define special username-password combinations for redirection
    $special_accounts = [
        'ahmed' => ['password' => 'ahmed123', 'redirect' => 'home.php'],
        'instructor' => ['password' => 'ahmed123', 'redirect' => 'instructor.php'],
        'admin' => ['password' => 'admin123', 'redirect' => 'admindashboard.php']
    ];

    // Check if the username is in the special accounts
    if (isset($special_accounts[$username])) {
        // Verify the password for the special account
        if ($password === $special_accounts[$username]['password']) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;

            // Redirect to the corresponding page
            header("Location: " . $special_accounts[$username]['redirect']);
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    } elseif (isset($_SESSION['temp_user']) && $_SESSION['temp_user']['username'] === $username) {
        // Check against the temporary user stored in the session
        if (password_verify($password, $_SESSION['temp_user']['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;

            // Redirect to home page
            header("Location: home.php");
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EssayGrader</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../public/css/base.css">
    <link rel="stylesheet" href="../public/css/login.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="login-container">
    <div class="login-box">
        <h1>Login</h1>
        <?php if (isset($success)): ?>
            <p style="color: green;"><?php echo htmlspecialchars($success); ?></p>
        <?php endif; ?>
        <?php if ($error): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
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
        <p class="register-text">Don't have an account? <a href="Register.php">Sign up here</a>.</p>
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
