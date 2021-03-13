<?php
/**
 * Created by PhpStorm.
 * User: alex.gajvoronskij
 * Date: 3/13/21
 * Time: 7:23 PM
 */

namespace App\Application\CurrencyExchange\GetCurrentCurrency;


use App\Model\Base\CurrencyCode;
use App\Model\Base\UnixTimestamp;
use App\Model\Entity\CurrencyLogEntity;
use App\Model\Repository\CurrencyLogRepository;

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
        $baseCode = new CurrencyCode($baseCurrencyCode);
        $currency = new CurrencyCode($currency);

        $result = $this->dataProvider->getCurrency($baseCode, $currency);

        $currencyLogEntity = new CurrencyLogEntity(
            UnixTimestamp::fromString("now"),
            $baseCode,
            $currency
        );

        $this->logRepository->persist($currencyLogEntity);
        return $result;
    }
}