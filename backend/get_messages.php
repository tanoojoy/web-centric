<?php
session_start();
include("connectDB.php");

$current_user = $_SESSION['user_id'];
$receiver = $_POST['receiver_id'];

// Fetch messages between users
$sql = "SELECT * FROM chat_messages 
        WHERE (sender = '$current_user' AND receiver = '$receiver') 
        OR (sender = '$receiver' AND receiver = '$current_user')
        ORDER BY created_at ASC";
$result = $conn->query($sql);

$messages = [];
while($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

echo json_encode($messages);
$conn->close();
?>