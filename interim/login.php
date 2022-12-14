<?php
//Establish the connection
session_start();
if(isset($_SESSION['userID'])){
    header("Location: home.php");
    exit;
}

require 'connection.php';

//Get the user from the DB if exists. Otherwise Error
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(!($_POST['username'] && $_POST['password'])){
        echo("Must fill all the fields in the form!");
        die();
    }

$sql = "SELECT * FROM register WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $_POST['username']]);
$user = $stmt->fetch();

if(empty($user)){
    echo "No user found with given credentials";
    die();
}

//If user exists check for matching password

if(!password_verify($_POST['password'], $user->pwdhash)){
    echo("Invalid Credentials. Check username and password");
    die();
}

//If passwd matches, store the user in the session
session_start();
$_SESSION['userID'] = $user->id;
$_SESSION['username'] = $user->username;

//Redirect to homepage
header("Location: home.php");
exit;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentCare - Login</title>
    <link rel="stylesheet" href="./css/login-style.css">
</head>
<body>
    <h1 id="sitename">StudentCare</h1>
    <div class="flex-container">
        <img src="./img/login-banner.jpg" alt="login-image" class="login-banner">
        <div class="login-form">
            <div class="form-container">
                <center><h1>LOGIN</h1></center>
                <form action="./login.php" method="POST" class="form" onsubmit="validateData()">
                    <div class="form-field">
                        <label for="username" class="form-input-lable">Username:</label>
                        <input type="text" name="username" class="form-input" id="username" data-error="*Must provide a username">
                    </div>
                    <div class="form-field">
                        <label for="password" class="form-input-lable">Password:</label>
                        <input type="password" name="password" class="form-input" id="password" data-error="*Must provide a password">
                    </div>
                    <div class="additionals">
                        <span class="remember-option">
                            <input type="checkbox" name="Remember" id="remember-check">
                            <label for="Remember">Remember Me</label>
                        </span>
                        <a href="#">Forgot Password?</a>
                    </div>
                    <input type="submit" value="Login" class="button">
                    <div class="bottom-section">
                        <span class="register-text">Havent't Joined Yet? <a href="register.php">Register Here</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>

</script>

</body>
</html>
