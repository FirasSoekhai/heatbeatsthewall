<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>FlushBox Registration</title>
<link rel="stylesheet" href="../css/registerlogin.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<?php
require('db.php');
if (isset($_REQUEST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
						<h3>You are registered successfully. welcome to FlushBox </h3>
						<br/> <p>Click here to</p> <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
	<span class="flush">Heat<span class="box">Beatz</span></span><br>
	<span class="login">Register your account here</span>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="&#xF007; Username" required style="font-family:'Montserrat', sans-serif, FontAwesome"/>
<input type="email" name="email" placeholder="&#xF0E0; Email" required style="font-family:'Montserrat', sans-serif, FontAwesome"/>
<input type="password" name="password" placeholder="&#xF084; Password" required style="font-family:'Montserrat', sans-serif, FontAwesome"/>
<input type="submit" name="submit" value="Register"/>
</form>
<p><a href='login.php' class="darkColor">Go back to the login</a></p>
</div>
<?php } ?>
</body>
</html>
