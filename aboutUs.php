<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us Page</title>
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/aboutUs.css">

</head>
<body>

    <div class="landing-page">
        <?php
            include("components/navbar.php");
        ?>
    </div>  

<div class="about-section">
  <h1>About Us </h1>
  <p> (Apre nu kav met 1 lot background.)</p>
</div>

<div class="general-section">
  <h2>Our Vision</h2>
  <p>We aim to revolutionize the industry by delivering innovative solutions that make a lasting impact on our clients and community. Our vision is to become the leading force in driving positive change and progress in our field.</p>
</div>


<div class="general-section">
  <h2>Our Mission</h2>
  <p>Our mission is to empower individuals and businesses through high-quality services and unparalleled support. We strive to create lasting value for our clients by focusing on integrity, innovation, and customer satisfaction in everything we do.</p>
</div>



<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="/w3images/team1.jpg"  style="width:100%">
      <div class="container">
        <h2>Oorvashi Motee</h2>
        <p class="title">bla ba bla</p>
        <p>blablabla.</p>
        <p>oorvashimotee@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="/w3images/team2.jpg" style="width:100%">
      <div class="container">
        <h2>Tanoo Joyekurun</h2>
        <p class="title">balblabla</p>
        <p>blablabla</p>
        <p>tanoojoyekurun@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>

</body>
</html>
