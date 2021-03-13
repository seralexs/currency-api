<?php
/**
 * Created by PhpStorm.
 * User: alex.gajvoronskij
 * Date: 3/13/21
 * Time: 7:51 PM
 */

namespace App\Controllers;


abstract class BaseController
{
    const INVALID_VALIDATION = 101;

    public function success($payload)
    {
        return json_encode([
            'success' => true,
            'payload' => $payload
        ]);
    }

    public function error(string $errorCode, string $message, $httpCode = 500)
    {
        return json_encode([
            'success' => false,
            'error' => [
                'code' => $errorCode,
                'message' =>  $message
            ]
        ]);
    }
}