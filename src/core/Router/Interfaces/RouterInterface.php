<?php


namespace Core\Router\Interfaces;


use Core\Request\Request;

interface RouterInterface
{
    public function handleRequest($container);
}