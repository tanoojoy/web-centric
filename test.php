<?php
    include("backend/connectDB.php");
    // get skills
    $sql = "SELECT skill_name FROM `skills` WHERE 1";
    
    $skills = $GLOBALS['conn']->query($sql);
    
    if ($skills->num_rows > 0) { // Check if any records were found
        $list = [];
        while($row = $skills->fetch_assoc()) { 
            array_push($list, $row['skill_name']);
        }
        //print_r($list);  // Or echo json_encode($list); if you want a JSON response
    } else {
        echo "No skills found";
    }
    
    $GLOBALS['conn']->close(); // Close the connection

    foreach($list as $skill){
        echo $skill;
    }
    

?>