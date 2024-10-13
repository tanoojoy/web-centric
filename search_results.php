<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php");
        exit();
    }

    if(!isset($_SESSION['username'])){
        header("Location: profile.php");
        exit();
    }
    // echo 'tanoo';
    //fetch page configurations
    include("backend/config.php");
    include("backend/functions.php");

    $username = $_SESSION['username'];
    $keyword = $_POST['keyword'];
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .main-feed {
            margin-top:20px;
        }

    </style>

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
                <img src="img/capy.jpeg" alt="Profile Picture" class="profile-pic">
                <h3><?php echo $username; ?></h3>
                <p>Software Developer at ABC Corp</p>
            </div>
            <ul class="sidebar-links">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">My Jobs</a></li>
                <li><a href="#">Saved Jobs</a></li>
                <li><a href="https://www.indeed.com/career-advice">Career Advice</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="job-posting.php">Create Job posting</a></li>   
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

    <footer>
    <div class="footerContainer">
        <div class="socialIcons">
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-google-plus"></i></a>
            <a href=""><i class="fa-brands fa-youtube"></i></a>
        </div>

        <div class="footer-Nav">
                <ul>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Learn More</a></li>
                </ul>
        </div>

    </div>

</footer>


</body>
</html>