<?php


namespace Core\Currency\Interfaces;


interface CurrencyClientInterface
{
    public function request(string $method, string $url, array $data);
}