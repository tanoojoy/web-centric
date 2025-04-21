<?php
    include "../backend/functions.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data) {
            $jobs = search_jobs($data['job']);
            $response = [
                'main' => [],
                'overview' => []
            ];
            foreach($jobs as $job){
                $push_job_main = "<div id=\"" . $job['job_id'] . "\"class=\"job-card\">
                        <div class=\"job-card-header\">
                            <img src=\"img/" . $job['company_logo'] . "\" width=\"46\" height=\"46\">
                            <div class=\"menu-dot\"></div>
                        </div>
                        <div class=\"job-card-title\">" . $job['job_title'] . "</div>
                        <div class=\"job-card-subtitle\">" . $job['job_description'] . "</div>
                        <div class=\"job-detail-buttons\">
                            <button class=\"search-buttons detail-button\">" . $job['job_employment_type'] . "</button>
                            <button class=\"search-buttons detail-button\">" . $job['job_experience_needed'] . "</button>
                            <button class=\"search-buttons detail-button\">" . $job['job_work_level'] . "</button>
                        </div>
                        <div class=\"job-card-buttons\">
                            <button class=\"search-buttons card-buttons\">Apply Now</button>
                            <button class=\"search-buttons card-buttons-msg\">Save Job</button>
                        </div>
                    </div>";

                $push_job_overview = "<div id=\"overview_" . $job['job_id'] . "\"class=\"job-overview-card\">
                                <div class=\"job-card overview-card\">
                                    <div class=\"overview-wrapper\">
                                        <img src=\"img/" . $job['company_logo'] . "\" width=\"42\" height=\"42\">
                                        <div class=\"overview-detail\">
                                            <div class=\"job-card-title\">" . $job['job_title'] . "</div>
                                            <div class=\"job-card-subtitle\">" . $job['job_location'] . "</div>
                                        </div>
                                    </div>
                                    <div class=\"job-overview-buttons\">
                                        <div class=\"search-buttons time-button\">" . $job['job_employment_type'] . "</div>
                                        <div class=\"search-buttons level-button\">" . $job['job_work_level'] . "</div>
                                        <div class=\"job-stat\">New</div>
                                        <div class=\"job-day\">4d</div>
                                    </div>
                                </div>
                            </div>";
                array_push($response['overview'], $push_job_overview);
                array_push($response['main'], $push_job_main);
            }
            echo json_encode($response);
        } else {
            echo "Invalid JSON received.";
        }
    }