<?php
    include("connectDB.php");
    include("functions.php");

    $user_id = $_SESSION['user_id'];
    // Get the raw POST data
    $post_data = file_get_contents('php://input');

    // Decode JSON into an associative array
    $job = json_decode($post_data, true);

    $result = search_jobs($job['job_id']);

    echo json_encode($result);


?>