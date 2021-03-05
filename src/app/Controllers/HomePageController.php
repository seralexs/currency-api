<?php


namespace App\Controllers;

use Core\Currency\Currency;
use Core\Request\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HomePageController
{
    public function index(Request $request, Currency $currencyApi)
    {
        echo $currencyApi->getCurrencyHistoryAgainstBase('RUB');
//        echo $request->getClientIp();
//        echo 'Request injected automatically';
        die();
    }
}