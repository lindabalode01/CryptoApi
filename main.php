<?php

use App\AppUI;
use App\Model\CryptoApiClient;

require_once 'vendor/autoload.php';
$cryptoApiClient = new CryptoApiClient();
$appUi = new AppUI($cryptoApiClient);
$appUi->run();