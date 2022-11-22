<?php
    require_once 'config/config.php';

    // Include all the core files required to run the application
    // require_once 'core/Core.php';
    // require_once 'core/Controller.php';
    // require_once 'core/Database.php';

    //Autoload Core classes
    spl_autoload_register(function($classname){
        require_once 'core/'. $classname . '.php';
    });

