<?php
include("connectDB.php");

//Get form input
$user = $_POST['username'];
$pass = $_POST['password'];

//Hash the password
$hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

// Insert into database
$sql = "INSERT INTO test_login (user_id, username, password) VALUES (UUID(), '$user', '$hashed_pass')";

if ($conn->query($sql) === TRUE) {
   header("Location: ../index.php");
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
