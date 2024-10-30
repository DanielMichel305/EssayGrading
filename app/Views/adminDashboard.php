<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/admin.css">
    <title>Admin Dashboard - Essay Grader</title>
</head>
<body>
<?php



include_once __DIR__ . "\\navbar.php";

use App\Controllers\essayController;
use App\Controllers\userController;


#require __DIR__ . "\\..\\Controllers\\UserController.php";
require __DIR__ . "\\..\\Controllers\\EssayController.php";
require __DIR__ . "\\..\\Models\\EssayModel.php";

?>
<div class="sidebar">
        <ul>
            <li><a href="#User Management" onclick="showTab('user-management'); return false;">Manage Users</a></li>
            <li><a href="#Manage Essays" onclick="showTab('essay-management'); return false;">Manage Essays</a></li>
            <li><a href="#Analytics" onclick="showTab('analytics'); return false;">Analytics</a></li>
            <li><a href="#Forum Management" onclick="showTab('Forum-Management'); return false;">Forum Management</a></li>
            <li><a href="#My Account" onclick="showTab('My-Account'); return false;">My Account</a></li>
        </ul>
    </div>
   <h2>Admin Dashboard</h2>

   <div class="content">
        <div id="user-management" class="tab-content">
                <h3>Manage Users</h3>

                <div class="user-table">
                    <div class="table-header">
                        <span>Name</span>
                        <span>UID</span>
                        <span>username</span>
                        <span>e-mail</span>
                        <span>Registered</span>
                        <span>Country</span>
                        <span>Action</span>
                    </div>
                    <div id="user-list" class="table-content">
                        <!-- User rows will be inserted here dynamically -->
                        
                       
                    </div>
                    <div class="pagination">
                        <button onclick="prevPage()">Previous</button>
                        <span id="page-info"></span>
                        <button onclick="nextPage()">Next</button>
                    </div>
                </div>

        </div>
        <div id="essay-management" class="tab-content" style="display: none;">
                <h3>Essay Management</h3>
                <div class="user-table">
                    <div class="table-header">
                        <span>Essay ID</span>
                        <span>Student Id</span>
                        <span>Language</span>
                        <span>Date Added</span>
                        <span>Graded By</span>
                        <span>Actions</span>
                    </div>
                    <div id="essay-list" class="table-content">


                    </div>
                    <div class="pagination">
                        <button onclick="prevPage()">Previous</button>
                        <span id="page-info"></span>
                        <button onclick="nextPage()">Next</button>
                    </div>
                </div>

        </div>
        <div id="analytics" class="tab-content" style="display: none;">
                <h3>Analytics</h3>
        </div>
        <div id="Forum-Management" class="tab-content" style="display: none;">
                <h3>Forum admin panel</h3>
        </div>
        <div id="My-Account" class="tab-content" style="display: none;">
                <h3>My Account</h3>
        </div>


   </div>
<script src="/js/adminDashboard.js"></script>
</body>


</html>