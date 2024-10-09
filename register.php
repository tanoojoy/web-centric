<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create A New Account</title>
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <div class="landing-page">
        <?php
            include("components/navbar.php");
        ?>
    </div>
    <h2 style="text-align: center"> Create Account </h2>
    <form class="login" action="backend/sign_up.php" method="POST">
        <label for="username">Username:</label>
        <div class="input">
            <input type="email" name="username" placeholder="Email" required>
        </div>
        <label for="password">Password:</label>
        <div class="input">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="submit">Create Account</button>
    </form>
</body>
<?php
    // include("components/footer.php");
?>
</html>
