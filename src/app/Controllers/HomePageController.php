<?php


namespace App\Controllers;


class HomePageController
{
    public function index()
    {
        echo 'hello from index';
        die();
        return [
            'hello'
        ];
    }
}