<?php
    include("connectDB.php");

    $firstame = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $headline = $_POST['headline'];
    $summary = $_POST['summary'];
    $location = $_POST['location'];

    echo $firstame;

?>