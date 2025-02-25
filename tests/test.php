<?php

    include("../backend/connectDB.php");
    
    function job_count($type){
        $sql = "SELECT COUNT(*) FROM jobposting WHERE employment_type = '$type';";
        $count = $GLOBALS['conn']->query($sql);
    
        if($count->num_rows > 0){
            $row = $count->fetch_assoc();
            return $row['COUNT(*)'];
        }
    }

    $result = job_count("Full Time");

    echo json_encode($result);



?>