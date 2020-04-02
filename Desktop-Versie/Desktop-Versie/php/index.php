<?php
include("auth.php");
include("fileUpload.php");
include("logIp.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>HeatBeatz | Home</title>
  <meta charset="UTF-8">
  <meta name="description" content="HeatBeatz">
  <meta name="keywords" content="HeatBeatz">
  <meta name="author" content="Joey van der Kuijl, MD1A">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/flushbox-header.css">
  <link rel="stylesheet" href="../css/flushbox-main.css">
  <link rel="stylesheet" href="../css/menu.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <script src="https://kit.fontawesome.com/5ae345fd7f.js" crossorigin="anonymous"></script>

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
    <a href="index.php" class="flushbox"><img src="../images/logo.png"></a><br>
    <br>
    <nav>
      <ul>
        <li><a href="index.php" class="activeSet">Homepage</a></li>
        <li><a href="dashboard.php" class="hvr-bounce-to-bottom"><?php echo $_SESSION['username']; ?></a></li>
        <li><a href="about.php" class="hvr-bounce-to-bottom">About</a></li>
        <li><a href="logout.php" class="hvr-bounce-to-bottom">Logout</a></li>
      </ul>
    </nav>
    <div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
    <input type="text" id="question" name="q" placeholder="&#xF002; Search" style="font-family:'Montserrat', sans-serif, FontAwesome">
  </header>
  
  <input type="checkbox" id="menu-schuiver" checked>
    <label for="menu-schuiver" class="haal-menu"><i class="fas fa-align-justify"></i></label>
    <nav class="right">
    <ul class="trend">
        <input type="checkbox" id="menu-schuiver" checked>
        <label class="haal-menu" for="menu-schuiver">
            <i class="fas fa-window-close"></i>
        </label>
        <li>
            <p style="    font-size: xx-large;
    font-family: fantasy;
    color: red;">Hottest drops!!</p>
        </li>
        <li>
          <img id="side_images" src="../images/917FhHgNDHL._AC_SX522_.jpg" >
            <p id="side_text">Joji</p>
    <p>IN TONGUES [EP]</p>
        </li>
        <li>
          <img id="side_images" src="../images/4lehuzmxu53.jfif">
            <p id="side_text">XXXTENTACTION</p>
    <p> BAD VIBES FOR EVER</p>
        </li>
</nav>

    <main>
    <h1 style="    text-align: center;
    color: white;">Vibe of today</h1>
    <hr>
      <div id="txtHint">
      </div>
    </main>
    <button onclick="topFunction()" id="goUp" class="goUp hvr-pulse-grow" style="font-family:'Montserrat', sans-serif, FontAwesome">&#xF062;</button>
    <script src="../javascript/ajax.js"></script>
    <script src="../javascript/flushbox-main.js"></script>
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
