<?php

namespace App\Http\Clients;

use GuzzleHttp\Client;

class BitBayHttpClient
{
    private string $url;
    private Client $client;

    public function __construct(Client $client)
    {
        $this->url = env('BITBAY_API_URL');

        $this->client = $client;
    }

    public function getBitcoinTradeHistory(): ?object
    {
        $response = $this->client->request('GET', $this->url);

        if (!($body = $response->getBody())) {
            return null;
        }

        return json_decode($body->getContents());
    }

}
