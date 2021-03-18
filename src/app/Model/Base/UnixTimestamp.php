<?php
/**
 * Created by PhpStorm.
 * User: alex.gajvoronskij
 * Date: 3/13/21
 * Time: 8:02 PM
 */

namespace App\Model\Base;


use DateTime;

class UnixTimestamp
{
    private $date;

    public function __construct(DateTime $dateTime)
    {
        $this->date = $dateTime;
    }

    public function getTimestamp()
    {
        return $this->date->getTimestamp();
    }

    public static function fromString($date = "now"): self
    {
        return new self(new DateTime($date));
    }
}