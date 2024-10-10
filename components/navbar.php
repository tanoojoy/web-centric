<header>
    <div class="container">
        <a href="#" class="logo">Talent<b> Hub</b></a>
        <ul class="links">
            <li><a href="/">Home</a></li>
            <li>
                <a href="aboutUs.php"> About Us
            </li>
            <li>Work</li>
            <li <?php 
                    if($_SERVER['REQUEST_URI'] == "/login.php"){
                        echo "class=\"active\"";
                    }
                ?>>
                <a href="login.php">Login</a>
            </li>
            <li
                <?php 
                    if($_SERVER['REQUEST_URI'] == "/register.php"){
                        echo "class=\"active\"";
                    }
                ?>>
                <a href="register.php">Create Account</a>
            </li>
        </ul>
    </div>
</header>