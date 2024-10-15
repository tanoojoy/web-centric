<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php");
        exit();
    }

    // echo 'tanoo';
    //fetch page configurations
    include("backend/config.php");
    include("backend/functions.php");

    $username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html>  
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="css/profile.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://js.stripe.com/v3/"></script>
    </head>
    <body>
    <header>
        <nav>
            <div class="logo">Talent<b>Hub</b></div>
            <ul class="links">
                <li><a href="homepage.php">Home</a></li>
                <li><a href="#">Network</a></li>
                <li><a href="#">Work</a></li>
                <li><a href="#">Jobs</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Notifications</a></li>
                <li><a href="#">Profile</a></li>
            </ul>
            <div class="logout">
                <form action="backend/logout.php" method="POST">
                    <button type="submit" class="logout-btn">
                        <img src="img/logoutButton.png" alt="Logout" class="logout-icon"> <b> Logout </b>
                    </button>
                </form>
            </div>
        </nav>
    </header>
    <section class="main-feed">
    <div class="product">
        <img src="https://i.imgur.com/EHyR2nP.png" alt="The cover of Stubborn Attachments" />
        <div class="description">
          <h3>Stubborn Attachments</h3>
          <h5>$20.00</h5>
        </div>
      </div>
      <form action="checkout.php" method="POST">
        <button type="submit" id="checkout-button">Checkout</button>
      </form>
    </section>
  </body>
</html>