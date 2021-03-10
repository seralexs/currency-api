<?php

$env = Dotenv\Dotenv::createImmutable('../');
$env->load();

$containerBuilder = new \DI\ContainerBuilder();

if (getenv('APP_ENVIRONMENT') === 'production') {
    $containerBuilder->enableCompilation(__DIR__.'/var/container-cache');
}

$container = $containerBuilder->addDefinitions('../config/app.php')->build();

$routes = require '../config/routes/routes.php';
$router = new \Core\Router\Router($routes);

return $app = new \Core\Application($router, $container);
