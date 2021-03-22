<?php
/**
 * Created by PhpStorm.
 * User: alex.gajvoronskij
 * Date: 3/13/21
 * Time: 7:23 PM
 */

namespace App\Application\CurrencyExchange\GetCurrentCurrency;

use App\Model\Repository\CurrencyLogRepository;
use Core\Currency\Interfaces\CurrencyDataProvider;

class GetCurrentCurrencyService
{
    private $dataProvider;

    private $logRepository;

    public function __construct(CurrencyDataProvider $dataProvider, CurrencyLogRepository $logRepository)
    {
        $this->dataProvider = $dataProvider;
        $this->logRepository = $logRepository;
    }

    public function getCurrency(string $baseCurrencyCode, string $currency)
    {
        //does it belong to service or data provider (Currency::class)
        //is it better to move this logic to data provider??
//        $baseCode = new CurrencyCode($baseCurrencyCode);
//        $currency = new CurrencyCode($currency);
        //

        $result = $this->dataProvider->getCurrency($baseCurrencyCode, $currency);

//        $currencyLogEntity = new CurrencyLogEntity(
//            UnixTimestamp::fromString("now"),
//            $baseCode,
//            $currency
//        );

//        $this->logRepository->persist($currencyLogEntity);
        return $result;
    }
}