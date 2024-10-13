<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }
    else{
        $username = $_SESSION['username'];
        // echo 'tanoo';
        //fetch page configurations
        include("backend/config.php");
        include("backend/functions.php");
        // include("backend/logout.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/job-application.css">



</head>
<body>

    <?php echo $username; ?>
    <!-- Navigation Bar -->
    <header>
        <nav>
            <div class="logo">Talent<b>Hub</b></div>
            <div class="search-bar">
                    <form action="search_results.php" method="post" class="form">
                        <input type="text" name="keyword" placeholder="Search for jobs, companies..." required>
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
            </ul>
        </aside>

        <!-- Main Feed -->
        <div class="main-feed">

        <div class="Description">
        <h2> Job Description</h2>
        <p>We are looking for a talented and motivated Frontend Developer to join our dynamic team. As a Frontend Developer, you will be responsible for building responsive and user-friendly web applications that deliver great user experiences. You will collaborate closely with our UI/UX designers and backend developers to bring designs to life and ensure the smooth functionality of the website.</p>
    <p><strong>Responsibilities:</strong></p>
    <ul>
        <li>Develop responsive web applications using HTML, CSS, and JavaScript.</li>
        <li>Collaborate with UI/UX designers to implement engaging designs.</li>
        <li>Work with backend teams to integrate APIs and ensure a seamless data flow.</li>
        <li>Optimize websites for performance, scalability, and user experience.</li>
        <li>Test and debug frontend issues, ensuring compatibility across browsers.</li>
        <li>Write clean, maintainable, and efficient code.</li>
    </ul>
    <p><strong>Required Skills:</strong></p>
    <ul>
        <li>Strong proficiency in HTML5, CSS3, and JavaScript.</li>
        <li>Experience with frontend frameworks like React, Vue.js, or Angular.</li>
        <li>Familiarity with version control systems like Git.</li>
        <li>Understanding of web accessibility standards and SEO best practices.</li>
    </ul>
    <p><strong>Qualifications:</strong></p>
    <ul>
        <li>Bachelor’s degree in Computer Science, IT, or a related field (or equivalent experience).</li>
        <li>At least 2 years of experience in frontend development with a solid portfolio of projects.</li>
    </ul>


        <div>

        <div class="application">
        <h2>Job Application Form </h2>  
        <div class="center-form"> 
            <form action="" >
            <input type="file" id="myFile" name="filename">
            <input type="submit">
        </form>
        </div>
        </div>
       </div>

</body>
</html>