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

    $userid = $_SESSION['user_id'];
    $jobs = search_jobs();
    $user = get_user_profile($userid);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/job-posting.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="test/text.css">
    <link rel="stylesheet" href="css/pricing.css">

    <style>
        

        .logout-container {
          display: flex;
          align-items: center;
        }

        .logout-btn {
          background: none;
          border: none;
          cursor: pointer;
          padding: 5px;
        }

        .logout-btn svg {
          width: 24px;
          height: 24px;
          stroke: red;
          transition: stroke 0.3s ease;
        }

        .logout-btn:hover svg {
          stroke: darkred;
        }


    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
    <body>
    <div class="job">
        <div class="header">
        <div class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path xmlns="http://www.w3.org/2000/svg"
                d="M512 503.5H381.7a48 48 0 01-45.3-32.1L265 268.1l-9-25.5 2.7-124.6L338.2 8.5l23.5 67.1L512 503.5z"
                fill="#0473ff" data-original="#28b446" />
            <path xmlns="http://www.w3.org/2000/svg" fill="#0473ff" data-original="#219b38"
                d="M361.7 75.6L265 268.1l-9-25.5 2.7-124.6L338.2 8.5z" />
            <path xmlns="http://www.w3.org/2000/svg"
                d="M338.2 8.5l-82.2 234-80.4 228.9a48 48 0 01-45.3 32.1H0l173.8-495h164.4z" fill="#0473ff"
                data-original="#518ef8" />
            </svg>
            TalentHub
        </div>
        <div class="header-menu">
            <a href="home.php" class="active">Find Job</a>
            <a href="pricing.php">Premium</a>
            <a href="job-posting.php">Company Only - Create job posting</a>
            
            <a href="profile.php">My Profile</a>
        </div>
        <div class="user-settings">
            <div class="dark-light">
            <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
            </svg>
            </div>

            <div class="logout-container">
            <a href="backend/logout.php" method="POST" class="logout-btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                <polyline points="16 17 21 12 16 7" />
                <line x1="21" y1="12" x2="9" y2="12" />
                </svg>
            </a>
            </div>


            
            <div class="user-name"><?php echo $user['first_name'] . " " . $user['last_name'] ?></div>
        </div>
        </div>


    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar -->
        <?php
            get_sidebar($userid);
        ?>

        <!-- Main Feed -->
        <div class="main-feed">

            <div class="Job-posting">
                    <h2>Job Posting</h2>
            </div>
            <form action="api/create_posting.php" method="POST" >
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
    </div>

    
</body>
<script src="test/test.js"></script>

</html>