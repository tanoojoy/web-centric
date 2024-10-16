<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php");
        exit();
    }

    //fetch page configurations
    include("backend/config.php");
    include("backend/functions.php");

    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/job-posting.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <!-- Header -->
    <?php
        get_header();
    ?>
    <div class="container">
        <?php
            get_sidebar($username);
        ?>
        <div class="main-feed">
        <form action="backend/update_profile.php" method="POST">
            <div class="profile-pic-section">
                <img src="img/capy.jpeg" alt="Profile Picture" class="profile-pic">
            </div>

            <div class="changeOption">
                <input type="file" name="profile_picture" id="profile_picture">
            </div>

            <div class="profile-info">
                <?php
                    $profile = get_user_profile($_SESSION['user_id']);
                ?>
                <label class="fname" for="username"><strong>Username:</strong></label>
                <input type="text" name="username" id="userame" value = "<?php echo $profile['username']; ?>"required>

                <label class="fname" for="first_name"><strong>First Name:</strong></label>
                <input type="text" name="first_name" id="first_name" value = "<?php echo $profile['first_name']; ?> "required>

                <label class="lname" for="last_name"><strong>Last Name:</strong></label>
                <input type="text" name="last_name" id="last_name"  value = "<?php echo $profile['last_name']; ?>"required>

                <label class="email" for="email"><strong>Email:</strong></label>
                <input type="email" name="email" id="email" value = "<?php echo $profile['email']; ?>"required>

                <label for="headline"><strong>Headline:</strong></label>
                <input type="text" name="headline" id="headline" value = "<?php echo $profile['headline']; ?>" >

                <label for="summary"><strong>Summary:</strong></label>
                <textarea name="summary" id="summary" rows="4"><?php echo $profile['summary']; ?></textarea>

                <label for="location"><strong>Location:</strong></label>
                <select name="location" id="location">
                    <option <?php if($profile['location'] == "North"){ echo "selected"; } ?> value="North">North</option>
                    <option <?php if($profile['location'] == "South"){ echo "selected"; } ?> value="South">South</option>
                    <option <?php if($profile['location'] == "East"){ echo "selected"; } ?> value="East">East</option>
                    <option <?php if($profile['location'] == "West"){ echo "selected"; } ?> value="West">West</option>
                </select>
            
                <label for="industry"><strong>Levelndustry:</strong></label>
                <select name="industry" id="industry">
                    <option <?php if($profile['industry'] == "Information and Technology"){ echo "selected"; } ?> value="Information and Technology">Information and Technology</option>
                    <option <?php if($profile['industry'] == "Fianance"){ echo "selected"; } ?> value="Finance">Fianance</option>
                    <option <?php if($profile['industry'] == "Healthcare"){ echo "selected"; } ?> value="Healthcare">Healthcare</option>
                    <option <?php if($profile['industry'] == "Sales"){ echo "selected"; } ?> value="Sales">Sales</option>
                    <option <?php if($profile['industry'] == "Marketing"){ echo "selected"; } ?> value="Marketing">Marketing</option>
                    <option <?php if($profile['industry'] == "Education"){ echo "selected"; } ?> value="Education">Education</option>
                </select>

                <label for="current_position"><strong>Current Position:</strong></label>
                <input type="text" name="current_position" id="current_position" value = "<?php echo $profile['current_position']; ?>">

                <label for="current_company"><strong>Current Company:</strong></label>
                <input type="text" name="current_company" id="current_company" value = "<?php echo $profile['current_company']; ?>">
            
                
                <div class="education">
                    <h3>Education Details</h3>

                    <label for="major"><strong>Degree:</strong></label>
                    <input type="text" name="major" id="major">

                    <label for="level"><strong>Level:</strong></label>
                    <select name="level" id="level">
                        <option value="Sc">Sc</option>
                        <option value="Hsc">Hsc</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Bachelors">Bachelors</option>
                        <option value="Masters">Masters</option>
                        <option value="Phd">Phd</option>
                    </select>

                    <label for="institution"><strong>Institution:</strong></label>
                    <input type="text" name="institution" id="institution" >

                    <label for="field of study"><strong>Field of study:</strong></label>
                    <input type="text" name="field of study" id="field of study">

                    <label for="start date"><strong>Start date:</strong></label>
                    <input type="date" id="start date" name="school-start" value="2024-10-13" min="2000-01-01" max="2025-01-01" />


                    <label for="end date"><strong>End date:</strong></label>
                    <input type="date" id="end date" name="school-end" value="2024-10-13" min="2000-01-01" max="2025-01-01" />

                    <label for="gpa"><strong>GPA:</strong></label>
                    <input type="text" name="gpa" id="gpa">

                    <label for="activities"><strong>Activities:</strong></label>
                    <input type="text" name="activities" id="activities">

                    <label for="description"><strong>Decription:</strong></label>
                    <input type="text" name="description" id="description">
                </div>

                <label for="skills"><strong>Skills:</strong></label>
                <select name="skills[]" id="skills" multiple>
                    <?php
                        //fetch skills from db
                        $list = get_skills();
                        //loop through each skill
                        foreach($list as $key=>$skill){
                            echo "<option value=\"" . $key + 1 . "\">".$skill . "</option>";
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
        
    </div>
    <?php
        get_footer();
    ?>
</body>
</html>
