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
    

    $userid = $_SESSION['user_id'];
    $user = get_user_profile($userid);
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
    <link rel="stylesheet" href="test/text.css">

    <style>
        .main-feed {
            background-color: white;
            box-shadow: 0 0 0 0;
        }

        .logout-container {
          display: flex;
          align-items: center;
        }

        .logout-btn {
          background: none;
          border: none;
          cursor: pointer;
          padding: 5px;
        }

        .logout-btn svg {
          width: 24px;
          height: 24px;
          stroke: red;
          transition: stroke 0.3s ease;
        }

        .logout-btn:hover svg {
          stroke: darkred;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
    <body>
    <div class="job">
        <div class="header">
        <div class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path xmlns="http://www.w3.org/2000/svg"
                d="M512 503.5H381.7a48 48 0 01-45.3-32.1L265 268.1l-9-25.5 2.7-124.6L338.2 8.5l23.5 67.1L512 503.5z"
                fill="#0473ff" data-original="#28b446" />
            <path xmlns="http://www.w3.org/2000/svg" fill="#0473ff" data-original="#219b38"
                d="M361.7 75.6L265 268.1l-9-25.5 2.7-124.6L338.2 8.5z" />
            <path xmlns="http://www.w3.org/2000/svg"
                d="M338.2 8.5l-82.2 234-80.4 228.9a48 48 0 01-45.3 32.1H0l173.8-495h164.4z" fill="#0473ff"
                data-original="#518ef8" />
            </svg>
            TalentHub
        </div>
        <div class="header-menu">
            <a href="home.php" class="active">Find Job</a>
            <a href="pricing.php">Premium</a>
            <a href="job-posting.php">Company Only - Create job posting</a>
            <a href="#">Menu 2</a>
            <a href="profile.php">My Profile</a>
        </div>
        <div class="user-settings">
            <div class="dark-light">
            <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
            </svg>
            </div>

            <div class="logout-container">
            <a href="backend/logout.php" method="POST" class="logout-btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                <polyline points="16 17 21 12 16 7" />
                <line x1="21" y1="12" x2="9" y2="12" />
                </svg>
            </a>
            </div>


            
            <div class="user-name"><?php echo $user['first_name'] . " " . $user['last_name'] ?></div>
        </div>
        </div>
        

    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar -->
        <?php
            get_sidebar($userid);
        ?>

        <!-- Main Feed -->
        <div class="main-feed">
            <form action="api/update_profile.php" method="POST">
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
                
                    <label for="industry"><strong>Industry:</strong></label>
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
</body>
<script src="test/test.js"></script>

</html>
