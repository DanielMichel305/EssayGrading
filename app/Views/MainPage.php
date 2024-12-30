<?php
session_start(); // Ensure session is started
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="../public/css/navbar.css">
    <link rel="stylesheet" href="../public/css/MainPage.css">
</head>
<body>
 <?php include 'navbar.php'; ?>

 <div class="overlay">
     <div class="main-content">
        <h1 class="main-heading">Grade Smarter, not Harder</h1>
        <p class="sub-heading">Streamline your essay feedback with precision and speed</p>

        <div class="button-container">
            <?php if ($isLoggedIn): ?>
                <!-- Buttons for logged-in users -->
                <a href="/app/views/Discussion.php" class="cta student">Discussion</a>
                <a href="/app/views/home.php" class="cta instructor">Write Essay</a>
                <a href="/app/views/StudentProgress.php" class="cta instructor">Your Progress</a>
            <?php else: ?>
                <!-- Sign-up buttons for non-logged-in users -->
                <a href="/app/views/Register.php" class="cta student">Sign Up as Student</a>
                <a href="/app/views/Register.php" class="cta instructor">Sign Up as Instructor</a>
            <?php endif; ?>
        </div>
    </div>
 </div>

 <!-- Features Section -->
 <section class="features-section">
     <div class="feature-container">
         <div class="feature-box">
             <h2>Plagiarism Detector</h2>
             <p>Ensure originality in every essay with our AI-powered plagiarism detection tool that scans millions of sources to provide accurate results.</p>
         </div>
         <div class="feature-box">
             <h2>Grammar Checker</h2>
             <p>Enhance your writing by identifying and correcting grammatical errors with our comprehensive grammar checker, providing feedback after submission.</p>
         </div>
         <div class="feature-box">
             <h2>Student Discussion</h2>
             <p>Engage in thoughtful discussions with peers and exchange ideas to improve your understanding and essay quality.</p>
         </div>
         <div class="feature-box">
             <h2>Personalized Feedback</h2>
             <p>Receive detailed feedback tailored to your specific writing style and areas for improvement, delivered after essay submission to help you excel in every assignment.</p>
         </div>
     </div>
 </section>

</body>
<script src="../public/js/MainPage.js"></script>
</html>
