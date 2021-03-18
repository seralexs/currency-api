<?php


namespace App\Controllers;

use App\Application\CurrencyExchange\GetCurrentCurrency\CurrencyDataProvider;
use Core\Request\Request;

class HomePageController extends BaseController
{
    public function index(Request $request, CurrencyDataProvider $dataProvider)
    {
        $currencyHistory = $dataProvider->getCurrencyHistoryAgainstBase('USD', 'EUR', '2021-03-17', '2021-03-17');

        return $this->success([
            'success' => true,
            'payload' => $currencyHistory
        ]);
    }
}