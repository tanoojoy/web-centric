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
        $sql = "SELECT jobposting.title, jobposting.description, jobposting.location, company.name AS company_name
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
    else {
        if(isset($keyword)){
            echo "There are no jobs that match '$keyword'";
        }
        else if(isset($id)){
            echo "No job found with id '$id'";
        }
        else{
            echo "There are no jobs available.";
        }
        
    }

    return $reponse;
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
    $sql = "SELECT * FROM `users` WHERE `user_id`= '$id'";
    
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
                            <li><a href=\"homepage.php\">Home</a></li>
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
?>
