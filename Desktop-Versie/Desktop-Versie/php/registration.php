<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>HeatBeatz Registration</title>
    <link rel="stylesheet" href="../css/registerlogin.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <?php
    require('db.php');
    if (isset($_REQUEST['username'])) {

        //Database verbinding maken
        $connection = dbConnect();

        // Alle gegevens opschonen en in varabelen zetten
        $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_STRING);
        $email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);
        $trn_date = date("Y-m-d H:i:s");

        //Query schrijven met een prepared statement
        $query = "INSERT into `users` (`username`, `password`, `email`, `trn_date`) VALUES (:username, :password, :email, :trn_date)";
        $statement = $connection->prepare($query);

        // De gegevens voor de "invulvakjes" in een array zetten ->  :username, :password, :email, :trn_date
        $params = [
            'username' => $username,
            'password' => md5($password),
            'email' => $email,
            'trn_date' => $trn_date
        ];

        //Query uitvoeren
        $result = $statement->execute($params);

        if ($result) {
            echo "<div class='form'>
						<h3>You are registered successfully. welcome to HeatBeatz </h3>
						<br/> <p>Click here to</p> <a href='login.php'>Login</a></div>";
        }
    } else {
    ?>
        <div class="form"><img src="../images/logo.png"><br><br>
            <span class="login">Register your account here</span>
            <form name="registration" action="" method="post">
                <input type="text" name="username" placeholder="&#xF007; Username" required style="font-family:'Montserrat', sans-serif, FontAwesome" />
                <input type="email" name="email" placeholder="&#xF0E0; Email" required style="font-family:'Montserrat', sans-serif, FontAwesome" />
                <input type="password" name="password" placeholder="&#xF084; Password" required style="font-family:'Montserrat', sans-serif, FontAwesome" />
                <input type="submit" name="submit" value="Register" />
            </form>
            <p><a href='login.php' class="darkColor">Go back to the login</a></p>
        </div>
    <?php } ?>
</body>

</html>