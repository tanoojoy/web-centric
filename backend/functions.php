<?php
include("connectDB.php");

function get_all_jobs(){
    $reponse = [];
    $sql = "SELECT jobposting.title, jobposting.description, jobposting.location, company.name AS company_name
    FROM jobposting
    JOIN company ON jobposting.company_id = company.company_id;";

    $jobpostings = $GLOBALS['conn']->query($sql);

    if ($jobpostings->num_rows > 0) { // Check if any records were found
        while($row = $jobpostings->fetch_assoc()) {  //store the SQL row in a variable $row
            $job_title = $row['title'];
            $job_description = $row['description'];
            $job_location = $row['location'];
            $company_name = $row['company_name'];

            $job = [
                'job_title'       => $row['title'],
                'job_description' => $row['description'],
                'job_location'    => $row['location'],
                'company_name'    => $row['company_name']
            ];
            
            array_push($reponse, $job);
        }
    } 
    else {
        echo "There are no jobs available.";
    }

    return $reponse;
}

?>