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
            background-color: white;
            box-shadow: 0 0 0 0;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <?php 
        get_header();
    ?>

    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar -->
        <?php 
            get_sidebar($userid);
        ?>

        <!-- Main Feed -->
        <section class="main-feed">
            <?php
                $jobs = search_jobs();
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
    <?php
        get_footer();
    ?>
</body>

<script src="test/test.js"></script>
</html>