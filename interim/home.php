<?php
    //Pick the user from the session variables
    session_start();
    if(isset($_SESSION['userID'])){
        require 'connection.php';

        $userID = $_SESSION['userID'];

        $sql = "SELECT * FROM register WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $userID]);
        $user = $stmt->fetch();


    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentCare</title>
</head>
<body>
    <?php if (isset($user)): ?>
        <?php  header("Location: community.php"); ?>
        <? exit; ?>
    <?php else: ?>
        <?php include 'unauth.php'; ?>
    <?php endif;?>
</body>
</html>