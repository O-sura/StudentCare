<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form method="post" action="./forgot_password">
            <input type="hidden" name="token" value="<?= $data['token'] ?>">
            <label for="password">New password:</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" name="reset-password">Reset password</button>
        </form>
</body>
</html>