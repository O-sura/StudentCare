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
$address = $_POST['address'];
$nic = $_POST['nic'];
$contact = $_POST['contact'];
$name = $_POST['name'];

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

$sql = "INSERT INTO register(username, email, pwdhash, rname, u_address, nic, contact_no) VALUES (:username, :email , :pwdhash, :rname, :u_address, :nic, :contact_no)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $username, 'email' => $email, 'pwdhash' => $hashed_pass, 'rname'=>$name, 'u_address'=>$address, 'nic'=>$nic, 'contact_no'=>$contact]);
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
    <link rel="stylesheet" href="./css/register-common.css">
</head>
<body>
    <div class="header">
        <a href="login.php">Already have an Account?</a>
        <a href="login.php"><button class="login" id="login-btn">Login Here</button></a>
    </div>
    <div class="form-container">
        <h1>Create an Account</h1>
        <form action="register.php" method="post">
            <div class="form-field">
                <label for="name" class="lable">Name:</label><br>
                <input type="text" name="name" id="name" class="form-input">
            </div>
            <div class="form-field">
                <label for="username" class="lable">Username:</label><br>
                <input type="text" name="username" id="username" class="form-input">
            </div>
            <div class="special-field">
                <div class="form-field">
                    <label for="email" class="lable">Email:</label><br>
                    <input type="email" name="email" id="email" class="form-input">
                </div>
                <div class="form-field" id="special">
                    <label for="nic" class="lable">NIC:</label><br>
                    <input type="text" name="nic" id="nic" class="form-input">
                </div>
            </div>
            <div class="form-field">
                <label for="address" class="lable">Address:</label><br>
                <textarea name="address" id="address" class="form-input" cols="30" rows="5"></textarea>
            </div>
            <div class="form-field">
                <label for="password1" class="lable">Password:</label><br>
                <input type="password" name="password1" id="password" class="form-input">
            </div>
            <div class="form-field">
                <label for="contact" class="lable">Contact Number:</label><br>
                <input type="text" name="contact" id="contact" class="form-input">
            </div>
            <div class="form-field">
                <label for="password2" class="lable">Re-type Password:</label><br>
                <input type="password" name="password2" id="re-password" class="form-input">
            </div>
            <div class="form-field" id="terms-cond">
                <input type="checkbox" name="terms" id="terms" class="form-input">
                <span class="note">I agree with all <a href="#">Terms and Conditions</a>, <a href="#">Rules and Regulations</a> and <a href="#">Privacy Policies</a> of StudentCare</span>
            </div>
        <input type="submit" value="Continue" class="button">
        </form>
    </div>
    <div class="bottom">
       <a href="#">Continue as a Guest</a>
    </div>

<script>

</script>
</body>
</html>

