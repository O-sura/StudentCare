<?php
    //Pick the user from the session variables
    session_start();
    if(isset($_SESSION['userID'])){
        header("Location: home.php");
        exit();
    }
    else{
        header("Location: login.php");
        exit();
    }
    
?>
