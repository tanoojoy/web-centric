<?php
    
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session itself

    header("Location: ../index.php");
    exit();

?>
