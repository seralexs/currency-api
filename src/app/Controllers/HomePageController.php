<?php


namespace App\Controllers;

use Core\Currency\Currency;
use Core\Request\Request;
use Core\Response\JsonResponse;
use Core\Response\Response;

class HomePageController
{
    public function index(Request $request)
    {
        echo 'index';
//        $currencyHistory = $currencyApi->getCurrencyHistoryAgainstBase('USD', 'EUR', '2021-03-17', '2021-03-17');

//        return (new JsonResponse($currencyHistory, Response::HTTP_OK))->send();
    }
}