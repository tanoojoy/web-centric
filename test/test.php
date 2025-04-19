<?php
try {
  // Connect to database using PDO
  $conn = new PDO("mysql:host=localhost;dbname=talenthub", "tanoo", "talenthub");
  
  // Set PDO error mode to exception for better error handling
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  // Prepare SQL statement with named placeholders
  $stmt = $conn->prepare("INSERT INTO users (username, email, user_id) VALUES (:username, :email, '234')");

  $username = "tanoo";
  $email = "ayushee@g.com";
  
  // Bind parameters to statement
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':email', $email);
  
  // Set values
  $username = "JohnDoe";
  $email = "john@example.com";
  
  // Execute the statement
  $stmt->execute();
  
  echo "New record inserted successfully";
  
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

// Close connection
$conn = null;
?>
