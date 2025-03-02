<?php
    include "functions.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data) {
            echo filter_jobs($data);
        } else {
            echo "Invalid JSON received.";
        }
    }