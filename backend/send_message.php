<?php
session_start();
include("connectDB.php");

$sender = $_SESSION['user_id'];
$receiver = $_POST['receiver_id'];
$message = $conn->real_escape_string($_POST['message']);

// Insert message into database
$sql = "INSERT INTO chat_messages (sender, receiver, message) 
        VALUES ('$sender', '$receiver', '$message')";
$conn->query($sql);

$conn->close();
echo json_encode(['status' => 'success']);
?>