<?php


namespace Core;


use Core\Router\Interfaces\RouterInterface;
use Core\Router\Router;

class Application
{
    private ?RouterInterface $router = null;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function boot(): self
    {
        return $this;
    }

    public function handleRequest(): void
    {
        if (!is_null($this->router)) {
            $this->router->handleRequest();
        }
    }
}