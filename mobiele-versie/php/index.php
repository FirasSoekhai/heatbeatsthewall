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
  <meta name="author" content="im van Osch, MD1A">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/flushbox-header.css">
  <link rel="stylesheet" href="../css/flushbox-main.css">
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
    <input type="text" id="question" name="q" placeholder="&#xF002; Search" style="font-family:'Montserrat', sans-serif, FontAwesome">
    <nav>
      <ul>
        <li><a href="index.php" class="activeSet">Homepage</a></li>
        <li><a href="dashboard.php" class="hvr-bounce-to-bottom"><?php echo $_SESSION['username']; ?></a></li>
        <li><a href="about.php" class="hvr-bounce-to-bottom">About</a></li>
        <li><a href="logout.php" class="hvr-bounce-to-bottom">Logout</a></li>
      </ul>
    </nav>
    <div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
  </header>
    <main>
      <div id="txtHint"></div>
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
