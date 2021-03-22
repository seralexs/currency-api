<?php
/**
 * Created by PhpStorm.
 * User: alex.gajvoronskij
 * Date: 3/13/21
 * Time: 7:28 PM
 */

namespace Core\Currency\Interfaces;

use App\Model\Base\CurrencyCode;

interface CurrencyDataProvider
{
    public function getCurrency(string $baseCurrency, string $currency);
    public function getCurrencyHistoryAgainstBase(string $baseCurrency, string $currency, $startAt = null, $endAt = null);
}