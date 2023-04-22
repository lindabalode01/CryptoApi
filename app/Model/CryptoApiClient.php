<?php

namespace App\Model;

use App\Coins;
use GuzzleHttp\Client;

class CryptoApiClient
{
    public $client;
    public $coin = array();

    public function __construct()
    {
        $this->client = new Client();
    }

    public function cryptoCurrencyData(): Coins
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
        return  new Coins(
            $cryptCurrency->name,
            $cryptCurrency->symbol,
            $cryptCurrency->total_supply,
            $cryptCurrency->date_added,
            $cryptCurrency->quote->EUR->price,
            $cryptCurrency->quotes->EUR->volume_24h,
            $cryptCurrency->quotes->EUR->percent_change_1h,
            $cryptCurrency->quotes->EUR->percent_change_7d,
            $cryptCurrency->quotes->EUR->market_cap,
            $cryptCurrency->max_supply
            );
    }
}