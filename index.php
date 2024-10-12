<?php
    include("backend/config.php");
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="jquery-3.7.1.min.js"></script>
        <link rel="stylesheet/less" type="text/css" href="css/styles.less" />
        <script src="https://cdn.jsdelivr.net/npm/less" ></script>
        <script src="scripts/mogo.js"></script>
        <title><?php echo $title; ?></title>

        <style>
            /* Overlay style */
            .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            display: none; /* Hidden by default */
            align-items: center;
            justify-content: center;
            z-index: 1000;
            }

            /* Pop-up style */
            .popup {
            background: rgba(255, 255, 255, 0.9); /* White transparent background */
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            position: relative;
            }

            /* Close button style */
            .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            text-decoration: none;
            color: #333;
            }

            /* Form style */
            .popup h2 {
            margin-top: 0;
            text-align: center;
            }

            .popup form {
            display: flex;
            flex-direction: column;
            }

            .popup input[type="email"],
            .popup input[type="password"] {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            }

            .popup input[type="submit"] {
            padding: 10px;
            background: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            }

            .popup input[type="submit"]:hover {
            background: #555;
            }

            /* Button to open the pop-up */
            .open-popup-btn {
            padding: 10px 20px;
            background: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            }

            .open-popup-btn:hover {
            background: #555;
            }
        </style>
    </head>

    <body>
        <header class="main-header">
            <div class="header-wrapper">
                <div class="main-logo"><?php  echo $title;  ?></div>
                    <nav>
                        <ul class="main-menu">
                        <li><a href="#section-2">About</a></li>
                        <li><a href="#section-5">Service</a></li>
                        <li><a href="#section-7">Work</a></li>
                        <li ><a onclick="openPopup()">Log In</a></li>
                        <li><a onclick="openPopup2()">Create Account</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <section id="section-1">
            <div class="content-slider">
            <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>
            <input type="radio" id="banner2" class="sec-1-input" name="banner">
            <input type="radio" id="banner3" class="sec-1-input" name="banner">
            <input type="radio" id="banner4" class="sec-1-input" name="banner">
            <div class="slider">
                <div id="top-banner-1" class="banner">
                <div class="banner-inner-wrapper">
                    <h2>Who We Are</h2>
                    <h1>We are<br> <?php echo $title; ?></h1>
                    <div class="line"></div>
                    <div class="learn-more-button"><a onclick="openPopup2()">Learn More</a></div>
                </div>
                </div>
                <div id="top-banner-2" class="banner">
                <div class="banner-inner-wrapper">
                    <h2>What We Do</h2>
                    <h1>Forge<br><?php echo "Connections"; ?></h1>
                    <div class="line"></div>
                    <div class="learn-more-button"><a onclick="openPopup2()">Join Us</a></div>
                </div>
                </div>
                <div id="top-banner-3" class="banner">
                <div class="banner-inner-wrapper">
                    <h2>Here You Are</h2>
                    <h1>Finding<br> a job</h1>
                    <div class="line"></div>
                    <div class="learn-more-button"><a onclick="openPopup2()">Find a job</a></div>
                </div>
                </div>
                <div id="top-banner-4" class="banner">
                <div class="banner-inner-wrapper">
                    <h2>Where We Are</h2>
                    <h1>Mauritius,<br>Singapore, Dubai</h1>
                    <div class="line"></div>
                    <div class="learn-more-button"><a onclick="openPopup2()">Call Us</a></div>
                </div>
                </div>
            </div>
            <nav>
                <div class="controls">
                <label for="banner1"><span class="progressbar"><span class="progressbar-fill"></span></span><span>01</span> Intro</label>
                <label for="banner2"><span class="progressbar"><span class="progressbar-fill"></span></span><span>02</span> Work</label>
                <label for="banner3"><span class="progressbar"><span class="progressbar-fill"></span></span><span>03</span> About</label>
                <label for="banner4"><span class="progressbar"><span class="progressbar-fill"></span></span><span>04</span> Contacts</label>
                </div>
            </nav>
            </div>
        </section>
        <!-- Overlay -->
        <div id="overlay" class="overlay">
        <!-- Pop-up content -->
            <div class="popup">
                <a href="javascript:void(0)" class="close-btn" onclick="closePopup()">&times;</a>
                <h3>Login</h3>
                <form action="backend/sign_in.php" method="POST">
                    <label for="username">Username:</label>
                    <input type="email" name="username" placeholder="Email" required />
                    
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Password" required />
                   
                    <input type="submit" class="submit">
                </form>
            </div>
        </div>
        <div id="overlay2" class="overlay">
        <!-- Pop-up content -->
            <div class="popup">
                <a href="javascript:void(0)" class="close-btn" onclick="closePopup2()">&times;</a>
                <h3>Create Account</h3>
                <form action="backend/sign_up.php" method="POST">
                    <label for="username">Username:</label>
                    <input type="email" name="username" placeholder="Email" required />
                    
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Password" required />
                   
                    <input type="submit" class="submit">
                </form>
            </div>
        </div>
    </body>
</html>
