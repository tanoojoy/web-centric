session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}

$owner_name = $owner_email = $owner_phone = $owner_facebook_url = "";
$name_err = $email_err = $phone_err = $facebook_err = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $owner_name = trim($_POST["owner_name"]);
    $owner_email = trim($_POST["owner_email"]);
    $owner_phone = trim($_POST["owner_phone"]);
    $owner_facebook_url = trim($_POST["owner_facebook_url"]);
    
    // Validate name
    if (empty($owner_name)) {
        $name_err = "Please enter your name.";
    }
    
    // Validate email
    if (empty($owner_email)) {
        $email_err = "Please enter your email.";
    } elseif (!filter_var($owner_email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter a valid email address.";
    }
    
    // Validate phone
    if (empty($owner_phone)) {
        $phone_err = "Please enter your phone number.";
    } elseif (!is_numeric($owner_phone)) {
        $phone_err = "Please enter a valid numeric phone number.";
    }
    
    // Validate Facebook URL
    if (empty($owner_facebook_url)) {
        $facebook_err = "Please enter your Facebook profile URL.";
    } elseif (!preg_match("/^https:\/\/www\.facebook\.com\/.+/", $owner_facebook_url)) {
        $facebook_err = "Please enter a valid Facebook URL starting with 'https://www.facebook.com/'";
    }

    // If no errors, insert data into the database
    if (empty($name_err) && empty($email_err) && empty($phone_err) && empty($facebook_err)) {
        require_once "config.php"; // Assuming a config.php file with database connection

        $sql = "INSERT INTO owner (owner_name, owner_email, owner_phone, owner_facebook_url, username) VALUES (?, ?, ?, ?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters
            $stmt->bind_param("sssss", $param_name, $param_email, $param_phone, $param_facebook, $param_username);
            
            // Set parameters
            $param_name = $owner_name;
            $param_email = $owner_email;
            $param_phone = $owner_phone;
            $param_facebook = $owner_facebook_url;
            $param_username = $_SESSION["username"];
            
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                echo "Your details have been submitted successfully!";
            } else {
                echo "Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
        $conn->close();
    }
}
?>
