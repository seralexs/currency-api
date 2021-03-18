<?php


namespace Core\Currency;

use App\Application\CurrencyExchange\GetCurrentCurrency\CurrencyDataProvider;
use App\Model\Base\CurrencyCode;
use Core\Currency\Interfaces\CurrencyClientInterface;

class Currency implements CurrencyDataProvider
{
    private CurrencyClientInterface $client;

    public function __construct(CurrencyClientInterface $client)
    {
        $this->client = $client;
    }

    private function request($method, $url, $data)
    {
        return $this->client->request($method, $url, $data)->getBody();
    }

    public function getCurrencyHistoryAgainstBase(string $baseCurrency, string $currency, $startAt = null, $endAt = null)
    {
        return $this->client->getCurrencyHistoryAgainstBase($baseCurrency, $currency, $startAt, $endAt);
    }

    public function getCurrency(CurrencyCode $baseCurrency, CurrencyCode $currency)
    {
//        $baseCurrency = new CurrencyCode($baseCurrency);
//        $currency = new CurrencyCode($currency);

        $startAt = $endAt = (new \DateTime())->format('Y-m-d');

        return $this->getCurrencyHistoryAgainstBase($baseCurrency->getValue(), $currency->getValue(), $startAt, $endAt);
    }


}