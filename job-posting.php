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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/job-posting.css">



</head>
<body>

    <?php echo $username; ?>
    <!-- Navigation Bar -->
    <header>
        <nav>
            <div class="logo">Talent<b>Hub</b></div>
            <div class="search-bar">
                    <form action="search_results.php" method="post" class="form">
                        <input type="text" name="keyword" placeholder="Search for jobs, companies...">
                        <button type="submit">
                        <img src="img/searchButton.png" alt="Search Icon" />
                        </button>
                    </form>
        </div>


            <div>
                <ul class="links">
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="#">Network</a></li>
                    <li><a href="#">Work</a></li>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Messages</a></li>
                    <li><a href="#">Notifications</a></li>
                    <li><a href="profile.php">Profile</a></li>
                </ul>
            </div>


            <div class="logout">
                <form action="backend/logout.php" method="POST" class="logout-form">
                    <input type="hidden" name="logout" value="true">
                        <button type="submit" class="logout-btn">
                            <img src="img/logoutButton.png" alt="Logout" class="logout-icon"> 
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
        <div class="main-feed">

        <div class="Job-posting">
                <h2>Job Posting</h2>
        </div>
        <form action="backend/create_posting.php" method="POST" >
            <div class="profile-info">
                <label class="title" for="title"><strong>Job title:</strong></label>
                <input type="text" name="title" id="title" required>

                <label class="Description" for="Description"><strong>Description:</strong></label>
                <input type="Description" name="Description" id="Description" required>

                <label for="location"><strong>Location:</strong></label>
                <select name="location" id="location">
                    <option value="North">North</option>
                    <option value="South">South</option>
                    <option value="East">East</option>
                    <option value="West">West</option>
                </select>
            
                <label for="type"><strong>Employment type:</strong></label>
                <select name="type" id="type">
                    <option value="Full-Time">Full-Time</option>
                    <option value="Part-Time">Part-Time</option>
                </select>

                <label for="start date"><strong>Posted Date:</strong></label>
                <input type="date" id="start date" name="school-start" value="2024-10-13" min="2000-01-01" max="2025-01-01" />


                <label for="end date"><strong>Expiry Date:</strong></label>
                <input type="date" id="end date" name="school-end" value="2024-10-13" min="2000-01-01" max="2025-01-01" />

            
            </div>

            <div class="submit-section">
                <button type="submit" class="submit-btn">Post</button>
            </div>
         </form> 
    
       </div>

</body>
</html>