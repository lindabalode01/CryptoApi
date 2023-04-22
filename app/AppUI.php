<?php

namespace App;

use App\Model\CryptoApiClient;

class AppUI
{
private CryptoApiClient  $cryptoApiClient;
public function __construct(CryptoApiClient $cryptoApiClient )
{
    $this->cryptoApiClient = $cryptoApiClient;
}
public function run(): void
{
   $coin = $this->cryptoApiClient->cryptoCurrencyData();

       echo '---------------------------------------------' . PHP_EOL;
       echo 'Coin name: ' . $coin->getCoinName() . PHP_EOL;
       echo 'Coin symbol: ' . $coin->getCoinSymbol() . PHP_EOL;
       echo 'Coin amount: ' . $coin->getCoinAmount() . PHP_EOL;
       echo '---------------------------------------------' . PHP_EOL;

}
    }