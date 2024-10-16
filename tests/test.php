<?php

session_start();
    $id = $_SESSION['user_id'];

    // echo $id;
    include("connectDB.php");
    
    // Get form input
    $title = $_POST['title'];
    $description = $_POST['description']; 
    $location = $_POST['location'];
    $type = $_POST['type'];

    // echo $type;

    $sql = "INSERT INTO jobposting (job_id, company_id, title, description, location, employment_type) VALUES (UUID(), '$id', '$title', '$description', '$location', '$type')";
    echo $sql;



?>