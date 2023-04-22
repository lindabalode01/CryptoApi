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
            $cryptCurrency->data->name,
            $cryptCurrency->data->symbol,
            $cryptCurrency->data->total_supply,
            $cryptCurrency->data->date_added,
            $cryptCurrency->data->quote->EUR->price,
            $cryptCurrency->data->quotes->EUR->volume_24h,
            $cryptCurrency->data->quotes->EUR->percent_change_1h,
            $cryptCurrency->data->quotes->EUR->percent_change_7d,
            $cryptCurrency->data->quotes->EUR->market_cap,
            $cryptCurrency->data->max_supply
            );
    }
}