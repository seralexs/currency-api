<?php

return [
    \Core\Request\Request::class => \Core\Request\Request::createFromGlobals(),

    \Core\Currency\Interfaces\CurrencyClientInterface::class => new \Core\Currency\ExchangeRatesApiClient(),
    \Core\Currency\Currency::class => function (\Psr\Container\ContainerInterface $container) {
        return new \Core\Currency\Currency($container->get(\Core\Currency\Interfaces\CurrencyClientInterface::class));
    },
];