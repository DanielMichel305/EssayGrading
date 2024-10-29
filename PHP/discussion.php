<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion Feed - Reddit Style</title>
    <link rel="stylesheet" href="discussion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar Toggle Button for Mobile -->
        <button class="toggle-sidebar" onclick="toggleSidebar()">☰</button>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">Student Discussion</div>
            <ul>
                <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="#"><i class="fas fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
            </ul>
        </div>

        <!-- Main content -->
        <div class="main-content">
            <div class="feed">
                <!-- Post creation area -->
                <div class="create-post" id="post-section">
                    <textarea id="post-content" placeholder="Write your post here..."></textarea>
                    <button class="fixed-post-button" onclick="addPost()">Post</button>
                </div>
                
                <!-- Posts feed -->
                <div id="feed" class="feed-list">
                    <!-- Posts will be dynamically added here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Action Button for New Post -->
    <div class="fab" onclick="scrollToPost()">
        <i class="fas fa-plus"></i><span> New Post</span>
    </div>

    <script src="discussion.js"></script>
</body>
</html>
