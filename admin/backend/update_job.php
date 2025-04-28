<?php
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $job_id = $_POST['job_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $employment_type = $_POST['employment_type'];
    $work_level = $_POST['work_level'];
    $experience_needed = $_POST['experience_needed'];

    $stmt = $GLOBALS['conn']->prepare("UPDATE jobposting SET title=?, description=?, location=?, employment_type=?, work_level=?, experience_needed=? WHERE job_id=?");

    $stmt->bind_param("sssssss", $title, $description, $location, $employment_type, $work_level, $experience_needed, $job_id);

    if ($stmt->execute()) {
        echo "Job updated successfully!";
    } else {
        echo "Failed to update job.";
    }

    $stmt->close();
}
?>
