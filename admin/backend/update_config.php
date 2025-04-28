<?php
include("functions.php"); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $favicon = $_POST['favicon'];

    $stmt = $GLOBALS['conn']->prepare("UPDATE config SET title=?, favicon=? LIMIT 1");
    $stmt->bind_param("ss", $title, $favicon);

    if ($stmt->execute()) {
        echo "Settings updated successfully!";
    } else {
        echo "Failed to update settings.";
    }

    $stmt->close();
}
?>
