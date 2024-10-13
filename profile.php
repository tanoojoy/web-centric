<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }
    else{
        $username = $_SESSION['username'];
        
        //fetch page configurations
        include("backend/config.php");
        include("backend/functions.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

<div class="profile-container">
    <form action="backend/update_profile.php" method="POST" enctype="multipart/form-data">
        <div class="profile-pic-section">
            <img src="img/capy.jpeg" alt="Profile Picture" class="profile-pic">
        </div>

        <div class="changeOption">
            <input type="file" name="profile_picture" id="profile_picture">
        </div>

        <div class="profile-info">
            <label class="fname" for="first_name"><strong>First Name:</strong></label>
            <input type="text" name="first_name" id="first_name" required>

            <label class="lname" for="last_name"><strong>Last Name:</strong></label>
            <input type="text" name="last_name" id="last_name" required>

            <label class="email" for="email"><strong>Email:</strong></label>
            <input type="email" name="email" id="email" required>

            <label for="headline"><strong>Headline:</strong></label>
            <input type="text" name="headline" id="headline" >

            <label for="summary"><strong>Summary:</strong></label>
            <textarea name="summary" id="summary" rows="4"></textarea>

            <label for="location"><strong>Location:</strong></label>
            <select name="location" id="location">
                <option value="North">North</option>
                <option value="South">South</option>
                <option value="East">East</option>
                <option value="West">West</option>
            </select>
           
            <label for="industry"><strong>Industry:</strong></label>
            <select name="industry" id="industry">
                <option value="Information and Technology">Information and Technology</option>
                <option value="Finance">Fianance</option>
                <option value="Healthcare">Healthcare</option>
                <option value="Sales">Sales</option>
                <option value="Marketing">Marketing</option>
                <option value="Education">Education</option>
            </select>

            <label for="current_position"><strong>Current Position:</strong></label>
            <input type="text" name="current_position" id="current_position">

            <label for="current_company"><strong>Current Company:</strong></label>
            <input type="text" name="current_company" id="current_company">

            <label for="education"><strong>Education:</strong></label>
            <input type="text" name="education" id="education">

            <label for="skills"><strong>Skills:</strong></label>
            <select name="skills" id="skills" multiple>
                <?php
                    $list = get_skills();
                    foreach($list as $skill){
                        echo "<option value=\"" . $skill . "\">".$skill . "</option>";
                    }
                ?>
            </select>

            <label for="profile_visibility"><strong>Profile Visibility:</strong></label>
            <select name="profile_visibility" id="profile_visibility">
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>
        </div>

        <div class="submit-section">
            <button type="submit" class="submit-btn">Update Profile</button>
        </div>
    </form>
</div>


<footer>
    <div class="footerContainer">
        <div class="socialIcons">
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-google-plus"></i></a>
            <a href=""><i class="fa-brands fa-youtube"></i></a>
        </div>

        <div class="footer-Nav">
                <ul>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Learn More</a></li>
                </ul>
        </div>

    </div>

</footer>

</body>
</html>
