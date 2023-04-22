<?php

namespace App;

class Coins
{
private string $coinName;
private string $coinSymbol;
private float $coinAmount;
private string $coinAdded;
private float $coinPrice;
private float $volume;
private float $changeInLastHour;
private float $changeInLast7days;
private float $marketCapacity;
private ?int $maxAmount;
public function __construct(
    string $coinName,
    string $coinSymbol,
    float $coinAmount,
    string $coinAdded,
    float $coinPrice,
    float $volume,
    float $changeInLastHour,
    float $changeInLast7days,
    float $marketCapacity,
    ?int $maxAmount
)
{
    $this->coinName = $coinName;
    $this->coinSymbol = $coinSymbol;
    $this->coinAmount = $coinAmount;
    $this->coinAdded = $coinAdded;
    $this->coinPrice = $coinPrice;
    $this->volume = $volume;
    $this->changeInLastHour = $changeInLastHour;
    $this->changeInLast7days = $changeInLast7days;
    $this->marketCapacity = $marketCapacity;
    $this->maxAmount = $maxAmount;

}
public function  getCoinName(): string
{
    return $this->coinName;
}
public function getCoinSymbol():string
{
    return $this->coinSymbol;
}
public function getCoinAmount(): float
{
    return $this->coinAmount;
}
public function getMaxAmount(): ?int
{
    return $this->maxAmount;
}
public function getCoinsAdded(): float
{
    return $this->coinAdded;
}
public function getCoinPrice(): float
{
    return $this->coinPrice;
}
public function getCoinVolume(): float
{
    return $this->volume;
}
public function getChangesInLastHour():float
{
    return  $this->changeInLastHour;
}
public function getChangesInLast7Days():float
{
    return $this->changeInLast7days;
}
public function getMarketCap():float
{
    return $this->marketCapacity;
}
}