<?php

/**
 * get url
 */
$url = \acme\classes\Url::getUrl();

/**
 * load template
 */
$template = new \acme\classes\LoadTemplate();
$twig = $template->init();

/**
 * call baseController to get controllers and methods
 */
$baseController = new \app\controllers\BaseController();
$baseController->setUrl($url);

/**
 * get controllers
 */
$controller = $baseController->getController();
$classController = new $controller;
$classController->setTwig($twig);

/**
 * get method
 */
$method = $baseController->getMethod($classController);
$classController->$method();
