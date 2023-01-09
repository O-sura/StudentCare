<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= <?php echo URLROOT . "/public/css/password-reset.css"?> >
    <script src= <?php echo URLROOT . "/public/js/"?> defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="section">
        <i class="fa-solid fa-key" id="main-logo"></i>
        <h1>Forgot Password?</h1>
        <p>No worries, we'll send you reset instructions.</p>
        <form method="post" action="./forgot_password">
            <div>   
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email"><br>
            </div>
            <input type="submit" value="Send Reset Link" name="submit">
        </form> 
        <div class="back-btn">
            <a href="#"><i class="fa-solid fa-arrow-left"></i></a>
            <span class="btn-text"><a href="#">Go Back to login</a></span>
        </div>
    </div>
</body>
</html>