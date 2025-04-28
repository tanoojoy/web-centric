<?php
include("functions.php"); // your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : null;

    require_once("functions.php"); // where your search_jobs() is
    $jobs = search_jobs($keyword);

    header('Content-Type: application/json');
    echo json_encode($jobs);
}
?>
