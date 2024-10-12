<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }
    else{
        $username = $_SESSION['username'];
        //fetch page configurations
        include("backend/config.php");
        include("backend/functions.php");
        include("backend/logout.php");
    }

    $keyword = $_POST['keyword'];
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/profile.css"> -->
</head>
<body>


    <!-- Navigation Bar -->
    <header>
        <nav>
            <div class="logo">Talent<b>Hub</b></div>
            <div class="search-bar">
                <form action="search_results.php" method= "post" class="form">
                 <input type="text" placeholder="Search for jobs, companies..." name="keyword">
                    <button class="search-btn" type="submit"> 
                    <img src="img/searchButton.png"  alt="Search" style="width: 20px; height: 20px;">
                 </button> 
                </form> 
            </div>
            <div>
                <ul class="links">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Network</a></li>
                    <li><a href="#">Work</a></li>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Messages</a></li>
                    <li><a href="#">Notifications</a></li>
                    <li><a href="profile.php">Profile</a></li>
                </ul>
            </div>
            <div class="logout">
            <form action="backend/logout.php" method="POST">
                <input type="submit" name="logout" value="Logout" class="logout-btn">
                <img src="img/logoutButton.png" alt="Logout" class="logout-icon" style="vertical-align: middle;">
            </form>

            </div>
            
        </nav>
    </header>

    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="profile-summary">
                <img src="profile-pic.jpg" alt="Profile Picture" class="profile-pic">
                <h3><?php echo $username; ?></h3>
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
            <?php
                $jobs = search_jobs($keyword);
                foreach($jobs as $job){
                    echo "<div class=\"job-post\">
                        <h3>" . $job['job_title'] ."</h3>
                        <p>Company: " . $job['company_name'] . "</p>
                        <p>Description: ". $job['job_description'] ."
                        <p>Location: " . $job['job_location'] . "</p>
                        <button class=\"apply-btn\">Apply</button>
                        </div>";
                }
                $conn->close();
            ?>
        </section>
    </div>

    <!-- hgjhj -->
     <!-- hgjhj -->

</body>
</html>