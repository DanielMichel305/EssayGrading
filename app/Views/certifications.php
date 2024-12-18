<?php
// You can add any PHP logic or variable declarations here if needed
// For example, you could fetch student data from a database
$studentName = "Student Name"; // Replace with dynamic data as needed
$currentDate = date("Y-m-d"); // Get current date for the certificate
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Progress</title>
    <link rel="stylesheet" href="/css/certifications.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/StudentProgress.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
</head>
<?php include 'navbar.php';?>
<div class="sidebar">
        <ul>
            <li><a href="home.php">Your dashboard</a></li>
            <li><a href="#">Certifications</a></li>
            <li><a href="StudentProgress.php">Your Progress</a></li>
            <li><a href="discussion.php">Student Discussion</a></li>
           
        </ul>
    </div>
<body>
    <div class="container">
        <h1 class="page-title">Certification</h1>
        
        <!-- Progress Section -->
        <div class="progress-section">
            <h2>Current Progress</h2>
            <div class="progress-bar">
                <div class="progress-fill" id="progressFill" style="width: 0%;"></div>
            </div>
            <p id="progressText">0% Completed</p>
            <button class="cta" id="completeButton">Complete Course</button>
        </div>

        <!-- Certificate Section -->
        <div class="certificate-section" id="certificateSection" style="display:none;">
            <h2>Congratulations!</h2>
            <p>You have completed the course. Click the button below to receive your certificate.</p>
            <button class="cta" id="receiveCertificateButton">Receive Certificate</button>
            <div id="certificate" style="display:none;">
                <div class="certificate-template" id="certificateTemplate">
                    <h3>Your Certificate of Completion</h3>
                    <p>This certifies that</p>
                    <h2><?php echo $studentName; ?></h2>
                    <p>has successfully completed the course.</p>
                    <p>Date: <span id="certificateDate"><?php echo $currentDate; ?></span></p>
                </div>
                <button class="cta" id="downloadButton">Download Certificate</button>
            </div>
        </div>
    </div>
    <script>
         document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebar = document.querySelector('.sidebar');

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });
        });
    </script>
    <script src="/js/certifications.js"></script>
    
</html>
