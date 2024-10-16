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
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            <div class="job-post">
                <p>
                We appreciate your business! If you have any questions, please email
                <a href="mailto:orders@example.com">orders@example.com</a>.
                </p>
            </div>
        </section>
    </div>
</body>
<?php
    get_footer();
?>
</html>