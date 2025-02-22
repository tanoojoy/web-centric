<?php
    include("connectDB.php");

    $sql = "SELECT favicon, title FROM config WHERE 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) { // Check if any records were found
        while($row = $result->fetch_assoc()) {  //store the SQL row in a variable $row
            $favicon = $row['favicon'];
            $title = $row['title'];
        }
    } 
    else {
        echo "There was a problem querying the config table";
    }

    // $conn->close();
?>