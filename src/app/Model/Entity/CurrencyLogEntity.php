<?php
/**
 * Created by PhpStorm.
 * User: alex.gajvoronskij
 * Date: 3/13/21
 * Time: 8:00 PM
 */

namespace App\Model\Entity;


use App\Model\Base\CurrencyCode;
use App\Model\Base\UnixTimestamp;

class CurrencyLogEntity
{
    private $id;

    private $addTimestamp;

    private $baseCurrency;

    private $currency;

    public function __construct(UnixTimestamp $addTimestamp, CurrencyCode $baseCurrency, CurrencyCode $currency): self
    {
        $this->addTimestamp = $addTimestamp;
        $this->baseCurrency = $baseCurrency;
        $this->currency = $currency;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function getData()
    {
        return [
          'id' => $this->id,
        ];
    }

}