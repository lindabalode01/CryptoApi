<?php

namespace App;

use App\Model\CryptoApiClient;

class AppUI
{
    private CryptoApiClient $cryptoApiClient;

    public function __construct(CryptoApiClient $cryptoApiClient)
    {
        $this->cryptoApiClient = $cryptoApiClient;
    }

    public function run(): void
    {
        $coins = $this->cryptoApiClient->coinArray();
        foreach ($coins as $coin) {
            /** @var Coins $coin */
            echo '---------------------------------------------' . PHP_EOL;
            echo 'Coin name: ' . $coin->getCoinName() . PHP_EOL;
            echo 'Coin symbol: ' . $coin->getCoinSymbol() . PHP_EOL;
            echo 'Coin amount: ' . $coin->getCoinAmount() . PHP_EOL;
            echo 'Coin max amount: ' . $coin->getMaxAmount() . PHP_EOL;
            echo 'Coin was added: ' . $coin->getCoinsAdded() . PHP_EOL;
            echo 'Coin price in EUR: ' . $coin->getCoinPrice() . PHP_EOL;
            echo 'Coin volume: ' . $coin->getCoinVolume() . PHP_EOL;
            echo 'Coin changes in the last hour: ' . $coin->getChangesInLastHour() . PHP_EOL;
            echo 'Coin changes in the last 7 days: ' . $coin->getChangesInLast7Days()\ . PHP_EOL;
            echo 'Coin max capacity: ' . $coin->getMarketCap() . PHP_EOL;
            echo '---------------------------------------------' . PHP_EOL;
}
    }
}