<?php
include("connectDB.php");

function search_jobs($keyword = null, $location = null, $emp_type =  null, $expiry_date =  null){
    $sql = "";
    $reponse = [];
    //no arguments. Fetch ALL jobs
    if (!(isset($keyword) && isset($location) && isset($emp_type) && isset($expiry_date))) {
        $sql = "SELECT jobposting.job_id, jobposting.title, jobposting.description, jobposting.location, jobposting.employment_type, jobposting.work_level, jobposting.experience_needed, company.name AS company_name, company.logo
                FROM jobposting
                JOIN company ON jobposting.company_id = company.company_id;";
    }
    
    //only keyword argument, search jobs with keyword
    if(isset($keyword) && !(isset($location) && isset($emp_type) && isset($expiry_date))){
        $sql = "SELECT jobposting.job_id, jobposting.title, jobposting.description, jobposting.location, jobposting.employment_type, jobposting.work_level, jobposting.experience_needed, company.name AS company_name, company.logo
                FROM jobposting
                JOIN company ON jobposting.company_id = company.company_id
                WHERE INSTR(jobposting.title, '" . $keyword . "') > 0 
                    OR INSTR(jobposting.description, '" . $keyword . "') > 0 
                    OR INSTR(jobposting.location, '" . $keyword . "') > 0 
                    OR INSTR(company.name, '" . $keyword . "') > 0;";
    }

    //search jobs by id
    if(isset($id)){
        $sql = "SELECT jobposting.job_id, jobposting.title, jobposting.description, jobposting.location, jobposting.employment_type, jobposting.work_level, jobposting.experience_needed, company.name AS company_name, company.logo
                FROM jobposting
                JOIN company ON jobposting.company_id = company.company_id
                WHERE jobposting.job_id = '" . $id ."';";
    }

    $jobpostings = $GLOBALS['conn']->query($sql);

    if ($jobpostings->num_rows > 0) { // Check if any records were found
        while($row = $jobpostings->fetch_assoc()) {  //store the SQL row in a variable $row
            
            $job = [
                'job_id'                => $row['job_id'],
                'job_title'             => $row['title'],
                'job_description'       => $row['description'],
                'job_location'          => $row['location'],
                'company_name'          => $row['company_name'],
                'company_logo'          => $row['logo'],
                'job_experience_needed' => $row['experience_needed'],
                'job_work_level'        => $row['work_level'],
                'job_employment_type'   => $row['employment_type']
            ];
            
            array_push($reponse, $job);
        }
    } 

    return $reponse;
}


function get_one_job($job_id){
    if(isset($job_id)){
        $sql = "SELECT jobposting.job_id, jobposting.title, jobposting.description, jobposting.overview, jobposting.location, jobposting.salary, jobposting.employment_type, jobposting.work_level, jobposting.experience_needed, jobposting.no_of_applications, company.name AS company_name, company.logo, company.location
                FROM jobposting
                JOIN company ON jobposting.company_id = company.company_id
                WHERE jobposting.job_id = '" . $job_id ."';";
    }

    // return $sql;

    $job = $GLOBALS['conn']->query($sql);
    if ($job->num_rows > 0) {
        $row = $job->fetch_assoc();

        return json_encode($row);
    }
}

function job_count($type){
    $sql = "SELECT COUNT(*) FROM jobposting WHERE employment_type = '$type';";
    $count = $GLOBALS['conn']->query($sql);

    if($count->num_rows > 0){
        $row = $count->fetch_assoc();
        return $row['COUNT(*)'];
    }
    else{
        return 0;
    }
}

function work_level_count($level){
    $sql = "SELECT COUNT(*) FROM jobposting WHERE work_level = '$level';";
    $count = $GLOBALS['conn']->query($sql);

    if($count->num_rows > 0){
        $row = $count->fetch_assoc();
        return $row['COUNT(*)'];
    }
    else{
        return 0;
    }
}

function salary_range_count($min, $max){
    $sql = "SELECT COUNT(*) FROM jobposting WHERE salary >=  '$min' AND salary <= '$max';";
    $count = $GLOBALS['conn']->query($sql);

    if($count->num_rows > 0){
        $row = $count->fetch_assoc();
        return $row['COUNT(*)'];
    }
    else{
        return 0;
    }
}

function filter_jobs($filter){
    $response = [
        'main' => [],
        'overview' => []
    ];
    // return $filter['employment_type'][0];
    // // return $x;
    $sql = "SELECT jobposting.job_id, jobposting.title, jobposting.description, jobposting.location, jobposting.employment_type, jobposting.work_level, jobposting.experience_needed, jobposting.salary, company.name AS company_name, company.logo, COUNT(*) OVER() AS total_count
                FROM jobposting
                JOIN company ON jobposting.company_id = company.company_id";

    $conditions = [];

    // Filter by employment type
    if (!empty($filter['employment_type'])) {
        $types = array_map(fn($filter) => "'" . addslashes($filter) . "'", $filter['employment_type']);
        $conditions[] = "jobposting.employment_type IN (" . implode(", ", $types) . ")";
    }

    // Filter by work level
    if (!empty($filter['work_level'])) {
        $levels = array_map(fn($filter) => "'" . addslashes($filter) . "'", $filter['work_level']);
        $conditions[] = "jobposting.work_level IN (" . implode(", ", $levels) . ")";
    }

    // Filter by salary range
    if (!empty($filter['salary_range'])) {
        $salaryConditions = [];
    
        $min = $filter['salary_range']['minSalary'];
        $max = $filter['salary_range']['maxSalary'];
        $salaryConditions[] = "(jobposting.salary BETWEEN $min AND $max)";
            
        
        if (!empty($salaryConditions)) {
            $conditions[] = "(" . implode(" OR ", $salaryConditions) . ")";
        }
    }

    // Append conditions to SQL query
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    $results = $GLOBALS['conn']->query($sql);

    if ($results->num_rows > 0) { // Check if any records were found
        while($row = $results->fetch_assoc()) {
            $job_main = "<div id=\"" . $row['job_id'] . "\"class=\"job-card\">
                            <div class=\"job-card-header\">
                                <img src=\"img/" . $row['logo'] . "\" width=\"46\" height=\"46\">
                                <div class=\"menu-dot\"></div>
                            </div>
                            <div class=\"job-card-title\">" . $row['title'] . "</div>
                            <div class=\"job-card-subtitle\">" . $row['description'] . "</div>
                            <div class=\"job-detail-buttons\">
                                <button class=\"search-buttons detail-button\">" . $row['employment_type'] . "</button>
                                <button class=\"search-buttons detail-button\">" . $row['experience_needed'] . "</button>
                                <button class=\"search-buttons detail-button\">" . $row['work_level'] . "</button>
                            </div>
                            <div class=\"job-card-buttons\">
                                <button class=\"search-buttons card-buttons\">Apply Now</button>
                                <button class=\"search-buttons card-buttons-msg\">Save Job</button>
                            </div>
                        </div>
                        <input id=\"result_count\" type=\"hidden\" value=\"". $row['total_count'] ."\"/>";
            array_push($response['main'], $job_main);

            $job_overview = "<div id=\"overview_" . $row['job_id'] . "\"class=\"job-overview-card\">
                                <div class=\"job-card overview-card\">
                                    <div class=\"overview-wrapper\">
                                        <img src=\"img/" . $row['logo'] . "\" width=\"42\" height=\"42\">
                                        <div class=\"overview-detail\">
                                            <div class=\"job-card-title\">" . $row['title'] . "</div>
                                            <div class=\"job-card-subtitle\">" . $row['location'] . "</div>
                                        </div>
                                    </div>
                                    <div class=\"job-overview-buttons\">
                                        <div class=\"search-buttons time-button\">" . $row['employment_type'] . "</div>
                                        <div class=\"search-buttons level-button\">" . $row['work_level'] . "</div>
                                        <div class=\"job-stat\">New</div>
                                        <div class=\"job-day\">4d</div>
                                    </div>
                                </div>
                            </div>";
            array_push($response['overview'], $job_overview);
        }
    }

    return json_encode($response);
    // return $sql;
}

function get_skills(){
    $sql = "SELECT skill_name FROM `skills` WHERE 1";
    
    $skills = $GLOBALS['conn']->query($sql);
    
    if ($skills->num_rows > 0) { // Check if any records were found
        $list = [];
        while($row = $skills->fetch_assoc()) { 
            array_push($list, $row['skill_name']);
        }
    } else {
        echo "No skills found";
    }
    
    return $list;
}

function get_user_profile($id){
    $sql = "SELECT * FROM `users` WHERE `user_id`='$id'";
    
    $user = $GLOBALS['conn']->query($sql);
    $profile = [];
    if ($user->num_rows > 0) { // Check if any records were found
        $row = $user->fetch_assoc();
        $profile = [
            'username' => $row['username'],
            'email' => $row['email'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'headline' => $row['headline'],
            'summary' => $row['summary'],
            'industry' => $row['industry'],
            'location' => $row['location'],
            'current_position' => $row['current_position'],
            'current_company' => $row['current_company'],
            'connections_count' => $row['connections_count']
        ];
        
    } else {
        $profile = NULL;
    }
    
    return $profile;
}

function get_all_users(){

}

function get_header(){
    echo "<!-- Navigation Bar -->
            <header>
                <nav>
                    <div class=\"logo\">Talent<b>Hub</b></div>
                    <div class=\"search-bar\">
                            <form action=\"search_results.php\" method=\"post\" class=\"form\">
                                <input type=\"text\" name=\"keyword\" placeholder=\"Search for jobs, companies...\">
                                <button type=\"submit\">
                                <img src=\"img/searchButton.png\" alt=\"Search Icon\" />
                                </button>
                            </form>
                    </div>
                    <div>
                        <ul class=\"links\">
                            <li><a href=\"home.php\">Home</a></li>
                            <li><a href=\"#\">Network</a></li>
                            <li><a href=\"#\">Work</a></li>
                            <li><a href=\"home.php\">Jobs</a></li>
                            <li><a href=\"#\">Messages</a></li>
                            <li><a href=\"#\">Notifications</a></li>
                            <li><a href=\"profile.php\">Profile</a></li>
                            <li><a href=\"pricing.php\">My Premium</a></li>
                            
                        </ul>
                    </div>
                    <div class=\"logout\">
                        <form action=\"backend/logout.php\" method=\"POST\" class=\"logout-form\">
                            <input type=\"hidden\" name=\"logout\" value=\"true\">
                                <button type=\"submit\" class=\"logout-btn\">
                                    <img src=\"img/logoutButton.png\" alt=\"Logout\" class=\"logout-icon\"> 
                                    <p>Logout</p>
                                </button>
                        </form>
                    </div>  
                </nav>
            </header>";
}

function get_sidebar($id){
    $profile = get_user_profile($id);

    echo '<!-- Sidebar -->
            <aside class="sidebar">
            <div class="profile-summary">
                <img src="img/capy.jpeg" alt="Profile Picture" class="profile-pic">
                <h3>'. $profile['username'] .'</h3>
                <p>'. $profile['current_position'] .' at '. $profile['current_company'] .'</p>
            </div>
            <ul class="sidebar-links">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">My Jobs</a></li>
                <li><a href="#">Saved Jobs</a></li>
                <li><a href="https://www.indeed.com/career-advice">Career Advice</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="job-posting.php">Create Job posting</a></li>   
            </ul>
        </aside>';
}

function get_footer(){
    echo '<footer>
            <div class="footerContainer">
                <div class="socialIcons">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-google-plus"></i></a>
                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                </div>

                <div class="footer-Nav">
                    <ul>
                        <li><a href="#">Service</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Learn More</a></li>
                    </ul>
                </div>
            </div>
        </footer>';
}
        

