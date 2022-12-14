<?php

    $user = "root";
    $password = "";

    $dsn = "mysql:host=localhost;dbname=user";
    //register(id,username,email,pwdhash) <- Register table structure

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    
    return $pdo;


