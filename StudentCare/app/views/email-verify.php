<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=<?php echo URLROOT . "/public/css/email-verify.css"?>>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h1>Thank You For Registering</h1>
    <img src=<?php echo URLROOT . "/public/img/emails.png"?> alt="">
    <p class="text-one">An email verification has been sent to your email <b>user.user@test.com</b>. Please verify this email using the link inside the verification mail</p>
    <p class="text-two">Haven't received the verification mail?</p>
    <button class="btn">Resend Verification</button>
</body>
</html>