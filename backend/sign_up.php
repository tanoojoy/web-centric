<?php
include("connectDB.php");

//Get form input
$user = $_POST['username'];     //tejal@uom.com
$pass = $_POST['password'];  //tejal

//Hash the password
$hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

// Insert into database
$sql = "INSERT INTO test_login (user_id, username, password) VALUES (UUID(), '$user', '$hashed_pass')";

if ($conn->query($sql) === TRUE) {
   
   $conn->close();
   session_start(); 
   
   $_SESSION['username'] = $user; 
   header("Location: ../homepage.php");
   
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection

?>
