<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['company'])) {
        header("Location: index.php");
        exit();
    }
    else{
        $username = $_SESSION['company'];
        
        //fetch page configurations
        include("backend/config.php");
        include("backend/functions.php");
        include("backend/logout.php");
        
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile - <?php echo $company['company_name']; ?></title>
    <link rel="stylesheet" href="css/company-profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>

<header>
    <nav>
        <div class="logo">Talent<b>Hub</b></div>
        <ul class="links">
            <li><a href="/">Home</a></li>
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
                    <img src="img/logoutButton.png" alt="Logout" class="logout-icon"> <b>Logout</b>
                </button>
            </form>
        </div>
    </nav>
</header>

<div class="profile-container">
    <form action="backend/update_company_profile.php" method="POST" enctype="multipart/form-data">

        <!-- Company Banner & Logo Section -->
        <div class="company-banner">
            <img src="company_logos/<?php echo $company['logo']; ?>" alt="Company Logo" class="company-logo">
        </div>

        <!-- Company Details Card -->
        <div class="company-info-card">
            <div class="company-info-header">
                <h2><?php echo $company['company_name']; ?></h2>
                <small>Founded: <?php echo $company['founded_year']; ?></small>
            </div>

            <div class="company-details">
            <label for="industry"><strong>Industry:</strong></label>
            <select name="industry" id="industry" required>
                <option value="Information and Technology">Information and Technology</option>
                <option value="Finance">Fianance</option>
                <option value="Healthcare">Healthcare</option>
                <option value="Sales">Sales</option>
                <option value="Marketing">Marketing</option>
                <option value="Education">Education</option>
            </select>

                <label for="location"><strong>Location:</strong></label>
                    <select name="loaction" id="location" required>
                        <option value="North">North</option>
                        <option value="South">South</option>
                        <option value="East">East</option>
                        <option value="West">West</option>
                    </select>

                <label for="description"><strong>Company Description:</strong></label>
                <textarea name="description" id="description" rows="4"></textarea>

                <label for="website"><strong>Website:</strong></label>
                <input type="url" name="website" id="website" >

            </div>
        </div>

        <!-- Submit Button -->
        <div class="submit-section">
            <button type="submit" class="submit-btn">Update Company Profile</button>
        </div>

    </form>
</div>

</body>
</html>
