<?php
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
            <div class="logo">Talent Hub</div>
            <div class="search-bar">
                <input type="text" placeholder="Search for jobs, companies...">
                <button class="search-btn">Search</button>
            </div>

           
            <div>
                <ul class="links">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Network</a></li>
                    <li><a href="#">Work</a></li>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Messages</a></li>
                    <li><a href="#">Notifications</a></li>
                    <li><a href="#">Profile</a></li>
                </ul>
            </div>
            
           
        </nav>
    </header>

    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="profile-summary">
                <img src="profile-pic.jpg" alt="Profile Picture" class="profile-pic">
                <h3>John Doe</h3>
                <p>Software Developer at ABC Corp</p>
            </div>
            <ul class="sidebar-links">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">My Jobs</a></li>
                <li><a href="#">Saved Jobs</a></li>
                <li><a href="#">Career Advice</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </aside>

        <!-- Main Feed -->
        <section class="main-feed">
            <h2>Job Recommendations</h2>
            <div class="job-post">
                <h3>Frontend Developer</h3>
                <p>Company: XYZ Tech</p>
                <p>Location: Remote</p>
                <button class="apply-btn">Apply</button>
            </div>
            <div class="job-post">
                <h3>Backend Developer</h3>
                <p>Company: DEF Solutions</p>
                <p>Location: New York, NY</p>
                <button class="apply-btn">Apply</button>
            </div>
            <!-- Additional job posts can go here -->
        </section>
    </div>

</body>
</html>
