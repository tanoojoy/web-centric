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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/job-application.css">
</head>
<body>
    <!-- Navigation Bar -->
    <?php
        get_header();
    ?>
    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar -->
        <?php
            get_sidebar($userid);
        ?>

        <!-- Main Feed -->
        <div class="main-feed">
            <div class="Description">
                <h2> Job Description</h2>
                <p>We are looking for a talented and motivated Frontend Developer to join our dynamic team. As a Frontend Developer, you will be responsible for building responsive and user-friendly web applications that deliver great user experiences. You will collaborate closely with our UI/UX designers and backend developers to bring designs to life and ensure the smooth functionality of the website.</p>
                <p><strong>Responsibilities:</strong></p>
                <ul>
                    <li>Develop responsive web applications using HTML, CSS, and JavaScript.</li>
                    <li>Collaborate with UI/UX designers to implement engaging designs.</li>
                    <li>Work with backend teams to integrate APIs and ensure a seamless data flow.</li>
                    <li>Optimize websites for performance, scalability, and user experience.</li>
                    <li>Test and debug frontend issues, ensuring compatibility across browsers.</li>
                    <li>Write clean, maintainable, and efficient code.</li>
                </ul>
                <p><strong>Required Skills:</strong></p>
                <ul>
                    <li>Strong proficiency in HTML5, CSS3, and JavaScript.</li>
                    <li>Experience with frontend frameworks like React, Vue.js, or Angular.</li>
                    <li>Familiarity with version control systems like Git.</li>
                    <li>Understanding of web accessibility standards and SEO best practices.</li>
                </ul>
                <p><strong>Qualifications:</strong></p>
                <ul>
                    <li>Bachelor’s degree in Computer Science, IT, or a related field (or equivalent experience).</li>
                    <li>At least 2 years of experience in frontend development with a solid portfolio of projects.</li>
                </ul>
                <div class="application">
                    <h2>Job Application Form </h2>  
                    <div class="center-form"> 
                        <form action="" >
                            <input type="file" id="myFile" name="filename">
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
    get_footer();
?>
</html>