<?php
/**
 * Created by PhpStorm.
 * User: alex.gajvoronskij
 * Date: 3/13/21
 * Time: 7:28 PM
 */

namespace App\Application\CurrencyExchange\GetCurrentCurrency;


use App\Model\Base\CurrencyCode;

interface CurrencyDataProvider
{
    public function getCurrency(CurrencyCode $baseCurrency, CurrencyCode $currency);
}