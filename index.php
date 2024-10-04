<?php

session_start();
ini_set('display_errors', 1);

if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
    return false;
} else {

    $url = $_SERVER['REQUEST_URI'] . '/';
    $explodeUrl = explode('/', $url);

    //print_r($url);

    /**
     * define constants
     */
    define("DEFAULT_CONTROLLER", 'home');
    define("ROOT", dirname(__FILE__));

    /**
     * load system
     */
    require ROOT . "/vendor/autoload.php";
    require_once ROOT . '/generated-conf/config.php';
    require ROOT . "/app/functions/functions.php";
    require ROOT . "/app/functions/functionsTwig.php";
    require ROOT . "/bootstrap.php";
    require_once ROOT . '/generated-conf/config.php';

}
