<?php
session_start();
include("connectDB.php");

$current_user_id = $_SESSION['user_id'];
$search = mysqli_real_escape_string($conn, $_POST['search']);

$sql = "SELECT user_id, first_name, last_name, username 
        FROM users 
        WHERE user_id != '$current_user_id' 
        AND (username LIKE '%$search%' 
             OR first_name LIKE '%$search%' 
             OR last_name LIKE '%$search%')";

$result = $conn->query($sql);

$output = '';
while($user = $result->fetch_assoc()) {
    $output .= '<li data-userid="'.$user['user_id'].'">'.
               $user['first_name'].' '.$user['last_name'].
               '<span class="username">@'.$user['username'].'</span></li>';
}

echo $output;
$conn->close();
?>