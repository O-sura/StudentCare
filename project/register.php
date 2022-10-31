<?php
//Establish the connection with DB
session_start();
if(isset($_SESSION['userID'])){
    header("Location: home.php");
    exit;
}

require 'connection.php';

//Check whether form data is empty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(!($_POST['username'] && $_POST['email'] && $_POST['password1'] && $_POST['password2'])){
    echo("Must fill all the fields in the form!");
    die();
}


$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password1'];

//Username has already taken or not
$sql = "SELECT * FROM register WHERE username = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$username]);
$users = $stmt->fetchAll();

if(!empty($users)){
    echo("This username is already taken. Pick another one");
    die();
}

//Email is valid or not
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("Invalid email format");
    die();
}

//Password and repeated once are matched
if($_POST['password1'] !== $_POST['password2']){
    echo("Password mismatch");
    die();
}

//password has(Min. 8 len, one character, one letter, one special char)
if(strlen($password)<8){
    echo("Password should have at least 8 characters");
    die();
}
else{
    if (!preg_match('/[0-9]/', $password)) {
       echo("Password must contain at least one number");
       die();
    }
    else if(!preg_match('/[a-z]/', $password)){
        echo('Password must contain at least one lowercase letter');
        die();
    }
    else if(!preg_match('/[A-Z]/', $password)){
        echo('Password must contain at least one uppercase letter');
        die();
    }
    else if(!preg_match("/[\[^\'£$%^&*()}{@:\'#~?><>,;@\|\-=\-_+\-¬\`\]]/", $password)){
        echo('Password must contain at least one special character');
        die();
    }
}


//Hash the password and store the data
$hashed_pass = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO register(username, email, pwdhash) VALUES (:username, :email , :pwdhash)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $username, 'email' => $email, 'pwdhash' => $hashed_pass]);
echo('Registration successful');


//Redirect to login page
header("Location: login.php");
exit;


//If failed to register remember to auto fill the last attempt data
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentCare - Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="formContainer">
        <h1>REGISTER</h1>
        <form action="register.php" method="POST">
            <input class="formInput" placeholder="Username" name="username" type="text" value="<?= htmlspecialchars($_POST["username"] ?? "") ?>"/>
            <input class="formInput" placeholder="Email" name="email" type="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"/>
            <input class="formInput" placeholder="Password" name="password1" type="password" value="<?= htmlspecialchars($_POST["password1"] ?? "") ?>"/>
            <input class="formInput" placeholder="Re-enter Password" name="password2" type="password"/>
            <input type="submit" value="Register" class="formInput button"/>
            <span>Already have an Account? <a href="login.php">Log In</a></span>
    </div>
</body>
</html>