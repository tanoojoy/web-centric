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
    // $keyword = $_POST['keyword'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .main-feed {
            margin-top:20px;
        }

    </style>

</head>
<body>
<header>
        <nav>
            <div class="logo">Talent<b>Hub</b></div>
            <div class="search-bar">
                <form action="search_results.php" method= "post" class="form">
                 <input type="text" placeholder="Search for jobs, companies..." name="keyword">
                    <button class="search-btn" type="submit"> 
                    <!-- <img src="img/searchButton.png"  alt="Search" style="width: 20px; height: 20px;"> -->
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
                <!-- <img src="img/logoutButton.png" alt="Logout" class="logout-icon" style="vertical-align: middle;"> -->
            </form>

            </div>
            
        </nav>
    </header>
  <section class="main-feed">
    <div class="job-post">
        <p>
        We appreciate your business! If you have any questions, please email
        <a href="mailto:orders@example.com">orders@example.com</a>.
        </p>
    </div>
  </section>
</body>
</html>