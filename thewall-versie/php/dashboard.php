<?php
require('db.php');
include("auth.php");
include("logIp.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>HeatBeatz | Dashboard</title>
<link rel="stylesheet" href="../css/flushbox_dashboard.css" />
<link rel="stylesheet" href="../css/flushbox-header.css" />
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
        <li><a href="dashboard.php" class="activeSet"><?php echo $_SESSION['username']; ?></a></li>
        <li><a href="about.php" class="hvr-bounce-to-bottom">About</a></li>
        <li><a href="logout.php" class="hvr-bounce-to-bottom">Logout</a></li>
      </ul>
    </nav>
    <div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
  </header>
  <main>
    <div class="main-content">
      <section class="profileContent">Profile</section>
      <hr><br>
      <div class="picUpdate">
        <section class="pictureContent">Picture</section>
        <img src="../images/profilepicture.png" alt="Profile Stock Picure" class="stockImage"><br>
        <label for="file-upload" class="custom-file-upload">
          <i class="fa fa-cloud-upload" style="font-family:'Montserrat', sans-serif, FontAwesome"></i>  Change picture
        </label>
          <input id="file-upload" type="file" />
      </div><br><br>

      <?php
      $user = $_SESSION['username'];

      if ($user){
        if (isset($_POST['submit'])){

          $oldpassword = md5($_POST['oldpassword']);
		      $newpassword = md5($_POST['newpassword']);
		      $repeatnewpassword = md5($_POST['repeatnewpassword']);

          $connect = mysqli_connect("mysql.timvanosch.nl", "timvanoschnl", "0Jpq5105Oc0t", "timvanoschnl") or die (mysqli_error($connect));


          $queryget = mysqli_query("SELECT `password` FROM `users` WHERE username='$user'");

          if(!$queryget){
            echo mysqli_error($connect);
          }
          $row = mysqli_fetch_assoc($queryget);

          $oldpassworddb = $row['password'];


          if ($oldpassword==$oldpassworddb){
            if ($newpassword !==""){
              $querychange = mysqli_query("UPDATE `users` SET password='$newpassword' WHERE username='$user'");
              if (!mysqli_query($querychange )){
	               echo "There was an error in updating your password...";
	                exit();
                }

                session_destroy();
                die("Your password has been changed.&lt;a href='index.php'&gt;Return&lt;/a&gt; to the main page");

              }
            // if ($newpassword==$repeatnewpassword){
            //   $querychange = mysqli_query("UPDATE `users` SET password='$newpassword' WHERE username='$user'");
            //   session_destroy();
            //   die("Your pass has been changed.<a href='login.php'>Return</a> to the main page to login again");
            // }
          }
        }
      }
       ?>

      <section class="inhoudContent">Change username:</section>
      <input type="text" name="wachtwoordVeranderen" value=<?php echo $_SESSION['username']; ?>>
      <section class="inhoudContent">Change email:</section>
      <input type="text" name="wachtwoordVeranderen" value=<?php echo $_SESSION['email']; ?>>
      <section class="inhoudContent">Change password:</section>
      <form action="" method="post" name="changepassword">
      <input class="inhoudContent" type="password" name="oldpassword" placeholder="&#xF084; Old password" required style="font-family:'Montserrat', sans-serif, FontAwesome"/><br>
      <input class="inhoudContent" type="password" name="newpassword" placeholder="&#xF084; New password" required style="font-family:'Montserrat', sans-serif, FontAwesome"/><br>
      <input class="inhoudContent" type="password" name="repeatnewpassword" placeholder="&#xF084; Repeat new password" required style="font-family:'Montserrat', sans-serif, FontAwesome"/><br>
      <input class="inhoudContent" name="submit" type="submit" value="Change password"/>

      </form>


    </div>
  </main>
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
