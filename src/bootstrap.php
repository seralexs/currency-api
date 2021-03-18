<?php

$containerBuilder = new \DI\ContainerBuilder();

if (getenv('APP_ENVIRONMENT') === 'production') {
    $containerBuilder->enableCompilation(__DIR__.'/var/container-cache');
}

$container = $containerBuilder->addDefinitions('../config/app.php')->build();

$routes = require '../config/routes/routes.php';
$router = new \Core\Router\Router($routes, $container->get(\Core\Request\Request::class));

return $app = new \Core\Application($router, $container);
