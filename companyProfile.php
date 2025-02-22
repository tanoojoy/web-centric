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

    $userid = $_SESSION['user_id'];
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
    <?php 
        get_header();
    ?>
    <div class="main-feed">
        <div class="profile-container">
            <form action="backend/update_profile.php" method="POST" enctype="multipart/form-data">
                <div class="profile-pic-section">
                    <img src="img/cat.webp" alt="Profile Picture" class="profile-pic">
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
    </div>
    <?php
        get_footer();
    ?>
</body>
</html>
