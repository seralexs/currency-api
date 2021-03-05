<?php


namespace App\Controllers;

use Core\Request\Request;

class HomePageController
{
    public function index(Request $request)
    {
        echo $request->getClientIp();
        echo 'Request injected automatically';
        die();
    }
}