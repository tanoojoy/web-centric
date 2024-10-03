?<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }
    else{
        $username = $_SESSION['username'];
    }

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobSeeker - Home</title>
    <link rel="stylesheet" href="css\homestyle.css">

</head>
<body>

    <!-- Navigation Bar -->
    <header>
        <nav>
            <!--<div class="logo">TalentHub</div> -->
            <div><a class="mainlogo">Talent<b> Hub</b></a></div>
            <div class="search-bar">
                <input type="text" placeholder="Search for jobs, companies...">
                <button class="search-btn">Search</button>
            </div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">My Network</a></li>
                <li><a href="#">Jobs</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Notifications</a></li>
                <li><a href="#">Profile</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="profile-summary">
                <img src="profile-pic.jpg" alt="Profile Picture" class="profile-pic">
                <h3>Tanoo Joykurun</h3>
                <p>Intern</p>
            </div>
            <ul class="sidebar-links">
                <li><a href="#">Connections</a></li>
                <li><a href="#">About Me</a></li>
                <li><a href="#">Hobby</a></li>
                <li><a href="#">Applied Jobs</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </aside>

        <!-- Main Feed -->
        <section class="main-feed">
            <h2>Job Recommendations</h2>
            <div class="job-post">
                <h3>Frontend Developer</h3>
                <p>Dayforce</p>
                <p>Location: Remote</p>
                <button class="apply-btn">Apply</button>
            </div>
            <div class="job-post">
                <h3>Backend Developer</h3>
                <p>Company: Rogers Capital</p>
                <p>Location: Ébène</p>
                <button class="apply-btn">Apply</button>
            </div>
            <!-- Additional job posts can go here -->
        </section>
    </div>

</body>
</html>
