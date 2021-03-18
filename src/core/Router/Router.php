<?php


namespace Core\Router;

use Core\Request\Request;
use Core\Router\Interfaces\RouterInterface;

class Router implements RouterInterface
{
    private array $routes = [];

    private array $parameters = [];

    private Request $request;

    public function __construct(array $routes, Request $request)
    {
        $this->routes = $routes;
        $this->request = $request;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function handleRequest($container): void
    {
        if ($this->match($this->request->getPathInfo())) {
            $controllerClass = $this->getNamespace().$this->parameters['controller'];

            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();

                if (method_exists($controller, $this->parameters['action']) && is_callable([$controller, $this->parameters['action']])) {
                    $container->call([$controller, $this->parameters['action']]);
                } else {
                    throw new \Exception('There`s no '.$this->parameters['action'].' method in '.$controllerClass);
                }
            } else {
                throw new \Exception('There`s no such controller');
            }
        } else {
            throw new \Exception('There`s no such route');
        }
    }

    public function match($uri): bool
    {
        foreach ($this->getRoutes() as $path => $parameters) {
            if ($path === $uri) {
                if (preg_match('/^(?P<controller>[A-Za-z]+)(@)(?P<action>[A-Za-z]+)$/', $parameters, $matches)) {
                    if (!isset($matches['controller']) || !isset($matches['action'])) {
                        return false;
                    }

                    $this->parameters['controller'] = $matches['controller'];
                    $this->parameters['action'] = $matches['action'];

                    return true;
                }
            }
        }
        return false;
    }

    public function getNamespace(): string
    {
        return 'App\Controllers\\';
    }
}