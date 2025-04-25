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
    <link rel="stylesheet" href="css/pricing.css">
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
        <div class="main-feed">
            <div class="grid">
                <div class="mycard basic">
                    <div class="title">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <h2>Basic</h2>
                    </div>
                    <div class="price">
                        <h4><sup>$</sup>15</h4>
                    </div>
                    <div class="option">
                        <ul>
                            <li><i class="fa fa-check" aria-hidden="true"></i> 10 GB Space</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> 3 Domain Names</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> 20 Email Address</li>
                            <li><i class="fa fa-times" aria-hidden="true"></i> Live Support</li>
                        </ul>
                    </div>
                    <form action="checkout.php" method="post">
                        <input type="hidden" name="tier" value="low">
                        <input type="submit" class="submit-btn" value="Subscribe"/>
                    </form>
                </div>
                <div class="mycard standard">
                    <div class="title">
                        <i class="fa fa-plane" aria-hidden="true"></i>
                        <h2>Standard</h2>
                    </div>
                    <div class="price">
                        <h4><sup>$</sup>30</h4>
                    </div>
                    <div class="option">
                        <ul>
                            <li><i class="fa fa-check" aria-hidden="true"></i> 50 GB Space</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> 5 Domain Names</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Unlimited Email Address</li>
                            <li><i class="fa fa-times" aria-hidden="true"></i> Live Support</li>
                        </ul>
                    </div>
                    <form action="checkout.php" method="post">
                        <input type="hidden" name="tier" value="mid">
                        <input type="submit" class="submit-btn" value="Subscribe">
                    </form>
                </div>
                <div class="mycard premium">
                    <div class="title">
                        <i class="fa fa-rocket" aria-hidden="true"></i>
                        <h2>Premium</h2>
                    </div>
                    <div class="price">
                        <h4><sup>$</sup>45</h4>
                    </div>
                    <div class="option">
                        <ul>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Unlimited GB Space</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> 30 Domain Names</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Unlimited Email Address</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Live Support</li>
                        </ul>
                    </div>
                    <form action="checkout.php" method="post">
                        <input type="hidden" name="tier" value="high">
                        <input type="submit" class="submit-btn" value="Subscribe"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
    get_footer();
?>
</html>