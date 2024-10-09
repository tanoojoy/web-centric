?<?php
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

        //fetch job postings
        $sql = "SELECT jobposting.title, jobposting.description, jobposting.location, company.name AS company_name
                FROM jobposting
                JOIN company ON jobposting.company_id = company.company_id;";
        $jobpostings = $conn->query($sql);
        $conn->close();
    }
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/homestyle.css">

</head>
<body>


    <!-- Navigation Bar -->
    <header>
        <nav>
            <div class="logo">Talent<b>Hub</b></div>
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
                
                if ($jobpostings->num_rows > 0) { // Check if any records were found
                    while($row = $jobpostings->fetch_assoc()) {  //store the SQL row in a variable $row
                        $job_title = $row['title'];
                        $job_description = $row['description'];
                        $job_location = $row['location'];
                        $company_name = $row['company_name'];
                        

                        //echo "<p>" . $job_title . "</p>";

                        echo "<div class=\"job-post\">
                            <h3>" . $job_title ."</h3>
                            <p>Company: " . $company_name . "</p>
                            <p>Description: ". $job_description ."
                            <p>Location: " . $job_location . "</p>
                            <button class=\"apply-btn\">Apply</button>
                            </div>";
                    }
                } 
                else {
                    echo "There was a problem querying the config table";
                }
            ?>
        </section>
    </div>

</body>
</html>

