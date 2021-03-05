<?php


namespace Core;


use Core\Router\Interfaces\RouterInterface;
use Core\Router\Router;

class Application
{
    private ?RouterInterface $router = null;
    private $container;

    public function __construct(RouterInterface $router, $container)
    {
        $this->router = $router;
        $this->container = $container;
    }

    public function boot(): self
    {
        return $this;
    }

    public function handleRequest(): void
    {
        if (!is_null($this->router)) {
            $this->router->handleRequest($this->container);
        }
    }
}