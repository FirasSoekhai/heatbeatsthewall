<?php
require('db.php');
include("auth.php");
include("logIp.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>HeatBeatz | About</title>
<link rel="stylesheet" href="../css/flushbox_dashboard.css" />
<link rel="stylesheet" href="../css/flushbox-header.css" />
<link rel="stylesheet" href="../css/flushbox-about.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128060008-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-128060008-1');
</script>

</head>
<body>
  <header>
    <div class="flushbox"><a href="index.php">Heat<span>Beatz</span></a></div>
    <nav>
      <ul>
        <li><a href="index.php" class="hvr-bounce-to-bottom">Homepage</a></li>
        <li><a href="dashboard.php" class="hvr-bounce-to-bottom"><?php echo $_SESSION['username']; ?></a></li>
        <li><a href="about.php" class="activeSet">About</a></li>
        <li><a href="logout.php" class="hvr-bounce-to-bottom">Logout</a></li>
      </ul>
    </nav>
    <div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
  </header>
  <main>
    <div class="main-content">
      <section class="profileContent">About</section>
      <hr><br>
      <div class="aboutContent">
        <div class="aboutWe">
          <span class="aboutBold">&bull; Soon to be done</span><br><br>

        </div>
      <!-- <div class="aboutContent">
        <div class="aboutWe">
          <span class="aboutBold">&bull; Who are we?</span><br><br>
          Hello! We are Brian Loman and Tim van Osch, or <span class="aboutBold">UNKN0WNSKULLS</span>, which is the name of our project group.<br>
          We are two individuals who have a passion for creating websites - Creating websites makes us happy.
          <br><br>
          We are convinced that teamwork, a good relationship with each other and creativity<br>
          is important to think of good websites, and also realise them.
        </div>

        <div class="aboutFlush">
          <span class="aboutBold">&bull; What is flushbox?</span><br><br>
          Flushbox is a project we have been working on since februari 2019.<br>
          Our assignment was to create a website where users could resgiter and login,<br>
          and post images on a wall.
          <br><br>
          All the images can be given a title, a description and a tag.<br>
          Our final product also lets you search for an images via the given tag.<br>
        </div>
        <div class="aboutContact">
          <span class="aboutBold">&bull; Contact us!</span><br><br>
          <span class="aboutBold">Brian Loman:</span><br>
          <span class="aboutUnderline">Email:</span> brianloman@hotmail.com<br>
          <span class="aboutUnderline">Tel:</span> +31 6 15252536<br>
          <span class="aboutUnderline">Discord:</span> BrianSkulls#1192<br>
          <span class="aboutUnderline">LinkedIn:</span> <a href="https://www.linkedin.com/in/brian-loman-620079173/" class="noUnderline">Click here</a><br><br>
          <span class="aboutBold">Tim van Osch:</span><br>
          <span class="aboutUnderline">Email:</span> timvanosch2001@gmail.com<br>
          <span class="aboutUnderline">Tel:</span> +31 6 24810020<br>
          <span class="aboutUnderline">Discord:</span> 🆄🅽🅺🅽0🆆🅽#3746<br>
          <span class="aboutUnderline">LinkedIn:</span> <a href="https://www.linkedin.com/in/tim-osch-87093971/" class="noUnderline">Click here</a><br>
        </div>
        <div class="aboutFind">
          <span class="aboutBold">&bull; Where to find us:</span><br><br>
        </div>
      </div> -->
        <div class="map-responsive">
          <iframe src="https://maps.google.com/maps?q=mediacollege%20amsterdam&t=k&z=17&ie=UTF8&iwloc=&output=embed" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</main>
  <footer>
    <div class="inhoudContent">
      <span class="copyright"> UNKN0WNSKULLS &copy; 2019 FlushBox.net All rights reserved</span>
    </div>
  </footer>
  <script src="//code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.menu-toggle').click(function(){
        $('nav').toggleClass('active')
      })
    })
  </script>
</body>
</html>
