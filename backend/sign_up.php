<?php
include("connectDB.php");

// Get form input
$user = $_POST['username'];  // Example: tejal@uom.com
$pass = $_POST['password'];  // Example: tejal

// Hash the password
$hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

$sql = "INSERT INTO users (user_id, email, password) VALUES (UUID(), '$user', '$hashed_pass')";
$result = $conn->query($sql);

// Check if the insert was successful
if ($result === TRUE) {
    
    $sql = "SELECT `user_id`, `username` FROM `users` WHERE `email`='$user'";
    $response = $conn->query($sql);
    $row = $response->fetch_assoc();

    session_start();
    $_SESSION['user_id'] = $row['user_id'];
   //  $_SESSION['username'] = $row['username'];
    
    // Redirect to homepage
    header("Location: ../home.php");
    exit();
} else {
    // Handle errors during insertion
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
