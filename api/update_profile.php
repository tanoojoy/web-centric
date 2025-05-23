<?php
    session_start();
    $id = $_SESSION['user_id'];

    // echo $id;
    include("../backend/connectDB.php");
    
    // Get form input
    $username = $_POST['username'];
    $fname = $_POST['first_name'];  //rhea
    $lname = $_POST['last_name'];  //bhurtun
    $email = $_POST['email'];
    $headline = $_POST['headline'];
    $summary = $_POST['summary'];
    $location = $_POST['location'];
    $industry = $_POST['industry'];
    $education = $_POST['education'];
    $current_position = $_POST['current_position'];
    $current_company = $_POST['current_company'];
    $skills = [
        'skill_ids' => []
    ];
    foreach($_POST['skills'] as $skill){
        array_push($skills['skill_ids'], (int)$skill);
    }

    $skills = json_encode($skills);
    
    // echo json_encode($username);

    $sql = "UPDATE `users` 
            SET 
                `username` = '$username', 
                `first_name` = '$fname', 
                `last_name` = '$lname', 
                `email` = '$email',
                `headline` = '$headline', 
                `summary` = '$summary', 
                `location` = '$location', 
                `industry` = '$industry', 
                `current_position` = '$current_position', 
                `current_company` = '$current_company', 
                `education` = '$education', 
                `skills` = '$skills', 
                `connections_count` = 2, 
                `profile_visibility` = 'public'
            WHERE `user_id` = '$id';
            ";
    $result = $conn->query($sql);
    echo $sql;

    $_SESSION['username'] = $username;

    $conn->close();
    echo json_encode([
        "Message" => "User ". $username ." Updated",
    ]);
    header("Location: ../home.php");
    exit();

?>