<?php


namespace Core\Currency;


use Core\Currency\Interfaces\CurrencyClientInterface;
use GuzzleHttp\Psr7\Response;

class Client implements CurrencyClientInterface
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

    public function request(string $method, string $url, array $parameters = []): Response
    {
        return $this->client->$method($url, $parameters);
    }
}