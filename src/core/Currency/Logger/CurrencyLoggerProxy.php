<?php


namespace Core\Currency\Logger;


use App\Model\Base\CurrencyCode;
use App\Model\Base\UnixTimestamp;
use App\Model\Entity\CurrencyLogEntity;
use App\Model\Repository\CurrencyLogRepository;
use Core\Currency\Interfaces\CurrencyDataProvider;

class CurrencyLoggerProxy implements CurrencyDataProvider
{
    private CurrencyDataProvider $currencyDataProvider;
    private CurrencyLogRepository $currencyLogRepository;

    public function __construct(CurrencyDataProvider $currencyDataProvider, CurrencyLogRepository $currencyLogRepository)
    {
        $this->currencyDataProvider = $currencyDataProvider;
        $this->currencyLogRepository = $currencyLogRepository;
    }

    public function getCurrency(string $baseCurrency, string $currency)
    {
        $currencyLogEntity = new CurrencyLogEntity(
            UnixTimestamp::fromString("now"),
            new CurrencyCode($baseCurrency),
            new CurrencyCode($currency),
        );

        $this->currencyLogRepository->persist($currencyLogEntity);
//print_r($this->currencyLogRepository->getLogs());
//die();
        $this->currencyDataProvider->getCurrency($baseCurrency, $currency);
    }

    public function getCurrencyHistoryAgainstBase(string $baseCurrency, string $currency, $startAt = null, $endAt = null)
    {
        $currencyLogEntity = new CurrencyLogEntity(
            UnixTimestamp::fromString("now"),
            new CurrencyCode($baseCurrency),
            new CurrencyCode($currency),
        );

        $this->currencyLogRepository->persist($currencyLogEntity);

        $this->currencyDataProvider->getCurrencyHistoryAgainstBase($baseCurrency, $currency, $startAt, $endAt);
    }
}