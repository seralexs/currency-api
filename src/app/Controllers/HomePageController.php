<?php


namespace App\Controllers;

use App\Model\Base\CurrencyCode;
use Core\Currency\Interfaces\CurrencyDataProvider;
use Core\Request\Request;

class HomePageController extends BaseController
{
    public function index(Request $request, CurrencyDataProvider $dataProvider)
    {
        $baseCurrency = new CurrencyCode('USD');
        $currency = new CurrencyCode('EUR');

        $currencyHistory = $dataProvider->getCurrencyHistoryAgainstBase($baseCurrency, $currency, '2021-03-17', '2021-03-17');

        return $this->success([
            'success' => true,
            'payload' => $currencyHistory
        ]);
    }
}