<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php");
        exit();
    }

    if(!isset($_SESSION['username'])){
        header("Location: profile.php");
        exit();
    }
    // echo 'tanoo';
    //fetch page configurations
    include("backend/config.php");
    include("backend/functions.php");

    $userid = $_SESSION['user_id'];
    $jobs = search_jobs();
    $user = get_user_profile($userid);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="test/text.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .main-feed {
            background-color: white;
            box-shadow: 0 0 0 0;
        }

        .logout-container {
          display: flex;
          align-items: center;
        }

        .logout-btn {
          background: none;
          border: none;
          cursor: pointer;
          padding: 5px;
        }

        .logout-btn svg {
          width: 24px;
          height: 24px;
          stroke: red;
          transition: stroke 0.3s ease;
        }

        .logout-btn:hover svg {
          stroke: darkred;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<div class="job">
    <div class="header">
      <div class="logo">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path xmlns="http://www.w3.org/2000/svg"
            d="M512 503.5H381.7a48 48 0 01-45.3-32.1L265 268.1l-9-25.5 2.7-124.6L338.2 8.5l23.5 67.1L512 503.5z"
            fill="#0473ff" data-original="#28b446" />
          <path xmlns="http://www.w3.org/2000/svg" fill="#0473ff" data-original="#219b38"
            d="M361.7 75.6L265 268.1l-9-25.5 2.7-124.6L338.2 8.5z" />
          <path xmlns="http://www.w3.org/2000/svg"
            d="M338.2 8.5l-82.2 234-80.4 228.9a48 48 0 01-45.3 32.1H0l173.8-495h164.4z" fill="#0473ff"
            data-original="#518ef8" />
        </svg>
        TalentHub
      </div>
      <div class="header-menu">
        <a href="#" class="active">Find Job</a>
        <a href="pricing.php">Premium</a>
        <a href="job-posting.php">Company Only - Create job posting</a>
        <a href="#">Menu 2</a>
        <a href="profile.php">My Profile</a>
      </div>
      <div class="user-settings">
        <div class="dark-light">
          <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
          </svg>
        </div>

        <div class="logout-container">
          <a href="backend/logout.php" method="POST" class="logout-btn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
              <polyline points="16 17 21 12 16 7" />
              <line x1="21" y1="12" x2="9" y2="12" />
            </svg>
          </a>
        </div>


        
        <div class="user-name"><?php echo $user['first_name'] . " " . $user['last_name'] ?></div>
      </div>
    </div>
    <div class="wrapper">
      <div class="search-menu">
        <div class="search-bar">
          
          <input type="text" class="search-box" name="search" placeholder="Search Jobs" autofocus/>
        </div>
        <div class="search-location">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" />
            <circle cx="12" cy="10" r="3" />
          </svg>
          Londontowne, MD
        </div>
        <div class="search-job">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
            <rect x="2" y="7" width="20" height="14" rx="2" ry="2" />
            <path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16" />
          </svg>
          <input type="text" placeholder="Job Type">
        </div>
        <div class="search-salary">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="currentColor"
            stroke-width=".4">
            <path
              d="M12.6 18H9.8a.8.8 0 010-1.5h2.8a.9.9 0 000-1.8h-1.2a2.4 2.4 0 010-4.7h2.8a.8.8 0 010 1.5h-2.8a.9.9 0 000 1.8h1.2a2.4 2.4 0 010 4.7z"
              stroke="currentColor" />
            <path
              d="M12 20a.8.8 0 01-.8-.8v-2a.8.8 0 011.6 0v2c0 .5-.4.8-.8.8zM12 11.5a.8.8 0 01-.8-.8v-2a.8.8 0 011.6 0v2c0 .5-.4.8-.8.8z"
              stroke="currentColor" />
            <path
              d="M21.3 23H2.6A2.8 2.8 0 010 20.2V3.9C0 2.1 1.2 1 2.8 1h18.4C22.9 1 24 2.2 24 3.8v16.4c0 1.6-1.2 2.8-2.8 2.8zM2.6 2.5c-.6 0-1.2.6-1.2 1.3v16.4c0 .7.6 1.3 1.3 1.3h18.4c.7 0 1.3-.6 1.3-1.3V3.9c0-.7-.6-1.3-1.3-1.3z"
              stroke="currentColor" />
            <path d="M23.3 6H.6a.8.8 0 010-1.5h22.6a.8.8 0 010 1.5z" stroke="currentColor" />
          </svg>
          <input type="text" placeholder="Salary Range">
        </div>
        <button class="search-button">Find Job</button>
      </div>
      <div class="main-container">
        <div class="search-type">
          <div class="job-time">
            <div class="job-time-title">Type of Employment</div>
            <div class="job-wrapper">
              <div class="type-container">
                <input type="checkbox" id="fulltime" class="job-style">
                <label for="fulltime">Full Time Jobs</label>
                <span class="job-number"><?php echo job_count("Full Time"); ?></span>
              </div>
              <div class="type-container">
                <input type="checkbox" id="parttime" class="job-style">
                <label for="parttime">Part Time Jobs</label>
                <span class="job-number"><?php echo job_count("Part Time"); ?></span>
              </div>
              <div class="type-container">
                <input type="checkbox" id="internship" class="job-style">
                <label for="internship">Internship Jobs</label>
                <span class="job-number"><?php echo job_count("Internship"); ?></span>
              </div>
            </div>
          </div>
          <div class="job-time">
            <div class="job-time-title">Seniority Level</div>
            <div class="job-wrapper">
              <div class="type-container">
                <input type="checkbox" id="student" class="job-style">
                <label for="student">Student Level</label>
                <span class="job-number"><?php echo work_level_count("Student Level") ?></span>
              </div>
              <div class="type-container">
                <input type="checkbox" id="entry" class="job-style">
                <label for="entry">Entry Level</label>
                <span class="job-number"><?php echo work_level_count("Entry Level") ?></span>
              </div>
              <div class="type-container">
                <input type="checkbox" id="mid" class="job-style">
                <label for="mid">Mid Level</label>
                <span class="job-number"><?php echo work_level_count("Mid Level") ?></span>
              </div>
              <div class="type-container">
                <input type="checkbox" id="senior" class="job-style">
                <label for="senior">Senior Level</label>
                <span class="job-number"><?php echo work_level_count("Senior Level") ?></span>
              </div>
            </div>
          </div>
          <div class="job-time">
            <div class="job-time-title">Salary Range</div>
            <div class="job-wrapper">
              <div class="type-container">
                <input type="checkbox" id="job1" class="job-style">
                <label for="job1">Rs15000 - Rs18000</label>
                <span class="job-number"><?php echo salary_range_count(15000, 18000); ?></span>
              </div>
              <div class="type-container">
                <input type="checkbox" id="job2" class="job-style">
                <label for="job2">Rs18001 - Rs20000</label>
                <span class="job-number"><?php echo salary_range_count(18001, 20000); ?></span>
              </div>
              <div class="type-container">
                <input type="checkbox" id="job3" class="job-style">
                <label for="job3">Rs20001 - Rs22000</label>
                <span class="job-number"><?php echo salary_range_count(20001, 22000); ?></span>
              </div>
              <div class="type-container">
                <input type="checkbox" id="job4" class="job-style">
                <label for="job4">Rs22001 - Rs24000</label>
                <span class="job-number"><?php echo salary_range_count(22001, 24000); ?></span>
              </div>
              <div class="type-container">
                <input type="checkbox" id="job5" class="job-style">
                <label for="job5">Rs24001 - Rs26000</label>
                <span class="job-number"><?php echo salary_range_count(24001, 26000); ?></span>
              </div>
              <div class="type-container">
                <input type="checkbox" id="job6" class="job-style">
                <label for="job6">Rs26001 - Rs28000</label>
                <span class="job-number"><?php echo salary_range_count(26001, 28000); ?></span>
              </div>
              <div class="type-container">
                <input type="checkbox" id="job6" class="job-style">
                <label for="job6">Rs28001 - Rs30000</label>
                <span class="job-number"><?php echo salary_range_count(28001, 30000); ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="searched-jobs">
          <div class="searched-bar">
            <div class="searched-show">Showing <?php echo count($jobs); ?> Jobs</div>
            <div class="searched-sort">Sort by: <span class="post-time">Newest Post </span><span
                class="menu-icon">▼</span></div>
          </div>
          <div class="job-cards">
            <?php
                foreach($jobs as $job){
                    echo "<div id=\"" . $job['job_id'] . "\"class=\"job-card\">
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
                }
                $conn->close();
            ?>
          </div>
          <div class="job-overview">
            <div class="job-overview-cards">
                <?php
                    foreach($jobs as $job){
                        echo "<div id=\"overview_" . $job['job_id'] . "\"class=\"job-overview-card\">
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
                    }
                ?>
            </div>
            <div class="job-explain">
              <img class="job-bg" alt="">
              <div class="job-logos">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="background-color:#f76754">
                  <path xmlns="http://www.w3.org/2000/svg" d="M0 .5h4.2v23H0z" fill="#042b48" data-original="#212121">
                  </path>
                  <path xmlns="http://www.w3.org/2000/svg" d="M15.4.5a8.6 8.6 0 100 17.2 8.6 8.6 0 000-17.2z"
                    fill="#fefefe" data-original="#f4511e"></path>
                </svg>
              </div>
              <div class="job-explain-content">
                <div class="job-title-wrapper">
                  <div class="job-card-title">UI /UX Designer</div>
                  <div class="job-action">
                    <svg class="heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-heart">
                      <path
                        d="M20.8 4.6a5.5 5.5 0 00-7.7 0l-1.1 1-1-1a5.5 5.5 0 00-7.8 7.8l1 1 7.8 7.8 7.8-7.7 1-1.1a5.5 5.5 0 000-7.8z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2">
                      <circle cx="18" cy="5" r="3" />
                      <circle cx="6" cy="12" r="3" />
                      <circle cx="18" cy="19" r="3" />
                      <path d="M8.6 13.5l6.8 4M15.4 6.5l-6.8 4" />
                    </svg>
                  </div>
                </div>
                <div class="job-subtitle-wrapper">
                  <div class="company-name"><div id="company-name">Patreon </div><span class="comp-location">Londontowne, MD.</span></div>
                  <div class="posted">Posted 8 days ago<span class="app-number">98 Application</span></div>
                </div>
                <div class="explain-bar">
                  <div class="explain-contents">
                    <div class="explain-title">Experience</div>
                    <div class="explain-subtitle overview-experience">Minimum 1 Year</div>
                  </div>
                  <div class="explain-contents">
                    <div class="explain-title">Work Level</div>
                    <div class="explain-subtitle overview-work-level">Senior level</div>
                  </div>
                  <div class="explain-contents">
                    <div class="explain-title">Employee Type</div>
                    <div class="explain-subtitle overview-employment-type">Full Time Jobs</div>
                  </div>
                  <div class="explain-contents">
                    <div class="explain-title">Offer Salary</div>
                    <div class="explain-subtitle overview-salary">$2150.0 / Month</div>
                  </div>
                </div>
                <div class="overview-text">
                  <div class="overview-text-header">Overview</div>
                  <div class="overview-text-subheader">We believe that design (and you) will be critical to the company's
                    success. You will work with our founders and our early customers to help define and build our product
                    functionality, while maintaining the quality bar that customers have come to expect from modern SaaS
                    applications. You have a strong background in product design with a quantitavely anf qualitatively
                    analytical mindset. You will also have the opportunity to craft our overall product and visual
                    identity and should be comfortable to flex into working.</div>
                </div>
                <div class="overview-text">
                  <div class="overview-text-header">Job Description</div>
                  <div class="overview-text-item">3+ years working as a product designer.</div>
                  <div class="overview-text-item">A portfolio that highlights your approach to problem solving, as well as
                    you skills in UI.</div>
                  <div class="overview-text-item">Experience conducting research and building out smooth flows.</div>
                  <div class="overview-text-item">Excellent communication skills with a well-defined design process.</div>
                  <div class="overview-text-item">Familiarity with design tools like Sketch and Figma</div>
                  <div class="overview-text-item">Up-level our overall design and bring consistency to end-user facing
                    properties</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="test/test.js"></script>