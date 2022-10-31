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
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="formContainer">
        <h1>LOGIN</h1>
        <form action="login.php" method="POST">
            <input class="formInput" placeholder="Username" name="username" type="text"/>
            <input class="formInput" placeholder="Password" name="password" type="password"/>
            <input type="submit" value="Login" class="formInput button"/>
            <span>Don't have an Account? <a href="register.php">Register</a></span>
        </form>
    </div>
</body>
</html>