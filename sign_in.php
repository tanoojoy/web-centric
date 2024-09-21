<?php
// Database connection details
$servername = "localhost";
$username = "tanoo";  // default username for phpMyAdmin
$password = "talenthub123";  // default password for phpMyAdmin (usually empty)
$dbname = "talenthub";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);
// echo $dbname;

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form input
$user = $_POST['username'];  //rhea
$pass = $_POST['password'];  //bhurtu

// hash the password
$hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

//get that user's hashed password from databse
$sql = "SELECT user_id, username, password FROM test_login WHERE username='$user'";

$result = $conn->query($sql);

// Check if any records were found
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // echo "User ID: " . $row["user_id"]. " - Username: " . $row["username"]. " - Password: " . $row["password"]. "<br>";

        //check if the given password's hash matches the hash in the database
        $match = password_verify($pass, $row["password"]);
        if($match){
            echo "Password is valid. Welcome ".$row["username"];
        }
        else{
            echo "Invalid Password.";
        }
    }
} 
else {
    echo "No user found with the username: " . $user;
}

// Close connection
$conn->close();
?>
