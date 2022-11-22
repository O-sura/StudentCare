<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href= <?php echo URLROOT . "/public/css/common-register.css"?> >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="header">
        <span>Already have an Account? </span>
        <a href="<?php echo URLROOT ?>/users/login"><div class="login">Login Here</div></a>
    </div>
    <div class="form-container">
        <h1>Create an Account</h1>
        <form action="" method="post">
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
                <label for="passwprd" class="lable">Password:</label><br>
                <input type="password" name="password" id="password" class="form-input">
            </div>
            <div class="form-field">
                <label for="contact" class="lable">Contact Number:</label><br>
                <input type="text" name="contact" id="contact" class="form-input">
            </div>
            <div class="form-field">
                <label for="re-password" class="lable">Confirm Password:</label><br>
                <input type="password" name="re-password" id="re-password" class="form-input">
            </div>
            <div class="form-field" id="terms-cond">
                <input type="checkbox" name="terms" id="terms" class="form-input">
                <span class="note">I agree with all <a href="#">Terms and Conditions</a>, <a href="#">Rules and Regulations</a> and <a href="#">Privacy Policies</a> of StudentCare</span>
            </div>
        </form>
        <input type="submit" value="Continue" class="button">
    </div>
    <div class="bottom">
       <a href="#">Continue as a Guest</a>
    </div>
</body>
</html>