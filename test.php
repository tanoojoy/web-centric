<?php
include("backend/connectDB.php");
session_start();
$profile = get_user_profile($_SESSION['user_id']);
// $profile = get_user_profile('5ba060aa-896f-11ef-aa5d-acde48001122');

echo $profile['location'];

function get_user_profile($id){
    $sql = "SELECT * FROM `users` WHERE `user_id`= '$id'";
    
    $user = $GLOBALS['conn']->query($sql);
    $profile = [];
    if ($user->num_rows > 0) { // Check if any records were found
        $row = $user->fetch_assoc();
        $profile = [
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'headline' => $row['headline'],
            'summary' => $row['summary'],
            'location' => $row['location'],
            'current_position' => $row['current_position'],
            'current_company' => $row['current_company'],
            'connections_count' => $row['connections_count']
        ];
        
    } else {
        echo "Fuck up";
    }

    $GLOBALS['conn']->close();
    
    return $profile;
}



?>