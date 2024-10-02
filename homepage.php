?<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }
    else{
        $username = $_SESSION['username'];
    }

?>
 
 <link rel="stylesheet" href="homepage.css">
 <div class="landing-page">
    <header>
        <div class="container">
        <a href="#" class="logo">Your <b>Website</b></a>
        <ul class="links">
            <li>Home</li>
            <li>About Us</li>
            <li>Work</li>
            <li><?php echo "Welcome ". $username;  ?></li>
            <li>
                <form method="post" action="backend/logout.php">
                    <button type="submit" name="logout">Logout</button>
                </form>
            </li>
        </ul>
        </div>
    </header>
    <div class="content">
        <div class="container">
        <div class="info">
            <h1>Looking For Inspiration</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus odit nihil ullam nesciunt quidem iste, Repellendus odit nihil</p>
            <button>Button name</button>
        </div>
        <div class="image">
            <img src="img/001234.png">
        </div>
        </div>
    </div>
</div>