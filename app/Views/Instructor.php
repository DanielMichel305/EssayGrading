<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Dashboard - EssayGrader</title>
    <link rel="stylesheet" href="/css/instructor.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <section class="instructor-dashboard">
        <h1>Instructor Dashboard</h1>

        <!-- Grading Criteria Configuration Section -->
        <div class="section grading-criteria">
            <h2>Configure Grading Criteria</h2>
            <p>Set grading criteria to ensure AI aligns with course goals.</p>
            <form>
                <label for="criteria1">Criterion 1:</label>
                <input type="text" id="criteria1" placeholder="Add grading criterion">

                <label for="criteria2">Criterion 2:</label>
                <input type="text" id="criteria2" placeholder="Add grading criterion">

                <button type="submit" class="cta">Save Criteria</button>
            </form>
        </div>

        <!-- Discussion Moderation Section -->
        <div class="section discussion-moderation">
            <h2>Moderate Discussions</h2>
            <p>View and moderate student discussions.</p>
            <button class="cta">View Discussions</button>
        </div>

        <!-- Essay Guidance Section -->
        <div class="section essay-guidance">
            <h2>Essay Guidance</h2>
            <p>Provide tips on essay topics and writing techniques.</p>
            <button class="cta">Add Guidance</button>
        </div>

        <!-- Analytics Section -->
        <div class="section analytics">
            <h2>Analytics</h2>
            <p>Access analytics to monitor student progress.</p>
            <button class="cta">View Analytics</button>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 EssayGrader. All rights reserved.</p>
    </footer>
</body>
</html>
