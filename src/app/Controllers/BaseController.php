<?php
/**
 * Created by PhpStorm.
 * User: alex.gajvoronskij
 * Date: 3/13/21
 * Time: 7:51 PM
 */

namespace App\Controllers;

use Core\Response\JsonResponse;
use Core\Response\Response;

abstract class BaseController
{
    const INVALID_VALIDATION = 101;

    public function success($payload)
    {
        return $this->json([
            'success' => true,
            'payload' => $payload
        ]);
    }

    public function error(string $errorCode, string $message, $httpCode = 500)
    {
        return $this->json([
            'success' => false,
            'error' => [
                'code' => $errorCode,
                'message' =>  $message
            ]
        ]);
    }

    public function json(array $data, $statusCode = Response::HTTP_OK)
    {
        return (new JsonResponse($data, $statusCode))->send();
    }
}