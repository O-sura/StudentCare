<?php
    //Clear the session variables and make user logged out
    session_start();

    session_destroy();
    header("Location: home.php");
    exit();
?>