<?php
include("../backend/connectDB.php");

$user = $_POST['email'];  //rhea
$pass = $_POST['password'];  //bhurtun

// hash the password
$hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

//get that user's data from DB
$sql = "SELECT user_id, username, email, password FROM users WHERE email=" . $user ." AND role='admin'";

// echo $sql;

$result = $conn->query($sql);

if ($result->num_rows > 0) { // Check if any records were found
    $row = $result->fetch_assoc();   //store the SQL row in a variable $row
        $match = password_verify($pass, $row["password"]);  //check if the hash from DB matched the hash just generated. if the hashes match, the password is correct
        if($match){
            $conn->close();
            session_start(); 
            $_SESSION["user_id"] = $row['user_id']; 
            $_SESSION["username"] = $row['username'];

            header("Location: ../home.php");
            exit();
        }
        else{
            echo "Invalid Password.";
        }
    
} 
else {
    echo "No user found with the username: " . $user;
}


?>