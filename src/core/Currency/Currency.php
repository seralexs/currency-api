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

    public function getCurrencyHistoryAgainstBase(string $currency, string $baseCurrency, $startAt = null, $endAt = null)
    {
//        $parameters = [
//            'query' => [
//                'symbols' => $currency,
//                'base' => $baseCurrency,
//                'start_at' => !is_null($startAt) ? $startAt : (new \DateTime())->modify('-1 month')->format('Y-m-d'),
//                'end_at' => !is_null($endAt) ? $endAt : (new \DateTime())->format('Y-m-d'),
//            ]
//        ];
//
//        return $this->request('get', '/history', $parameters);
        return $this->client->getCurrencyHistoryAgainstBase($currency, $baseCurrency, $startAt, $endAt);
    }

    public function getCurrency(CurrencyCode $baseCurrency, CurrencyCode $currency)
    {
        // TODO: Implement getCurrency() method.
    }


}