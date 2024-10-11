<?php
include("connectDB.php");

function search_jobs($keyword = null, $location = null, $emp_type =  null, $expiry_date =  null){
    $sql = "";
    $reponse = [];
    //no arguments. Fetch ALL jobs
    if (!(isset($keyword) && isset($location) && isset($emp_type) && isset($expiry_date))) {
        $sql = "SELECT jobposting.title, jobposting.description, jobposting.location, company.name AS company_name
                FROM jobposting
                JOIN company ON jobposting.company_id = company.company_id;";
    }
    
    //only keyword argument, search jobs with keyword
    if(isset($keyword) && !(isset($location) && isset($emp_type) && isset($expiry_date))){
        $sql = "SELECT jobposting.title, jobposting.description, jobposting.location, company.name AS company_name
                FROM jobposting
                JOIN company ON jobposting.company_id = company.company_id
                WHERE INSTR(jobposting.title, '" . $keyword . "') > 0 
                    OR INSTR(jobposting.description, '" . $keyword . "') > 0 
                    OR INSTR(jobposting.location, '" . $keyword . "') > 0 
                    OR INSTR(company.name, '" . $keyword . "') > 0;";
    }

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
        if(isset($keyword)){
            echo "There are no jobs that match '$keyword'";
        }
        else{
            echo "There are no jobs available.";
        }
        
    }

    return $reponse;
}

?>