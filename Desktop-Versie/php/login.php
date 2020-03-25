<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>HeatBeatz Login</title>
<link rel="stylesheet" href="../css/registerlogin.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<?php
require('db.php');
session_start();
if (isset($_POST['username'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
    $result = mysqli_query($con, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    if ($rows==1) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $user['email'];
        header("Location: index.php");
    } else {
        echo "<div class='form'>
<h3>Username or password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
    }
} else {
    ?>
<div class="form"><img src="../images/logo.png"><br>
<span class="login">Login</span>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="&#xF007; Username" required style="font-family:'Montserrat', sans-serif, FontAwesome"/>
<input type="password" name="password" placeholder="&#xF084; Password" required style="font-family:'Montserrat', sans-serif, FontAwesome"/><br>
<input name="submit" type="submit" value="Login"/>
</form>
<p class="member">Not a HeatBeatz member yet?<br>
<a href='registration.php'>Register Here</a></p>
</div>
<?php
} ?>
</body>
</html>
