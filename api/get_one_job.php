<?php
    include "../backend/functions.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data) {
            header("Content-Type: application/json");
            echo get_one_job($data['job_id']);
        } else {
            echo "Invalid JSON received.";
        }
    }