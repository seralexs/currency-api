<?php


namespace App\Controllers;

use Core\Currency\Currency;
use Core\Request\Request;
use Core\Response\JsonResponse;
use Core\Response\Response;

class HomePageController
{
    public function index(Request $request, Currency $currencyApi)
    {
        $currencyHistory = $currencyApi->getCurrencyHistoryAgainstBase('USD', 'EUR', '2021-02-01', '2021-02-10');

        return (new JsonResponse($currencyHistory, Response::HTTP_OK))->send();
    }
}