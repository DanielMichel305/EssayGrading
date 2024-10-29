<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI-Powered Essay Grading System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../CSS/navbar.css">   
</head>
<body>
<header>
<button id="sidebar-toggle" class="sidebar-toggle"><i class="fas fa-bars"></i></button>
        <div class="logo">EssayGrader</div>
        <nav>
        
            <ul>
                <li><a href="MainPage.php">Home</a></li>
                <li><a href="About.php">About</a></li>
                <li><a href="Features.php">Features</a></li>
                <li><a href="Login.php">Login</a></li>
                <li><a href="Register.php">Signup</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            
        </nav>
    </header>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.querySelector('.menu-toggle');
            const sidebar = document.querySelector('.sidebar');
        
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });
        });

</script>
</html>