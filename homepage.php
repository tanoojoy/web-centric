<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }
    else{
        $username = $_SESSION['username'];
        
        //fetch page configurations
        include("backend/config.php");
        include("backend/functions.php");
        include("backend/logout.php");
        
    }
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <!-- tanoo÷ -->

<!-- CSS -->
    <style>

body {
    font-family: Arial, sans-serif;
    background-color: #EEACA9;
}

header {
    background-color:  #fadedc;
    color:  #fadedc;
    padding: 10px 0;
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 100;
    
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 80%;
}

.logo {
  color: #5d5d5d;
  font-style: italic;
  text-transform: uppercase;
  font-size: 20px;
}


.search-bar {
    flex-grow: 1;             
    margin: 0 20px;           
    display: flex;            
    align-items: center;       
}

.search-bar input {
    padding: 8px;             
    width: 100%;              
    max-width: 400px;      
    border-radius: 5px;       
    border: 1px solid #ccc;   
}

.search-bar {
    padding: 8px 15px;        
    border-radius: 5px;       
    border: none;            
    background-color: #fadedc; 
    color:  #fadedc;             
    cursor: pointer;         
    margin-left: 10px;       
    transition: background-color 0.3s; 
}

.search-btn {
    background-color: #fadedc;  
    border: none;                   
    padding: 0;                     
    cursor: pointer; 
    margin-right:10;     
}

.search-btn img {  
    margin-left:10;               
}



.logout {
    margin-left: auto; 
}

.logout-btn {
    background-color: #FADEDC; 
    color: #28258d;
    border: none;
    padding: 5px 10px; 
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    display: flex; 
    align-items: center; 
    font-size: 0.9rem; 
}

.logout-icon {
    width: 16px; 
    height: 16px;
    margin-right: 5px;
}

.logout-btn:hover {
    background-color: white; 
}



nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 80%;
}




.nav-links {
    list-style: none;
    display: flex;
    margin-right: 20px;
}

.nav-links li {
    margin: 0 10px;
}

.nav-links a {
    color: #343C4F;
    text-decoration: none;
    font-size: 1rem;
}

.nav-links a:hover {
    text-decoration: underline;
}

.container {
    display: flex;
    margin-top: 80px; 
}

.sidebar {
    position: fixed; 
    top: 100px;
    width: 275px; 
    height: calc(100vh - 80px); 
    overflow-y: auto; 
    background-color: rgba(219, 205, 201, 0.3);
    padding: 20px;
    border-radius: 7px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.4);
    margin-bottom: 30px;
}

.profile-pic {
    border-radius: 50%;
    width: 100px;
    height: 100px;
    object-fit: cover;
    margin-bottom: 10px;
}

.profile-summary h3 {
    font-size: 1.2rem;
    margin-bottom: 5px;
    color:  #33315d; 
}

.profile-summary p {
    font-size: 0.9rem;
    color: #312e5e; 
}


.sidebar-links {
    list-style: none;
    margin-top: 20px;
}

.sidebar-links li {
    margin-bottom: 15px;
}


a {
    text-decoration: none; 
    color: #6c63ff; 
    font-size: 1rem; 
    transition: color 0.3s ease, transform 0.2s ease; 
}


a:hover {
    color: #5752d1;
    transform: scale(1.05); 
}


a:active {
    color: #4b4f9b; 
}


a:visited {
    color: #8a8a8a; 
}


.sidebar-links a {
    display: block; 
    padding: 10px; 
    border-radius: 5px; 
    color: #282c79;
    font-weight: bold;

}


.sidebar-links a:hover {
    background-color: rgba(108, 99, 255, 0.1); 
}


.main-feed {
    flex: 0 0 300; 
    padding: 20px;
    background-color: #fff;
    margin-left: 500px; 
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 19px;
    
    
}

.main-feed h2 {
    font-size: 1.5rem;
    margin-bottom: 20px;
    text-align:center;
}

.job-post {
    padding: 15px;
    border: 1px solid #ddd;
    margin-bottom: 15px;
    border-radius: 5px;
}

.job-post h3 {
    font-size: 1.2rem;
    margin-bottom: 5px;
}

.apply-btn {
    background-color: #6c63ff;
    color: white;
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.apply-btn:hover {
    background-color: #5752d1; 
}


@media (max-width: 768px) {
    nav {
        flex-direction: column;
    }

    .search-bar input {
        width: 100%; 
    }

    .sidebar {
        width: 100%;
        margin-bottom: 20px;
    }

    .main-feed {
        margin-left: 0; 
        
    }
}

.links {
    list-style-type: none; 
    display: flex; 
    gap: 15px; 
}

.links li a {
    text-decoration: none; 
    color: #5d5d5d; 
    padding: 8px 15px; 
    transition: background-color 0.3s; 
}

.links li a:hover {
    background-color: rgba(255, 255, 255, 0.2); 
    border-radius: 5px; 
}


@media (max-width: 768px) {
    .links {
        flex-direction: column; 
        gap: 10px; 
    }
}

    </style>    




</head>
<body>


    <!-- Navigation Bar -->
    <header>
        <nav>
            <div class="logo">Talent<b>Hub</b></div>
            <div class="search-bar">
                <form class="form">
                 <input type="text" placeholder="Search for jobs, companies...">
                    <button class="search-btn" type="submit"> 
                    <img src="img/search-button.png"  alt="Search" style="width: 20px; height: 20px;">
                 </button> 
                </form> 
            </div>

           
            <div>
                <ul class="links">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Network</a></li>
                    <li><a href="#">Work</a></li>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Messages</a></li>
                    <li><a href="#">Notifications</a></li>
                    <li><a href="profile.php">Profile</a></li>
                </ul>
            </div>

            <div class="logout">
            <form action="backend/logout.php" method="POST">
                <input type="submit" name="logout" value="Logout" class="logout-btn">
                <img src="img/logoutButton.png" alt="Logout" class="logout-icon" style="vertical-align: middle;">
            </form>

            </div>
            
        </nav>
    </header>

    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="profile-summary">
                <img src="profile-pic.jpg" alt="Profile Picture" class="profile-pic">
                <h3><?php echo $username; ?></h3>
                <p>Software Developer at ABC Corp</p>
            </div>
            <ul class="sidebar-links">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">My Jobs</a></li>
                <li><a href="#">Saved Jobs</a></li>
                <li><a href="#">Career Advice</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </aside>

        <!-- Main Feed -->
        <section class="main-feed">
            <h2>Job Recommendations</h2>
            <?php
                $jobs = search_jobs();
                foreach($jobs as $job){
                    echo "<div class=\"job-post\">
                        <h3>" . $job['job_title'] ."</h3>
                        <p>Company: " . $job['company_name'] . "</p>
                        <p>Description: ". $job['job_description'] ."
                        <p>Location: " . $job['job_location'] . "</p>
                        <button class=\"apply-btn\">Apply</button>
                        </div>";
                }
                $conn->close();
            ?>
        </section>
    </div>

    <!-- hgjhj -->
     <!-- hgjhj -->

</body>
</html>

