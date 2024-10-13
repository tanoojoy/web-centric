<?php
    include("backend/connectDB.php");
    
    // Get form input
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name']; 
    $email = $_POST['email'];
    $headline = $_POST['headline'];
    $summary = $_POST['summary'];
    $location = $_POST['location'];
    $industry = $_POST['industry'];
    $education = $_POST['education'];
    $current_position = $_POST['current_position'];
    $current_company = $_POST['current_companny'];

    $skills = [
        'skill_ids' => []
    ];
    foreach($_POST['skills'] as $skill){
        array_push($skills['skill_ids'], (int)$skill);
    }

    $skills = json_encode($skills);

    $sql = "INSERT INTO `users`(`user_id`, `username`, `first_name`, `last_name`, `email`, `password`, `profile_picture`, `headline`, `summary`, `location`, `industry`, `current_position`, `current_company`, `education`, `skills`, `connections_count`, `profile_visibility`) 
    VALUES ('3','tanoojoy','$fname','$lname','$email','password','profile-pi.jpg','$headline', '$summary','$location','$industry','$current_position','$current_company','$education','$skills', 2 ,'public')";
    
    $result = $conn->query($sql);

    if($result === TRUE){
        header("Location: ../homepage.php");
    }
    else{
        header("Location: ../profile.php");
    }

    $conn->close();

?>