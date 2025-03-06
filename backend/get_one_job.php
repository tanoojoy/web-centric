<?php
    include "functions.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data) {
            echo get_one_job($data['job_id']);
        } else {
            echo "Invalid JSON received.";
        }
    }