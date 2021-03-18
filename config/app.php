<?php

use App\Application\CurrencyExchange\GetCurrentCurrency\CurrencyDataProvider;
use App\Application\CurrencyExchange\GetCurrentCurrency\GetCurrentCurrencyService;
use App\Infrastructure\Repository\CurrencyLog\CurrencyLogDbRepository;
use App\Infrastructure\Repository\CurrencyLog\CurrencyLogInMemoryRepository;
use Core\Currency\ExchangeRatesApiClient;
use Core\Currency\Interfaces\CurrencyClientInterface;
use App\Model\Repository\CurrencyLogRepository;
use Core\Currency\Currency;
use Core\Request\Request;
use function DI\create;

return [
    Request::class => Request::createFromGlobals(),

    CurrencyClientInterface::class => create(ExchangeRatesApiClient::class),

    CurrencyDataProvider::class => function (CurrencyClientInterface $currencyClient) {
        return new Currency($currencyClient);
    },

    CurrencyLogRepository::class => create(CurrencyLogInMemoryRepository::class),

    GetCurrentCurrencyService::class => function(CurrencyDataProvider $dataProvider, CurrencyLogRepository $logRepository) {
        return new GetCurrentCurrencyService($dataProvider, $logRepository);
    }
];