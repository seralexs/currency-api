<?php
/**
 * Created by PhpStorm.
 * User: alex.gajvoronskij
 * Date: 3/13/21
 * Time: 7:41 PM
 */

namespace App\Model\Base;


use InvalidArgumentException;

class CurrencyCode
{
    private $value;

    public function __construct(string $code)
    {
        if (strlen($code) > 3) {
            throw new InvalidArgumentException("Invalid currency code");
        }
        $this->value = $code;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}