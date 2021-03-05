<?php

$container = (new \DI\ContainerBuilder())
    ->addDefinitions('../config/app.php')
    ->build();

$routes = require '../config/routes/routes.php';
$router = new \Core\Router\Router($routes);

return $app = new \Core\Application($router, $container);
