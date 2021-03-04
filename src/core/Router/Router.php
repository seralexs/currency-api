<?php


namespace Core\Router;

use Core\Router\Interfaces\RouterInterface;

class Router implements RouterInterface
{
    private array $routes = [];

    private array $parameters = [];

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function handleRequest(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
//echo $uri;
//die();
        if ($this->match($uri)) {
            $controllerClass = $this->getNamespace().$this->parameters['controller'];

            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();

                if (method_exists($controller, $this->parameters['action']) && is_callable([$controller, $this->parameters['action']])) {
                    $controller->{$this->parameters['action']}();
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