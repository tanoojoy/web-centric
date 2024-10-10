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
        
    }
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/homestyle.css">
    <script src="search.js" defer></script>

</head>
<body>


    <!-- Navigation Bar -->
    <header>
        <nav>
            <div class="logo">Talent<b>Hub</b></div>
            <div class="search-bar">
                <form class="form">
                 <input type="text" placeholder="Search for jobs, companies...">
                    <button class="search-btn" type="submit"> 
                    <img src="img/search-button.png"  alt="Search" style="width: 20px; height: 20px;">
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
                    <li><a href="#">Profile</a></li>
                </ul>
            </div>

            <div class="logout">
                <form action="backend/logout.php" method="POST">
                    <button type="submit" class="logout-btn">
                     <img src="img/logoutButton.png" alt="Logout" class="logout-icon"> <b> Logout </b>
                    </button>
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
                $jobs = get_all_jobs();
                foreach($jobs as $job){
                    echo "<div class=\"job-post\" data-title=\"" . $job['job_title'] . "\" data-company=\"" . $job['company_name'] . "\">
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

</body>
</html>

