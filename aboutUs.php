<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />">

    <style>
          *{
          margin: 0px;
          padding:0px;
          box-sizing:border-box;
          font-family: Arial, sans-serif;
        }

        body{
          background-image: linear-gradient(rgba(243,129,129,.9), rgba(252,227,138,.9));
        }

        .heading{
          width:90%;
          display:flex;
          justify-content:center;
          align-items:center;
          flex-direction:column;
          text-align:center;
          margin:20px auto;

        }

        .heading h1{
          font-size: 50px;
          color:#343434;
          margin-bottom:25px;
          position:relative;
        }


        .heading{
          font-size:18px;
          color: #666;
          margin-bottom:35px;

        }

        .container{
          width:90%;
          margin:0 auto;
          padding:10px 20px;
        }

        .about{
          display:flex;
          justify-content:space-between;
          align-items:center;
          flex-wrap:wrap;
        }

        .about-image{
          flex:1;
          margin-right;
          overflow:hidden;
          height:550px;
        }

        .about-image img{
          max-width:100%;
          height:auto;
          display:block;
          transition:0.5s ease;
        }

        .about-image:hover img{
          transform: scale(1.2);
        }

        .about-content{
          margin-left:50px;
          flex:1;
          text-align:center;
        }

        .about-content h2{
          font-size: 23px;
          margin-bottom:15px;
          color:#333;
        }

        .about-content p{
          font-size:18px;
          line-height:1.5;
          color:#666;
        }

        .about-content .read-more{
          display:inline-block;
          padding:10px 20px;
          background-color: #24242f;
          color: white;
          font-size:19px;
          text-decoration:none;
          border-radius:25px;
          margin-top:15px;
          transition:0.3s ease;
        }

        .about-content .read-more:hover{
          background-color: #101015;

        }

        @media screen and (max-width:768px){
          .heading{
            padding:0px 20px;
          }

          .heading h1{
            font-size:36px;
          }

          .heading p{
            font-size:17px;
            margin-bottom:0px;
          }

          .container{
            padding:0px;
          }
          .about{
            padding:20px;
            flex-direction:column;
          }

          .about-image{
            margin-right:0px;
            font-stretch:16px;
          }

          .about-content .read-more{
            font-size: 16px;
          }
        }

        .footer{
    background-color:#111;

}

.footerContainer{
    width:100%;
    padding:20px 20px 10px;
    background-image: linear-gradient(rgba(243,129,129,.9), rgba(252,227,138,.9));
    position:absolute;
}


.socialIcons{
    display:flex;
    justify-content:center;
    gap:20px;
}

.socialIcon a{
    text-decoration:none;
    padding:15px;
    background-color:white;
    margin:10px;
    border-radius:50%;
}

.socialIcons a i{
    font-size:2em;
    color:black;
    opacity:0.9;
    
}

.socialIcons a:hover{
    background-color:#111;
    transition:0.5s;
}

.socialIcons a:hover i{
    color:white;
    transition:0.5;
}

.footer-Nav ul{
    display:flex;
    justify-content:center;
    list-style-type:none;
}

.footer-Nav ul li a{
    color:white;
    margin:20px;
    text-decoration:none;
    font-size:1.3em;
    opacity:0.7;
    transition:0.5s;
}


.footer-Nav ul li a:hover{
    opacity:1;

}

    </style>

</head>
<body>
  

    <div class="heading">
      <h1>About Us</h1>
      <p>Connecting talent with opportunity, helping professionals thrive in their careers.</p>
    </div>
    
    <div class="container">
      <section class="about">
        <div class="about-image">
        <img src="img/aboutUs.webp"  class="aboutUsimage">
        </div>
        <div class="about-content">
          <h2>Who we are</h2>
          <p>
            We are a platform dedicated to connecting job seekers with employers, providing a space where professionals can build their networks, showcase their skills, and find career opportunities. Whether you're looking for your first job or advancing in your career, we offer tools to help you achieve your professional goals.
          </p>
          <h2>Our Mission</h2>
          <p>
            Our mission is to empower individuals in their job search and career development. We strive to bridge the gap between talent and opportunity, helping both job seekers and employers find the perfect match. Through our platform, we aim to foster professional growth, innovation, and collaboration in the workforce.
          </p>
          <h2>What We Offer</h2>
          <p>
            We offer a wide range of features including job postings, networking opportunities, and career resources. Whether you're looking to connect with industry professionals, learn new skills, or explore job openings, we are here to support your career journey.
          </p>
          <a href="backend/sign_up.php" class="read-more">Learn More</a>
        </div>  
      </section>  
    </div>

    <footer>
    <div class="footerContainer">
        <div class="socialIcons">
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-google-plus"></i></a>
            <a href=""><i class="fa-brands fa-youtube"></i></a>
        </div>

        <div class="footer-Nav">
                <ul>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Learn More</a></li>
                </ul>
        </div>

    </div>

</footer>


</body>
</html>
