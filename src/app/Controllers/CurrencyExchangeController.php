<?php
/**
 * Created by PhpStorm.
 * User: alex.gajvoronskij
 * Date: 3/13/21
 * Time: 7:05 PM
 */

namespace App\Controllers;


use App\Application\CurrencyExchange\GetCurrentCurrency\GetCurrentCurrencyService;
use Core\Request\Request;
use InvalidArgumentException;

class CurrencyExchangeController extends BaseController
{
    public function echange(GetCurrentCurrencyService $currentCurrencyService, Request $request)
    {
        try {
            $currentCurrency = $currentCurrencyService->getCurrency(
                $request->get("base_currency"),
                $request->get("currency")
            );

            return $this->success($currentCurrency);
        } catch (InvalidArgumentException $exception) {
            return $this->error(self::INVALID_VALIDATION, $exception->getMessage());
        }
    }
}