<?php
    include "../backend/functions.php";
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if ($data) {
            echo get_all_users();
        } else {
            echo "Something went wrong.";
        }
    }