<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="test.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="header">
        <a href="#">Already have an Account?</a>
        <button class="login">Login Here</button>
    </div>
    <div class="form-container">
        <h1>Registering as a Facility Provider</h1>
        <form action="" method="post">
            <div class="form-field" id="type">
                <label for="types">What will you provide:</label><br>
                <div class="option">
                    <input type="checkbox" name="terms" id="terms" class="form-input">
                    <span class="option">Faciliy(Boarding Places, House for Rent, etc.)</span>
                </div>
                <div class="option">
                    <input type="checkbox" name="terms" id="terms" class="form-input">
                    <span class="option">Food</span>
                </div>
                <div class="option">
                    <input type="checkbox" name="terms" id="terms" class="form-input">
                    <span class="option">Furniture and Supplies</span>
                </div>
            </div>
        <input type="submit" value="Register Me" class="button">
    </form>
    </div>
    <img src="../frontend/static/img/facility.jpg" alt="background" id="background">
</body>
</html>