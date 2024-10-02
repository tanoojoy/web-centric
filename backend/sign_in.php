<?php
include("connectDB.php");

// Get form input
$user = $_POST['username'];  //rhea
$pass = $_POST['password'];  //bhurtu

// hash the password
$hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

//get that user's data from DB
$sql = "SELECT user_id, username, password FROM users WHERE username='$user'";

$result = $conn->query($sql);


if ($result->num_rows > 0) { // Check if any records were found
    while($row = $result->fetch_assoc()) {  //store the SQL row in a variable $row
        $match = password_verify($pass, $row["password"]);  //check if the hash from DB matched the hash just generated. if the hashes match, the password is correct
        if($match){
            session_start(); 
            $_SESSION["username"] = $row['username']; 

            header("Location: ../homepage.php");
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
