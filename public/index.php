<?php

require '../vendor/autoload.php';

$routes = require '../config/routes/routes.php';
$router = new \Core\Router\Router($routes);

$app = new \Core\Application($router);
$app->handleRequest();

//phpinfo();
//echo '<pre>';
//print_r($_SERVER);
//echo '</pre>';