<?php


namespace Core\Currency;

use Core\Currency\Interfaces\CurrencyClientInterface;
use GuzzleHttp\Psr7\Response;

class Currency
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

    public function getCurrencyHistoryAgainstBase(string $baseCurrency, $startAt = null, $endAt = null)
    {
        //todo time range
        $parameters = [
            'query' => [
                'base' => $baseCurrency,
                'start_at' => '2020-01-01',
                'end_at' => '2020-02-01',
            ]
        ];

        return $this->request('get', '/history', $parameters);
    }
}