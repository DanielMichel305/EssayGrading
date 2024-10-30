<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Tracking</title>
    <link rel="stylesheet" href="/css/StudentProgress.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<?php include 'navbar.php'; ?>

    <div class="sidebar">
        <ul>
            <li><a href="home.php">Your dashboard</a></li>
            <li><a href="certifications.php">Certifications</a></li>
            <li><a href="#">Your Progress</a></li>
            <li><a href="discussion.php">Student Discussion</a></li>
          
        </ul>
    </div>

    <main>
        <section class="student-dashboard">
            <h1>Your Progress</h1>
            <div class="progress-container">
                <div class="progress-item">
                    <h2>Essay 1</h2>
                    <p>Feedback: Excellent structure, improve grammar.</p>
                    <p>Grade: 85%</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 85%;"></div>
                    </div>
                </div>
                <div class="progress-item">
                    <h2>Essay 2</h2>
                    <p>Feedback: Good ideas, work on thesis clarity.</p>
                    <p>Grade: 78%</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 78%;"></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="achievements">
    <h1>Achievements & Badges</h1>
    <div class="badge-container">
        <div class="badge-item">
            <div class="badge-icon"><i class="fas fa-trophy"></i></div>
            <div class="badge-title">Top Performer</div>
            <div class="badge-description">Awarded for outstanding performance in essays.</div>
        </div>
        <div class="badge-item">
            <div class="badge-icon"><i class="fas fa-star"></i></div>
            <div class="badge-title">Grammar Guru</div>
            <div class="badge-description">Recognized for excellent grammar skills.</div>
        </div>
        <div class="badge-item">
            <div class="badge-icon"><i class="fas fa-lightbulb"></i></div>
            <div class="badge-title">Creative Thinker</div>
            <div class="badge-description">Honored for innovative essay ideas.</div>
        </div>
    </div>
</section>

        <section class="leaderboard">
            <h1>Leaderboard</h1>
            <div class="leaderboard-container">
                <ol>
                    <li>Student A - 95%</li>
                    <li>Student B - 90%</li>
                    <li>Student C - 88%</li>
                </ol>
            </div>
        </section>

        <section class="personalized-recommendations">
            <h1>Personalized Recommendations</h1>
            <div class="recommendations-container">
                <div class="recommendation-item">
                    <h2>Study Tips</h2>
                    <p>Focus on improving your thesis statements. Consider using online resources for grammar improvement.</p>
                </div>
                <div class="recommendation-item">
                    <h2>Next Steps</h2>
                    <p>Work on your next essay with a focus on clarity and structure. Aim to increase your grade by 5%.</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 EssayGrader. All rights reserved.</p>
    </footer>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebar = document.querySelector('.sidebar');

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });
        });
</script>
</html>