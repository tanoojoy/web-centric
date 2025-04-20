<?php
  include("connectDB.php");
	if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["email"]) && isset($_POST["password"])){
      $email = $_POST["email"];
      $password = $_POST["password"];
      $hashed_pass = password_hash($password, PASSWORD_BCRYPT);

      $sql = "SELECT `user_id`, `username`, `role` FROM `users` WHERE `email`='$user' AND `password`='$hashed_pass'";
      $response = $conn->query($sql);
      $row = $response->fetch_assoc();

      session_start();
      $_SESSION['user_id'] = $row['user_id'];
    //  $_SESSION['username'] = $row['username'];
      
      // Redirect to homepage
      header("Location: ../home.php");
      exit();
    }
  }
?>
<html>
	<head>
		<link rel="stylesheet" href="css/admin.css"/>
	</head>
	<body>
<div id="login-page">
  <div class="login">
    <h2 class="login-title">Login</h2>
    <p class="notice">Please login to access the system</p>
    <form class="form-login" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
      <label for="email">E-mail</label>
      <div class="input-email">
        <i class="fas fa-envelope icon"></i>
        <input type="email" name="email" placeholder="Enter your e-mail" required>
      </div>
      <label for="password">Password</label>
      <div class="input-password">
        <i class="fas fa-lock icon"></i>
        <input type="password" name="password" placeholder="Enter your password" required>
      </div>
      <div class="checkbox">
        <label for="remember">
          <input type="checkbox" name="remember">
          Remember me
        </label>
      </div>
      <button type="submit"><i class="fas fa-door-open"></i> Sign in</button>
    </form>
      <a href="#">Forgot your password?</a>
  </div>
  <div class="background">
    <h1>Donec in dapibus augue sed nisi nunc suscipit eget enim sit amet</h1>
  </div>
</div>
</body>
</html>