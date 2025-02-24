<?php
    $id = $_SESSION['user_id'];

    // echo $id;
    include("connectDB.php");
    
    // Get form input
    $title = $_POST['title'];
    $description = $_POST['description']; 
    $location = $_POST['location'];
    $type = $_POST['type'];

    // echo $type;

    $sql = "INSERT INTO jobposting (job_id, company_id, title, description, location, employment_type) VALUES (UUID(), 3, '$title', '$description', '$location', '$type')";
    // echo $sql;
    // Prepare the statement
    $stmt = $conn->query($sql);

    // Execute the statement
    if ($stmt === TRUE) {
        $conn->close();
        // echo "Job posting successfully added.";
        header("Location: ../home.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $conn->close();

    header("Location: ../home.php");
    exit();

?>