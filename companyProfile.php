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
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/companyProfile.css">
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
            <label class="name" for="company-name"><strong>Company_name:</strong></label>
            <input type="text" name="company_name" id="company_name" required>


            <label class="website" for="website"><strong>Website:</strong></label>
            <input type="website" name="website" id="website" required>

        

            <label for="location"><strong>Location:</strong></label>
            <select name="loaction" id="location">
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

            <label for="description"><strong>Description:</strong></label>
            <input type="text" name="description" id="description">

        </div>

        <div class="submit-section">
            <button type="submit" class="submit-btn">Update Profile</button>
        </div>
    </form>
</div>

</body>
</html>
