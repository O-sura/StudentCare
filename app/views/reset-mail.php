<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= <?php echo URLROOT . "/public/css/password-reset.css"?> >
    <script src= <?php echo URLROOT . "/public/js/reset-mail.js"?> defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="section">
        <i class="fa-solid fa-envelope" id="main-logo"></i>
        <h1>Check Your Email</h1>
        <p>We sent you a password reset link to your email</p>
        <button type="submit" value="">Open Gmail</button>
        <p class="bottom-text">Haven't receive the email? <a href="" id="resend-link" onclick="event.preventDefault();"><b>Click to Resend</b></a></p>
        <div class="back-btn">
            <a href=<?php echo URLROOT . "/users/login"?>><i class="fa-solid fa-arrow-left"></i></a>
            <span class="btn-text"><a href= <?php echo URLROOT . "/users/login"?> >Go Back to login</a></span>
        </div>
    </div>
    <form action="./forgot_password" method="post" id="resend-form">
        <input type="email" name="email" value=<?php echo $data?> hidden>
    </form>
</body>
</html>