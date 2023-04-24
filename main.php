<?php
require_once 'vendor/autoload.php';
$api = new App\Model\CryptoApiClient();
$appUi = new App\AppUI($api);
$appUi->run();
