<?php
// Database connection details
//blabla bla
$servername = "localhost";
$username = "oorvashi";  // default username for phpMyAdmin
$password = "talenthub123";  // default password for phpMyAdmin (usually empty)
$dbname = "talenthub";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);
// echo $dbname;

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// // Get form input
$user = $_POST['username'];
$pass = $_POST['password'];

// Secure password (hashing)
$hashed_pass = password_hash($pass, PASSWORD_BCRYPT);
// echo $hashed_pass;

// Insert into database
$sql = "INSERT INTO test_login (user_id, username, password) VALUES (UUID(), '$user', '$hashed_pass')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
