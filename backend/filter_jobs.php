<?php
    include("connectDB.php");
    include("functions.php");

    $user_id = $_SESSION['user_id'];
    // Get the raw POST data
    $post_data = file_get_contents('php://input');

    // Decode JSON into an associative array
    $filter = json_decode($post_data, true);

    $query = filter_jobs_employment_type(trim($filter['employment_type'][0]));

    echo json_encode($query);


?>