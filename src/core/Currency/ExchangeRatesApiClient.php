<?php


namespace Core\Currency;


use App\Model\Base\CurrencyCode;
use Core\Currency\Interfaces\CurrencyClientInterface;

class ExchangeRatesApiClient implements CurrencyClientInterface
{
    private $client;

    private string $baseURL = 'https://api.exchangeratesapi.io/';

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client(
            [
                'base_uri' => $this->baseURL,
            ]
        );
    }

    public function request(string $method, string $url, array $parameters = []): array
    {
        return json_decode($this->client->$method($url, $parameters)->getBody(), true);
    }

    public function getCurrencyHistoryAgainstBase(string $currency, string $baseCurrency, $startAt = null, $endAt = null)
    {
        $baseCurrency = new CurrencyCode($baseCurrency);
        $currency = new CurrencyCode($currency);

        $parameters = [
            'query' => [
                'symbols' => $currency->getValue(),
                'base' => $baseCurrency->getValue(),
                'start_at' => !is_null($startAt) ? $startAt : (new \DateTime())->modify('-1 month')->format('Y-m-d'),
                'end_at' => !is_null($endAt) ? $endAt : (new \DateTime())->format('Y-m-d'),
            ]
        ];

        return $this->request('get', '/history', $parameters);
    }
}