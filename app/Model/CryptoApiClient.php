<?php

namespace App\Model;

use App\Coins;
use GuzzleHttp\Client;

class CryptoApiClient
{
    public $client;
    public array $coinArray;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function cryptoCurrencyData(): array
    {
        $key = 'aec8fffc-b52d-4249-ab91-71d300376343';
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $parameters =
            [
                'start' => '1',
                'limit' => '10',
                'convert' =>'EUR'
            ];
        $response = $this->client->get($url,
            [
                'headers' => [
                    'X-CMC_PRO_API_KEY' => $key,
                    'Accept' => 'application/json'
                ],
                'query' => $parameters
            ]);
        $cryptCurrency = json_decode($response->getBody()->getContents(), true);
        return  $cryptCurrency->data;
    }
    public function coinArray():array
    {
        $coins = $this->cryptoCurrencyData();
        foreach ($coins as $coin)
        {
            $this->coinArray[] = new Coins(
                $coin->name,
                $coin->symbol,
                $coin->total_supply,
                $coin->date_added,
                $coin->quote->EUR->price,
                $coin->quotes->EUR->volume_24h,
                $coin->quotes->EUR->percent_change_1h,
                $coin->quotes->EUR->percent_change_7d,
                $coin->quotes->EUR->market_cap,
                $coin->max_supply
                );
        }
        return $this->coinArray;
    }
}