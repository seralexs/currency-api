<?php


namespace Core;


use Core\Exceptions\PageCouldNotFindException;
use Core\Router\Interfaces\RouterInterface;
use Dotenv\Dotenv;
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
        $this->bootDotEnv();
        return $this;
    }

    public function handleRequest(): void
    {
        $this->boot();

        try {
            $controller = $this->router->handleRequest($this->container);
        } catch (PageCouldNotFindException $exception) {

        }
    }

    public function bootDotEnv()
    {
        $env = Dotenv::createImmutable('../');
        $env->load();
    }
}