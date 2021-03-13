<?php


namespace Core;


use Core\Exceptions\PageCouldNotFindException;
use Core\Router\Interfaces\RouterInterface;
use Psr\Container\ContainerInterface;

class Application
{
    private RouterInterface $router;
    private ContainerInterface $container;

    public function __construct(RouterInterface $router, ContainerInterface $container)
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
        try {
            $controller = $this->router->handleRequest($this->container);
        } catch (PageCouldNotFindException $exception) {

        }
    }
}