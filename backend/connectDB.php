<?php
    // Database connection details
    $servername = "localhost";
    $username = "tanoo";  // default username for phpMyAdmin
    $password = "talenthub123";  // default password for phpMyAdmin (usually empty)
    $dbname = "talenthub.sql";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>