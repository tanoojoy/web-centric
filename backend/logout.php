<?php
session_start();

if (isset($_POST['logout'])) {
    
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session itself

    header("Location: index.php");
    exit();
}
?>