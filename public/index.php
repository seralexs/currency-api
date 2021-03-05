<?php

require '../vendor/autoload.php';

$app = require '../src/bootstrap.php';

$app->handleRequest();

//phpinfo();
//echo '<pre>';
//print_r($_SERVER);
//echo '</pre>';