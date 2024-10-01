<?php
if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
    return false;
} else {
    session_start();
    ini_set('display_errors', 1);
    /**
     * define constants
     */
    define("DEFAULT_CONTROLLER", 'home');
    define("ROOT", dirname(__FILE__));

    echo __FILE__;

    /**
     * load system
     */
    require ROOT . "/vendor/autoload.php";
    require ROOT . "/app/functions/functions.php";
    require ROOT . "/app/functions/functionsTwig.php";
    require ROOT . "/connection.php";
    require ROOT . "/bootstrap.php";
}
