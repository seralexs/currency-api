<?php

use App\Application\CurrencyExchange\GetCurrentCurrency\CurrencyDataProvider;
use App\Application\CurrencyExchange\GetCurrentCurrency\GetCurrentCurrencyService;
use App\Infrustructure\Repository\CurrencyLog\CurrencyLogDbRepository;
use App\Model\Repository\CurrencyLogRepository;
use Core\Currency\Currency;
use function DI\create;

return [
    \Core\Request\Request::class => \Core\Request\Request::createFromGlobals(),

    \Core\Currency\Interfaces\CurrencyClientInterface::class => new \Core\Currency\ExchangeRatesApiClient(),
    \Core\Currency\Currency::class => function (\Psr\Container\ContainerInterface $container) {
        return new \Core\Currency\Currency($container->get(\Core\Currency\Interfaces\CurrencyClientInterface::class));
    },

    CurrencyDataProvider::class => create(Currency::class),

    CurrencyLogRepository::class => create(CurrencyLogDbRepository::class),

    GetCurrentCurrencyService::class => function(CurrencyDataProvider $dataProvider, CurrencyLogRepository $logRepository) {
        return new GetCurrentCurrencyService($dataProvider, $logRepository);
    }
];